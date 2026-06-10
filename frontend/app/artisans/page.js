
import Link from 'next/link'
const artisans = [{id:'maya-das', name:'Maya Das', place:'Phulia, WB', craft:'Mul Cotton'},{id:'ramesh', name:'Ramesh Patil', place:'Maheshwar, MP', craft:'Maheshwari'}]
export default function Artisans(){ return (<div className="max-w-6xl mx-auto px-4 py-10"><h1 className="text-3xl font-light mb6">Artisans</h1><div className="grid md:grid-cols-3 gap-6">{artisans.map(a=><Link href={`/artisans/${a.id}`} key={a.id} className="bg-white border rounded-xl p-6"><h3 className="text-lg">{a.name}</h3><p className="text-sm text-stone-600">{a.place} • {a.craft}</p></Link>)}</div></div>) }
