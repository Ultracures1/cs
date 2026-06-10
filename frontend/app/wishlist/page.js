
import {PRODUCTS} from '../products-data'
import Link from 'next/link'
export default function Wishlist(){ return (<div className="max-w-7xl mx-auto px-4 py-10"><h1 className="text-2xl mb6">Wishlist</h1><div className="grid grid-cols-2 md:grid-cols-4 gap-6">{PRODUCTS.slice(0,4).map(p=><Link href={`/product/${p.id}`} key={p.id} className="bg-white border rounded-xl overflow-hidden"><img src={p.img} className="aspect-[4/5] object-cover"/><div className="p3"><h3 className="text-sm">{p.name}</h3><p className="font-semibold mt1">₹{p.price}</p></div></Link>)}</div></div>) }
