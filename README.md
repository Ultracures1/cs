
# Suta.in Clone Starter

Same-to-same structure as suta.in — story-first PDPs, deep filters, COD, free shipping >₹1999.

## Run locally
1. Frontend
   cd frontend
   npm install
   npm run dev  # http://localhost:3000

2. Backend
   cd backend
   npm install
   npm run dev  # http://localhost:4000/api/products

## What is included
- Next.js 14 App Router, Tailwind, maroon/gold theme
- Home grid with bestsellers (ratings, reviews)
- PDP with story, fabric, technique, artisan, COD button
- Express API with filter endpoints (fabric, occasion)
- Ready for Razorpay, Shiprocket, PostgreSQL

## Next steps to match suta.in
- Add collections: /collections/sarees with filters (price, discount, size XS-XXL)
- Connect Meilisearch for search
- Add artisan CMS (Strapi)
- Implement cart with Zustand + persist
- Razorpay UPI/COD, WhatsApp order updates
