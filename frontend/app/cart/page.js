
import Link from 'next/link'
import {PRODUCTS} from '../products-data'
export default function Cart(){
  const items = PRODUCTS.slice(0,2)
  const subtotal = items.reduce((s,p)=>s+p.price,0)
  const shipping = subtotal>1999?0:99
  return (<div className="max-w-5xl mx-auto px-4 py-10 grid md:grid-cols-[1fr_320px] gap-8">
    <div><h1 className="text-2xl mb4">Cart</h1><div className="space-y4">{items.map(p=>(<div key={p.id} className="flex gap4 bg-white border rounded-xl p3"><img src={p.img} className="w-24 h-30 object-cover rounded"/><div className="flex-1"><h3>{p.name}</h3><p className="text-sm text-stone-500">{p.fabric}</p><p className="mt2 font-semibold">₹{p.price}</p></div></div>))}</div></div>
    <aside className="bg-white border rounded-xl p-4 h-fit sticky top-24"><h3 className="font-semibold mb3">Order Summary</h3><div className="space-y2 text-sm"><div className="flex justify-between"><span>Subtotal</span><span>₹{subtotal}</span></div><div className="flex justify-between"><span>Shipping</span><span>{shipping===0?'Free':'₹'+shipping}</span></div><div className="flex justify-between font-semibold border-t pt2"><span>Total</span><span>₹{subtotal+shipping}</span></div></div><Link href="/checkout" className="mt4 block text-center bg-[#7A1F2B] text-white py-3 rounded-xl">Checkout</Link><p className="text-xs text-stone-500 mt2 text-center">COD • UPI • Cards</p></aside>
  </div>)
}
