
import Link from 'next/link'
import {PRODUCTS, FILTERS} from '../../products-data'
export default function Collection({params}){
  const handle = params.handle
  const list = handle==='blouses' ? PRODUCTS.filter(p=>p.category==='blouse') : PRODUCTS.filter(p=>p.category!=='blouse')
  return (<div className="max-w-7xl mx-auto px-4 py-8 grid md:grid-cols-[240px_1fr] gap-8">
    <aside className="hidden md:block">
      <h3 className="font-semibold mb3">Filters</h3>
      {Object.entries(FILTERS).map(([k,vals])=>(<div key={k} className="mb-4"><p className="text-sm font-medium capitalize mb1">{k}</p><div className="space-y1">{vals.map(v=><label key={v} className="flex items-center gap2 text-sm"><input type="checkbox"/><span>{v}</span></label>)}</div></div>))}
    </aside>
    <section><div className="flex justify-between items-center mb-4"><h1 className="text-2xl capitalize">{handle}</h1><p className="text-sm text-stone-500">{list.length} products</p></div>
    <div className="grid grid-cols-2 lg:grid-cols-3 gap-6">{list.map(p=>(<Link key={p.id} href={`/product/${p.id}`} className="bg-white border rounded-2xl overflow-hidden"><img src={p.img} className="aspect-[4/5] object-cover"/><div className="p-3"><h3 className="text-sm">{p.name}</h3><p className="text-xs text-stone-500">{p.fabric} • {p.technique}</p><div className="mt1 flex gap2 items-baseline"><span className="font-semibold">₹{p.price}</span>{p.mrp>p.price && <span className="line-through text-xs text-stone-400">₹{p.mrp}</span>}</div></div></Link>))}</div></section>
  </div>)
}
