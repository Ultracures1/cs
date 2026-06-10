
# Frontend Architecture

- Framework: Next.js 14 App Router, React Server Components
- Styling: Tailwind CSS, custom colors suta.maroon #7A1F2B, suta.gold #C9A86A
- State: Zustand for cart, wishlist, persisted to localStorage
- Data fetching: fetch() to /api/v1 with ISR revalidate 60s for PLP/PDP
- Components:
  - Header (sticky, free shipping bar)
  - FilterSidebar (fabric, technique, occasion, size, price, discount)
  - ProductCard (image, name, rating, reviews, price, tag)
  - PDPGallery, StoryBlock, ArtisanCredit
- Pages implemented: 16 routes covering home, collections, product, cart, checkout, wishlist, account, search, stories, artisans, static pages
