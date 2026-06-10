
import Link from 'next/link'
import { PRODUCTS, API_URL } from './products-data'
import ProductCard from '../components/ProductCard'
import { CheckIcon, TruckIcon, StarIcon } from '../components/icons'

// Pull live products from the backend API; enrich with local presentation
// fields and fall back to the local catalog if the API is down.
async function getProducts(){
  try {
    const res = await fetch(`${API_URL}/api/v1/products`, { next: { revalidate: 60 } })
    if (!res.ok) throw new Error('bad status')
    const apiRows = await res.json()
    if (Array.isArray(apiRows) && apiRows.length) {
      const merged = apiRows.map(row => ({ ...PRODUCTS.find(p => p.id === row.id), ...row }))
      const extras = PRODUCTS.filter(p => !apiRows.some(row => row.id === p.id))
      return [...merged, ...extras]
    }
  } catch {}
  return PRODUCTS
}

const categories = [
  { href: '/collections/sarees', label: 'Sarees', img: 'https://images.unsplash.com/photo-1596462502278-27bfdc403348' },
  { href: '/collections/blouses', label: 'Blouses', img: 'https://images.unsplash.com/photo-1598554747436-c9293d6a588f' },
  { href: '/collections/mens', label: 'Mens', img: 'https://images.unsplash.com/photo-1520975916090-3105956dac38' },
]

const testimonials = [
  { quote: 'The weave feels alive — you can sense the hands behind it. My most-complimented saree.', name: 'Ananya R.', city: 'Bengaluru' },
  { quote: 'Ordered with COD, arrived in three days, packaged beautifully. The colours are true to photos.', name: 'Meera S.', city: 'Kolkata' },
  { quote: 'Light as air mul cotton. I wore it through a full summer wedding day in comfort.', name: 'Priya D.', city: 'Mumbai' },
]

export default async function Home(){
  const products = await getProducts()
  return (<main id="main">
    {/* Hero */}
    <section className="relative bg-primary-dark text-white overflow-hidden">
      <img
        src="https://images.unsplash.com/photo-1610030469983-98e2f1e8c7c4?auto=format&fit=crop&w=1600&q=75"
        alt="Model draped in a handwoven saree"
        className="absolute inset-0 w-full h-full object-cover opacity-35"
        width="1600" height="900" loading="eager"
      />
      <div className="relative max-w-7xl mx-auto px-4 py-24 md:py-36">
        <p className="text-sm font-medium tracking-[0.2em] uppercase text-accent-soft">Handmade in India</p>
        <h1 className="mt-4 text-5xl md:text-7xl font-medium leading-[1.05] max-w-2xl">Woven stories, everyday wear</h1>
        <p className="mt-5 max-w-xl text-base md:text-lg leading-relaxed text-white/85">
          Story-first sarees and blouses, handwoven by 14,000+ artisans across India.
        </p>
        <div className="mt-9 flex flex-wrap gap-4">
          <Link href="/collections/sarees" className="bg-accent-soft text-ink font-sans font-semibold px-7 py-3.5 rounded-xl hover:bg-white transition-colors duration-200">
            Shop Sarees
          </Link>
          <Link href="/stories" className="border border-white/60 font-sans font-medium px-7 py-3.5 rounded-xl hover:bg-white/10 transition-colors duration-200">
            Read Stories
          </Link>
        </div>
      </div>
    </section>

    {/* Category tiles */}
    <section aria-label="Shop by category" className="max-w-7xl mx-auto px-4 py-14">
      <div className="grid grid-cols-1 sm:grid-cols-3 gap-5">
        {categories.map(c => (
          <Link key={c.href} href={c.href} className="group relative rounded-2xl overflow-hidden aspect-[4/3]">
            <img
              src={`${c.img}?auto=format&fit=crop&w=700&q=75`} alt={`${c.label} collection`}
              width="700" height="525" loading="lazy"
              className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"
            />
            <span className="absolute inset-0 bg-gradient-to-t from-ink/50 to-transparent" aria-hidden="true"/>
            <span className="absolute bottom-4 left-4 font-display text-2xl font-semibold text-white">{c.label}</span>
          </Link>
        ))}
      </div>
    </section>

    {/* Bestsellers */}
    <section aria-labelledby="bestsellers-heading" className="max-w-7xl mx-auto px-4 pb-16">
      <div className="flex items-end justify-between mb-7">
        <div>
          <h2 id="bestsellers-heading" className="text-4xl font-medium">Bestsellers</h2>
          <p className="text-ink-soft text-sm mt-1.5 font-sans">Loved by thousands, woven for you</p>
        </div>
        <Link href="/collections/sarees" className="text-sm font-medium text-primary underline underline-offset-4 hover:text-primary-dark py-2">View all</Link>
      </div>
      <div className="grid grid-cols-2 lg:grid-cols-4 gap-5 md:gap-6">
        {products.map((p, i) => <ProductCard key={p.id} product={p} eager={i < 4}/>)}
      </div>
    </section>

    {/* Social proof */}
    <section aria-labelledby="testimonials-heading" className="bg-surface-raised border-y border-line">
      <div className="max-w-7xl mx-auto px-4 py-16">
        <h2 id="testimonials-heading" className="text-4xl font-medium text-center">Draped &amp; adored</h2>
        <div className="mt-9 grid gap-6 md:grid-cols-3">
          {testimonials.map(t => (
            <figure key={t.name} className="bg-surface rounded-2xl border border-line p-6">
              <p className="flex gap-0.5 text-accent" aria-label="Rated 5 out of 5">
                {[...Array(5)].map((_, i) => <StarIcon key={i}/>)}
              </p>
              <blockquote className="mt-4 font-display text-lg leading-relaxed text-ink">&ldquo;{t.quote}&rdquo;</blockquote>
              <figcaption className="mt-4 text-sm text-ink-soft font-sans">{t.name} — {t.city}</figcaption>
            </figure>
          ))}
        </div>
      </div>
    </section>

    {/* Trust strip */}
    <section aria-label="Why shop with us" className="max-w-7xl mx-auto px-4 py-16 grid sm:grid-cols-3 gap-8 text-center">
      <div>
        <p className="font-display text-4xl text-primary">14,000+</p>
        <p className="mt-1.5 text-sm text-ink-soft font-sans">Weavers and artisans supported</p>
      </div>
      <div>
        <p className="flex justify-center text-primary"><CheckIcon width="36" height="36"/></p>
        <p className="mt-1.5 text-sm text-ink-soft font-sans">100% handmade in India</p>
      </div>
      <div>
        <p className="flex justify-center text-primary"><TruckIcon width="36" height="36"/></p>
        <p className="mt-1.5 text-sm text-ink-soft font-sans">Free shipping over ₹1999 &amp; COD</p>
      </div>
    </section>
  </main>)
}
