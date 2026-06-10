
import {PRODUCTS} from '../../products-data'
export default function PDP({params}){
  const p = PRODUCTS.find(x=>x.id===params.id) || PRODUCTS[0]
  return (<div className="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-2 gap-10">
    <div><img src={p.img} className="rounded-2xl aspect-[4/5] object-cover w-full"/><div className="grid grid-cols-4 gap-2 mt-2">{[1,2,3,4].map(i=><img key={i} src={p.img} className="aspect-square object-cover rounded-lg border"/>)}</div></div>
    <div><h1 className="text-3xl font-light">{p.name}</h1><p className="mt-1 text-sm text-stone-500">{p.rating} ★ ({p.reviews} reviews) {p.tag && '• '+p.tag}</p><p className="mt-3 text-2xl font-semibold">₹ {p.price.toLocaleString('en-IN')} {p.mrp>p.price && <span className="ml-2 text-base line-through text-stone-400">₹{p.mrp}</span>}</p>
    <p className="mt-4 text-stone-700">{p.story || 'Handwoven mul cotton with a story in every thread. Made by artisans in West Bengal.'}</p>
    <div className="mt-6 space-y-3">
      {p.sizes && <div><p className="text-sm mb-1">Size</p><div className="flex gap-2">{p.sizes.map(s=><button key={s} className="border px-3 py-1 rounded-lg text-sm">{s}</button>)}</div></div>}
      <button className="w-full bg-[#7A1F2B] text-white py-3 rounded-xl">Add to Cart</button>
      <button className="w-full border py-3 rounded-xl">Buy with COD</button>
      <ul className="text-xs text-stone-600 space-y-1 mt-2"><li>✓ Free shipping over ₹1999</li><li>✓ 7-day easy returns</li><li>✓ Ships in 2-4 days</li></ul>
    </div>
    <dl className="mt-8 grid grid-cols-2 gap-3 text-sm border-t pt-6"><dt className="text-stone-500">Fabric</dt><dd>{p.fabric}</dd><dt className="text-stone-500">Technique</dt><dd>{p.technique}</dd><dt className="text-stone-500">Occasion</dt><dd>{p.occasion}</dd><dt className="text-stone-500">Blouse Piece</dt><dd>{p.blouse?'Included':'No'}</dd></dl>
    </div></div>)
}
