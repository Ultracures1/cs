
const DATA = {
  'beet-turnip': {name:'Beet and Turnip', price:4200, story:'Inspired by winter markets in Kolkata, this mul cotton carries beet red and turnip white in a half-and-half weave. Handwoven by artisans in Phulia.', fabric:'Mul Cotton', technique:'Handwoven', occasion:'Office Wear', blouse:true, artisan:'Maya Das, West Bengal'},
}
export default function PDP({params}){
  const p = DATA[params.id] || DATA['beet-turnip']
  return (<div className="max-w-6xl mx-auto px-4 py-10 grid md:grid-cols-2 gap-10">
    <img src="https://images.unsplash.com/photo-1596462502278-27bfdc403348" className="rounded-2xl aspect-[4/5] object-cover"/>
    <div><h1 className="text-3xl font-light">{p.name}</h1><p className="mt2 text-2xl font-semibold">₹ {p.price.toLocaleString('en-IN')}</p>
    <p className="mt-4 text-stone-700">{p.story}</p>
    <dl className="mt-6 grid grid-cols-2 gap-2 text-sm"><dt className="text-stone-500">Fabric</dt><dd>{p.fabric}</dd><dt className="text-stone-500">Technique</dt><dd>{p.technique}</dd><dt className="text-stone-500">Occasion</dt><dd>{p.occasion}</dd><dt className="text-stone-500">Artisan</dt><dd>{p.artisan}</dd></dl>
    <button className="mt-8 w-full bg-suta-maroon text-white py-3 rounded-xl">Add to Cart — COD available</button>
    <p className="text-xs text-stone-500 mt-2">Free shipping over ₹1999 • 7-day returns</p>
    </div></div>)
}
