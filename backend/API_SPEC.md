
# Suta Clone API

Base: /api/v1

## Catalog
GET /products?fabric=Mul Cotton&technique=Handwoven&occasion=Office Wear&min=2000&max=5000&sort=rating_desc
GET /products/:handle
GET /collections/:slug

## Search
GET /search?q=beet

## Cart
POST /cart {session_id, variant_id, qty}
GET /cart/:id
DELETE /cart/:id/items/:item_id

## Checkout
POST /checkout/initiate {cart_id, address, payment_method}
POST /payments/razorpay/webhook

## User (OTP)
POST /auth/otp/request {phone}
POST /auth/otp/verify {phone, code} -> {token}

## Orders
GET /orders
GET /orders/:id

## Reviews
POST /products/:id/reviews {rating, title, body, photos}

## CMS
GET /stories
GET /stories/:slug
GET /artisans
GET /artisans/:slug
