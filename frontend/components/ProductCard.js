
import Link from 'next/link'
import { StarIcon } from './icons'

const FALLBACK_IMG = 'https://images.unsplash.com/photo-1596462502278-27bfdc403348'

export default function ProductCard({ product: p, eager = false }){
  return (
    <Link href={`/product/${p.id}`} className="group bg-surface-raised border border-line rounded-2xl overflow-hidden hover:shadow-lg hover:border-accent-soft transition-all duration-300">
      <div className="relative overflow-hidden">
        <img
          src={`${p.img || FALLBACK_IMG}?auto=format&fit=crop&w=600&q=75`}
          alt={p.name}
          width="600" height="750"
          loading={eager ? 'eager' : 'lazy'}
          className="aspect-[4/5] object-cover w-full group-hover:scale-105 transition-transform duration-300"
        />
        {p.tag && <span className="absolute top-3 left-3 text-xs font-medium bg-primary text-primary-foreground px-2.5 py-1 rounded-full">{p.tag}</span>}
      </div>
      <div className="p-4">
        <h3 className="font-sans font-medium text-ink">{p.name}</h3>
        <p className="mt-0.5 flex items-center gap-1 text-sm text-ink-soft">
          <StarIcon className="text-accent"/>
          <span>{p.rating}</span>
          <span aria-hidden="true">·</span>
          <span>{p.reviews} reviews</span>
        </p>
        <p className="mt-1.5 font-semibold tabular-nums">
          ₹ {p.price.toLocaleString('en-IN')}
          {p.mrp > p.price && <span className="ml-2 text-sm font-normal line-through text-ink-soft/60 tabular-nums">₹{p.mrp.toLocaleString('en-IN')}</span>}
        </p>
      </div>
    </Link>
  )
}
