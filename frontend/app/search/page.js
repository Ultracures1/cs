
import {PRODUCTS} from '../products-data'
import Link from 'next/link'
export default function Search(){ return (<div className="max-w-6xl mx-auto px-4 py-10"><input placeholder="Search sarees, blouses..." className="w-full border rounded-xl px-4 py-3 mb6"/><div className="grid grid-cols-2 md:grid-cols-4 gap-6">{PRODUCTS.map(p=><Link key={p.id} href={`/product/${p.id}`} className="bg-white border rounded-xl overflow-hidden"><img src={p.img} className="aspect-[4/5] object-cover"/><div className="p3 text-sm">{p.name}</div></Link>)}</div></div>) }
