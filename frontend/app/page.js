
import Link from 'next/link'
const products = [
  {id:'beet-turnip', name:'Beet and Turnip', price:4200, rating:4.95, reviews:784, tag:'Bestseller', img:'https://images.unsplash.com/photo-1596462502278-27bfdc403348'},
  {id:'bells-ireland', name:'Bells of Ireland', price:4200, rating:4.91, reviews:180, tag:'Bestseller', img:'https://images.unsplash.com/photo-1610030469983-98e2f1e8c7c4'},
  {id:'parallel-universe', name:'Parallel Universe', price:4250, rating:4.93, reviews:91, img:'https://images.unsplash.com/photo-1520975916090-3105956dac38'},
]
export default function Home(){
  return (<main>
    <header className="border-b bg-white sticky top-0 z-10"><div className="max-w-6xl mx-auto px-4 py-4 flex justify-between"><Link href="/" className="text-2xl font-semibold tracking-wider">suta<span className="text-suta-gold">.</span></Link><nav className="flex gap-6 text-sm"><Link href="/collections/sarees">Sarees</Link><Link href="/collections/blouses">Blouses</Link><Link href="/stories">Stories</Link></nav></div></header>
    <section className="max-w-6xl mx-auto px-4 py-10">
      <h1 className="text-4xl font-light mb-2">Woven stories, everyday wear</h1>
      <p className="text-stone-600 mb-8">Free shipping over ₹1999 • COD • Easy returns</p>
      <div className="grid grid-cols-1 sm:grid-cols-3 gap-6">
        {products.map(p=> (<Link key={p.id} href={`/product/${p.id}`} className="group bg-white border rounded-2xl overflow-hidden hover:shadow">
          <img src={p.img} alt={p.name} className="aspect-[4/5] object-cover w-full"/>
          <div className="p-4"><div className="flex justify-between"><h3 className="font-medium">{p.name}</h3>{p.tag && <span className="text-xs bg-suta-maroon text-white px-2 py-0.5 rounded-full">{p.tag}</span>}</div><p className="text-sm text-stone-500">{p.rating} ★ ({p.reviews})</p><p className="mt1 font-semibold">₹ {p.price.toLocaleString('en-IN')}</p></div>
        </Link>))}
      </div>
    </section>
  </main>)
}
