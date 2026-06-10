# Maison Élite — Luxury Boutique

A curated luxury fashion storefront with a zero-dependency Node.js backend:
product catalog API, cart + checkout with server-side pricing, and lead
capture (newsletter + contact).

## Quick start

```bash
npm start        # http://localhost:3000  (Node 18+, nothing to install)
npm run dev      # auto-restart on file changes
```

## Documentation

- [Product Requirements (PRD)](docs/PRD.md) — problem, goals, user stories, scope
- [Technical Requirements (TRD)](docs/TRD.md) — architecture, API spec, data model, security

## API at a glance

| Method | Path                | Purpose            |
| ------ | ------------------- | ------------------ |
| GET    | `/api/health`       | Liveness probe     |
| GET    | `/api/products`     | Product catalog    |
| GET    | `/api/products/:id` | Single product     |
| POST   | `/api/orders`       | Place an order     |
| GET    | `/api/orders/:id`   | Order lookup       |
| POST   | `/api/newsletter`   | Subscribe an email |
| POST   | `/api/contact`      | Enquiry message    |

Runtime data (orders, subscribers, messages) is stored as JSON files under
`data/` (gitignored). The storefront in `public/index.html` works standalone
on static hosting too — it falls back to an embedded catalog when the API is
unreachable.
