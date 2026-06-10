
import {PRODUCTS} from '../../products-data'
import { StarIcon, CheckIcon } from '../../../components/icons'

export default function PDP({params}){
  const p = PRODUCTS.find(x=>x.id===params.id) || PRODUCTS[0]
  const imgBase = p.img || 'https://images.unsplash.com/photo-1596462502278-27bfdc403348'
  return (<main id="main" className="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-2 gap-10 lg:gap-14">
    <div>
      <img
        src={`${imgBase}?auto=format&fit=crop&w=900&q=80`}
        alt={p.name} width="900" height="1125" loading="eager"
        className="rounded-2xl aspect-[4/5] object-cover w-full border border-line"
      />
      <div className="grid grid-cols-4 gap-2.5 mt-2.5">
        {[1,2,3,4].map(i => (
          <img key={i} src={`${imgBase}?auto=format&fit=crop&w=220&q=70`} alt="" width="220" height="220" loading="lazy"
            className="aspect-square object-cover rounded-lg border border-line"/>
        ))}
      </div>
    </div>
    <div>
      <h1 className="text-4xl md:text-5xl font-medium leading-tight">{p.name}</h1>
      <p className="mt-2.5 flex items-center gap-1.5 text-sm text-ink-soft font-sans">
        <StarIcon className="text-accent"/>
        <span>{p.rating} ({p.reviews} reviews)</span>
        {p.tag && <span className="ml-1 text-xs font-medium bg-primary text-primary-foreground px-2.5 py-0.5 rounded-full">{p.tag}</span>}
      </p>
      <p className="mt-4 text-3xl font-sans font-semibold tabular-nums">
        ₹ {p.price.toLocaleString('en-IN')}
        {p.mrp > p.price && <span className="ml-3 text-lg font-normal line-through text-ink-soft/60 tabular-nums">₹{p.mrp.toLocaleString('en-IN')}</span>}
      </p>
      <p className="mt-5 font-display text-lg leading-relaxed text-ink-soft">
        {p.story || 'Handwoven mul cotton with a story in every thread. Made by artisans in West Bengal.'}
      </p>
      <div className="mt-7 space-y-3.5">
        {p.sizes && <div>
          <p className="text-sm font-sans font-medium mb-2">Size</p>
          <div className="flex gap-2.5">
            {p.sizes.map(s => (
              <button key={s} className="min-w-[44px] min-h-[44px] px-4 border border-line rounded-lg text-sm font-sans hover:border-primary hover:text-primary transition-colors duration-200">{s}</button>
            ))}
          </div>
        </div>}
        <button className="w-full bg-primary text-primary-foreground font-sans font-semibold py-3.5 rounded-xl hover:bg-primary-dark active:scale-[0.99] transition-all duration-200">
          Add to Cart
        </button>
        <button className="w-full border border-ink font-sans font-medium py-3.5 rounded-xl hover:bg-ink hover:text-white transition-colors duration-200">
          Buy with COD
        </button>
        <ul className="text-sm text-ink-soft font-sans space-y-1.5 pt-1.5">
          <li className="flex items-center gap-2"><CheckIcon className="text-primary shrink-0"/>Free shipping over ₹1999</li>
          <li className="flex items-center gap-2"><CheckIcon className="text-primary shrink-0"/>7-day easy returns</li>
          <li className="flex items-center gap-2"><CheckIcon className="text-primary shrink-0"/>Ships in 2–4 days</li>
        </ul>
      </div>
      <dl className="mt-9 grid grid-cols-2 gap-x-6 gap-y-3 text-sm font-sans border-t border-line pt-6">
        <dt className="text-ink-soft">Fabric</dt><dd className="font-medium">{p.fabric}</dd>
        <dt className="text-ink-soft">Technique</dt><dd className="font-medium">{p.technique}</dd>
        <dt className="text-ink-soft">Occasion</dt><dd className="font-medium">{p.occasion}</dd>
        <dt className="text-ink-soft">Blouse Piece</dt><dd className="font-medium">{p.blouse ? 'Included' : 'No'}</dd>
      </dl>
    </div>
  </main>)
}
