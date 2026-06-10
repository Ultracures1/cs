# Product Requirements Document (PRD)

## Maison Élite — Luxury Boutique E-Commerce Platform

| Field            | Value                                  |
| ---------------- | -------------------------------------- |
| Document status  | Draft v1.0                             |
| Last updated     | 2026-06-10                             |
| Product          | Maison Élite online boutique           |
| Related document | [TRD.md](./TRD.md)                     |

---

## 1. Background & Problem Statement

Maison Élite is a curated luxury fashion boutique. Like most small retail
businesses, its biggest problems are:

1. **Customer acquisition** — shoppers research and buy online before they
   ever visit a store. Without a way to browse and purchase online, the
   boutique loses sales every day.
2. **Weak online presence** — a static brochure page shows the brand but
   cannot capture demand: no catalog, no cart, no orders, no way to collect
   leads (newsletter signups or enquiries).
3. **Manual, repetitive work** — taking orders over phone/DM/email is slow,
   error-prone, and doesn't scale.

The current site is a beautiful but **fully static** landing page. Products
are hard-coded in HTML, the cart button is decorative, and the newsletter
form discards the email address. This project turns it into a working
storefront.

## 2. Goals

| #  | Goal                                                            | Metric                                  |
| -- | --------------------------------------------------------------- | --------------------------------------- |
| G1 | Customers can browse the live product catalog                   | Catalog served from the backend API      |
| G2 | Customers can add items to a cart and place an order            | Orders persisted with a unique order ID  |
| G3 | The boutique captures leads                                     | Newsletter signups + contact messages stored |
| G4 | The storefront keeps working even if the API is unavailable     | Static fallback catalog renders          |

### Non-Goals (out of scope for v1)

- Online payment processing (orders are placed "pay on confirmation"; payments are a v2 item)
- User accounts / login
- Admin dashboard UI (data is accessible via API / data files)
- Inventory management, shipping integrations, multi-currency

## 3. Target Users & Personas

| Persona            | Description                                       | Needs                                          |
| ------------------ | ------------------------------------------------- | ---------------------------------------------- |
| **The Shopper**    | Style-conscious customer, browses on mobile/desktop | Browse catalog, see prices/sales, order easily |
| **The Subscriber** | Interested but not ready to buy                   | Join the mailing list in one step              |
| **The Owner**      | Boutique owner, non-technical                     | Receive orders & leads without manual work     |

## 4. User Stories

1. **As a shopper**, I want to see the current collection with prices and
   sale badges, so that I can decide what to buy.
2. **As a shopper**, I want to add items to a cart and see a running total,
   so that I know what I'm spending.
3. **As a shopper**, I want to place an order with just my name and email,
   so that checkout is fast.
4. **As a shopper**, I want free shipping over $200 to be applied
   automatically, so that the promise in the site banner is honored.
5. **As a subscriber**, I want to join the newsletter with my email, so that
   I hear about new arrivals.
6. **As the owner**, I want every order, signup, and enquiry stored with a
   timestamp, so that nothing is lost.
7. **As the owner**, I want order totals computed on the server from the
   real catalog prices, so that customers cannot tamper with prices.

## 5. Functional Requirements

### 5.1 Product Catalog (G1)

- **FR-1** The backend exposes the product catalog (id, name, category,
  price, optional sale price, badge, description).
- **FR-2** The storefront renders the collections grid from the API.
- **FR-3** If the API is unreachable (e.g. static-only hosting), the
  storefront renders an embedded fallback catalog identical to v1 content.

### 5.2 Cart & Checkout (G2)

- **FR-4** Each product card has an "Add to Cart" action.
- **FR-5** The nav cart button shows the live item count; the cart persists
  across page reloads (local storage).
- **FR-6** A cart drawer lists items, quantities, and subtotal, and allows
  removing items.
- **FR-7** Checkout collects name + email and submits the cart to the
  backend; the backend validates items against the catalog, computes
  subtotal/shipping/total server-side, and returns an order ID.
- **FR-8** Shipping is $15, waived for subtotals of $200 or more.
- **FR-9** The shopper sees an order confirmation with the order ID; the
  cart is then cleared.

### 5.3 Lead Capture (G3)

- **FR-10** The newsletter form submits the email to the backend; duplicate
  emails are accepted gracefully (idempotent).
- **FR-11** A contact endpoint accepts name, email, and message for
  enquiries.

### 5.4 Validation & Errors

- **FR-12** All write endpoints validate input (email format, required
  fields, known product IDs, quantity 1–20) and return structured error
  messages.
- **FR-13** The storefront surfaces failures to the user without losing
  their cart.

## 6. Non-Functional Requirements

| #     | Requirement                                                              |
| ----- | ------------------------------------------------------------------------ |
| NFR-1 | Catalog API responds in < 100 ms (in-memory catalog)                     |
| NFR-2 | The storefront stays a single HTML file with no build step               |
| NFR-3 | The backend has zero npm dependencies (deploys anywhere Node 18+ runs, no install step) |
| NFR-4 | Prices are never trusted from the client                                 |
| NFR-5 | The site remains fully responsive (existing breakpoints preserved)       |

## 7. Success Metrics

- Orders placed per week (primary)
- Newsletter signup conversion rate
- Cart abandonment rate (carts created vs. orders placed)
- API availability / error rate

## 8. Release Plan

| Phase  | Scope                                                       |
| ------ | ----------------------------------------------------------- |
| **v1** | Everything in §5 (this release)                             |
| v1.1   | Email notifications to the owner on new orders/enquiries    |
| v2     | Payment processing (Stripe), order status tracking          |
| v2.1   | Admin dashboard, inventory counts, product image uploads    |

## 9. Open Questions

- Which payment provider for v2 (Stripe vs. PayPal vs. regional provider)?
- Should orders trigger an email/WhatsApp notification to the owner in v1.1?
- Single warehouse shipping assumption — international rates needed?
