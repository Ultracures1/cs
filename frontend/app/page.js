
import Link from 'next/link'
import {PRODUCTS, API_URL} from './products-data'

// Pull live products from the backend API; enrich with local presentation
// fields (images, tags) and fall back to the local catalog if the API is down.
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

export default async function Home(){
  const products = await getProducts()
  return (<main>
    {/* Hero */}
    <section className="relative bg-[#7A1F2B] text-white overflow-hidden">
      <img src="https://images.unsplash.com/photo-1610030469983-98e2f1e8c7c4?w=1600&q=80" alt="Handwoven sarees" className="absolute inset-0 w-full h-full object-cover opacity-40"/>
      <div className="relative max-w-7xl mx-auto px-4 py-24 md:py-32">
        <p className="text-sm tracking-widest uppercase text-[#C9A86A]">Handmade in India</p>
        <h1 className="mt-3 text-4xl md:text-6xl font-light max-w-2xl">Woven stories, everyday wear</h1>
        <p className="mt-4 max-w-xl text-white/80">Story-first sarees and blouses, handwoven by 14,000+ artisans. Free shipping over ₹1999 • COD • Easy returns.</p>
        <div className="mt-8 flex gap-4">
          <Link href="/collections/sarees" className="bg-[#C9A86A] text-stone-900 px-6 py-3 rounded-xl font-medium">Shop Sarees</Link>
          <Link href="/stories" className="border border-white/60 px-6 py-3 rounded-xl">Read Stories</Link>
        </div>
      </div>
    </section>

    {/* Category tiles */}
    <section className="max-w-7xl mx-auto px-4 py-12 grid grid-cols-3 gap-4">
      {[
        {href:'/collections/sarees', label:'Sarees', img:'https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=600&q=80'},
        {href:'/collections/blouses', label:'Blouses', img:'https://images.unsplash.com/photo-1598554747436-c9293d6a588f?w=600&q=80'},
        {href:'/collections/mens', label:'Mens', img:'https://images.unsplash.com/photo-1520975916090-3105956dac38?w=600&q=80'},
      ].map(c => (
        <Link key={c.href} href={c.href} className="group relative rounded-2xl overflow-hidden aspect-[4/3]">
          <img src={c.img} alt={c.label} className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300"/>
          <span className="absolute bottom-3 left-3 bg-white/90 px-3 py-1 rounded-full text-sm font-medium">{c.label}</span>
        </Link>
      ))}
    </section>

    {/* Bestsellers */}
    <section className="max-w-7xl mx-auto px-4 pb-16">
      <div className="flex items-end justify-between mb-6">
        <div>
          <h2 className="text-3xl font-light">Bestsellers</h2>
          <p className="text-stone-500 text-sm mt-1">Loved by thousands, woven for you</p>
        </div>
        <Link href="/collections/sarees" className="text-sm text-[#7A1F2B] underline underline-offset-4">View all</Link>
      </div>
      <div className="grid grid-cols-2 lg:grid-cols-4 gap-6">
        {products.map(p => (
          <Link key={p.id} href={`/product/${p.id}`} className="group bg-white border rounded-2xl overflow-hidden hover:shadow-lg transition-shadow">
            <div className="relative">
              <img src={p.img || 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=600&q=80'} alt={p.name} className="aspect-[4/5] object-cover w-full group-hover:scale-105 transition-transform duration-300"/>
              {p.tag && <span className="absolute top-3 left-3 text-xs bg-[#7A1F2B] text-white px-2 py-0.5 rounded-full">{p.tag}</span>}
            </div>
            <div className="p-4">
              <h3 className="font-medium">{p.name}</h3>
              <p className="text-sm text-stone-500">{p.rating} ★ ({p.reviews}) • {p.fabric}</p>
              <p className="mt-1 font-semibold">₹ {p.price.toLocaleString('en-IN')} {p.mrp > p.price && <span className="ml-2 text-sm font-normal line-through text-stone-400">₹{p.mrp.toLocaleString('en-IN')}</span>}</p>
            </div>
          </Link>
        ))}
      </div>
    </section>

    {/* Story strip */}
    <section className="bg-stone-100">
      <div className="max-w-7xl mx-auto px-4 py-14 grid md:grid-cols-3 gap-8 text-center">
        <div><p className="text-3xl font-light text-[#7A1F2B]">14,000+</p><p className="text-sm text-stone-600 mt-1">Weavers and artisans</p></div>
        <div><p className="text-3xl font-light text-[#7A1F2B]">100%</p><p className="text-sm text-stone-600 mt-1">Handmade in India</p></div>
        <div><p className="text-3xl font-light text-[#7A1F2B]">₹1999+</p><p className="text-sm text-stone-600 mt-1">Free shipping &amp; COD</p></div>
      </div>
    </section>
  </main>)
}
