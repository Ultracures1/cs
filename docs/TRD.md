# Technical Requirements Document (TRD)

## Maison Élite — Luxury Boutique E-Commerce Platform

| Field            | Value                |
| ---------------- | -------------------- |
| Document status  | Draft v1.0           |
| Last updated     | 2026-06-10           |
| Related document | [PRD.md](./PRD.md)   |

---

## 1. Architecture Overview

```
┌──────────────────────────────┐
│   Browser (public/index.html)│
│  - storefront UI (no build)  │
│  - cart in localStorage      │
│  - fetch() against /api/*    │
│  - embedded catalog fallback │
└──────────────┬───────────────┘
               │ HTTP/JSON
┌──────────────▼───────────────┐
│ Node HTTP app (src/app.js)   │
│  - serves /public statically │
│  - /api route table          │
│  ┌─────────┬────────┬──────┐ │
│  │products │ orders │leads │ │  controllers (src/controllers/)
│  └────┬────┴───┬────┴──┬───┘ │
│       │        │       │     │
│  catalog    JSON file store  │  src/data/products.js
│  (in-mem)   (src/store/)     │  data/*.json (gitignored)
└──────────────────────────────┘
```

**Key decisions**

| Decision                          | Rationale                                                                 |
| --------------------------------- | ------------------------------------------------------------------------- |
| Node 18+ `node:http`, **zero npm dependencies**, ES modules | Deploys anywhere Node runs — no install step, no supply-chain surface; the route table in `app.js` is ~20 lines, so a framework adds nothing |
| JSON-file persistence (`data/`)   | Zero external services or native deps (NFR-3); swap for SQL in v2         |
| Catalog as code (`products.js`)   | Catalog is small and versioned with the site; server is source of truth   |
| Single-file frontend, no build    | NFR-2; works on static hosting with embedded fallback catalog (FR-3)      |
| Totals computed server-side       | NFR-4; client prices are display-only                                     |

## 2. Repository Layout

```
cs/
├── docs/
│   ├── PRD.md
│   └── TRD.md
├── public/
│   └── index.html          # storefront (UI + cart + API client)
├── src/
│   ├── server.js           # entry point (port binding)
│   ├── app.js              # request handler: route table, JSON body parsing,
│   │                       #   static file serving, error handling
│   ├── controllers/        # pure functions: (params, body) → {status, body}
│   │   ├── productController.js
│   │   ├── orderController.js
│   │   └── leadController.js   # newsletter + contact
│   ├── data/products.js    # product catalog (source of truth)
│   ├── store/jsonStore.js  # tiny JSON-file persistence layer
│   └── utils/validate.js   # shared email validation
├── data/                   # runtime data (gitignored): orders.json, …
├── package.json
└── vercel.json
```

## 3. API Specification

Base path: `/api`. All bodies are JSON. All responses use the envelope:

```json
{ "ok": true,  "data": { … } }
{ "ok": false, "error": "human-readable message" }
```

| Method | Path              | Purpose                       | Success |
| ------ | ----------------- | ----------------------------- | ------- |
| GET    | `/api/health`     | Liveness probe                | 200     |
| GET    | `/api/products`   | Full catalog                  | 200     |
| GET    | `/api/products/:id` | Single product              | 200/404 |
| POST   | `/api/orders`     | Place an order                | 201     |
| GET    | `/api/orders/:id` | Look up an order (confirmation) | 200/404 |
| POST   | `/api/newsletter` | Subscribe an email            | 201 (200 if already subscribed) |
| POST   | `/api/contact`    | Contact / enquiry message     | 201     |

### 3.1 `POST /api/orders` — request

```json
{
  "customer": { "name": "Isabelle M.", "email": "isabelle@example.com" },
  "items": [ { "productId": "velvet-noir-gown", "quantity": 1 } ]
}
```

Validation (400 on failure):
- `customer.name`: 2–80 chars; `customer.email`: valid format
- `items`: 1–50 entries; `productId` must exist in the catalog;
  `quantity` integer 1–20

### 3.2 `POST /api/orders` — response (201)

```json
{
  "ok": true,
  "data": {
    "id": "ord_9f2c…",
    "status": "pending",
    "items": [ { "productId": "velvet-noir-gown", "name": "Velvet Noir Gown",
                 "unitPrice": 485, "quantity": 1, "lineTotal": 485 } ],
    "subtotal": 485,
    "shipping": 0,
    "total": 485,
    "createdAt": "2026-06-10T12:00:00.000Z"
  }
}
```

Pricing rules (server-side only): unit price = `salePrice ?? price` from the
catalog; shipping = `0` if subtotal ≥ 200 else `15` (FR-8).

### 3.3 `POST /api/newsletter`

Request: `{ "email": "x@y.com" }` → 201 with `{ subscribed: true }`;
repeat subscription returns 200 with `{ subscribed: true, duplicate: true }`.

### 3.4 `POST /api/contact`

Request: `{ "name", "email", "message" }` (message 5–2000 chars) → 201 with
`{ received: true, id }`.

## 4. Data Model

### Product (catalog, versioned in `src/data/products.js`)

| Field       | Type    | Notes                              |
| ----------- | ------- | ---------------------------------- |
| `id`        | string  | slug, unique                       |
| `name`      | string  |                                    |
| `category`  | string  | e.g. "Evening Wear"                |
| `price`     | number  | USD                                |
| `salePrice` | number? | present only when discounted       |
| `badge`     | string? | "New" / "Bestseller" / "Sale" / "Limited" |
| `theme`     | number  | 1–6, maps to storefront gradient class |
| `icon`      | string  | emoji used by the placeholder art  |

### Order (`data/orders.json`)

`id`, `status` (`pending`), `customer {name, email}`, `items[]` (with
server-resolved `name`, `unitPrice`, `lineTotal`), `subtotal`, `shipping`,
`total`, `createdAt`.

### Subscriber (`data/subscribers.json`): `email` (lowercased, unique), `createdAt`.

### Message (`data/messages.json`): `id`, `name`, `email`, `message`, `createdAt`.

## 5. Persistence Layer

`src/store/jsonStore.js` exposes `readCollection(name)` /
`writeCollection(name, rows)` over `data/<name>.json`:

- Creates `data/` and missing files on demand.
- Synchronous writes (atomic enough at boutique traffic levels); the v2
  migration path is to replace this module with a SQL-backed implementation
  behind the same interface.
- `data/` is **gitignored** — runtime state never enters version control.

## 6. Frontend Implementation Notes

- The collections grid is rendered by JS from `GET /api/products`; on any
  fetch failure it renders the embedded `FALLBACK_PRODUCTS` array (FR-3),
  so the page is fully functional on static hosting.
- Cart state: `localStorage["maison-elite-cart"]` as
  `{ [productId]: quantity }`; the nav badge re-renders on every mutation.
- Cart drawer + checkout form are plain DOM (no framework); checkout POSTs
  to `/api/orders` and shows the returned order ID.
- Newsletter form POSTs to `/api/newsletter`; on network failure it still
  shows the thank-you state so static deployments don't break UX.

## 7. Security

- Input validation on every write endpoint (lengths, email format, catalog
  membership, quantity bounds) — see §3.
- Request body size capped at 50 KB (413 beyond that); invalid JSON → 400.
- Static file serving normalizes paths and rejects traversal outside `public/`.
- Prices/totals computed exclusively server-side (NFR-4).
- All user-supplied strings are inserted into the DOM via `textContent`
  (never `innerHTML`) to prevent XSS.
- No secrets in the repo; configuration via environment variables
  (`PORT`). `.env` is gitignored.

## 8. Error Handling

- Unknown `/api/*` routes → 404 JSON envelope.
- Validation failures → 400 with a specific message.
- Unhandled errors → 500 JSON envelope via a top-level try/catch around
  request handling; details logged server-side only.

## 9. Deployment & Operations

| Mode                   | How                                                            |
| ---------------------- | -------------------------------------------------------------- |
| Full stack (default)   | `npm start` → Node serves API **and** static storefront on `PORT` (default 3000) |
| Dev                    | `npm run dev` (Node `--watch`, no nodemon needed)               |
| Static-only (Vercel)   | `vercel.json` deploys `public/` as a static site; the storefront falls back to the embedded catalog and degrades gracefully (orders/newsletter show an offline notice) |

Health check: `GET /api/health` returns `{ ok: true, data: { status: "up" } }`.

## 10. Testing Strategy

- **Smoke tests** (manual/CI curl): health, catalog, order happy path,
  order validation failures, newsletter dedupe.
- v1.1: supertest-based integration tests for each endpoint, run in CI.
