
import Link from 'next/link'
const stories = [{slug:'weaving-phulia', title:'Weaving in Phulia', excerpt:'Meet the hands behind mul cotton.'},{slug:'saree-stories', title:'Why we name sarees', excerpt:'Every name holds a memory.'}]
export default function Stories(){ return (<div className="max-w-5xl mx-auto px-4 py-10"><h1 className="text-3xl font-light mb6">Stories</h1><div className="grid md:grid-cols-2 gap-6">{stories.map(s=><Link key={s.slug} href={`/stories/${s.slug}`} className="bg-white border rounded-xl p-6 hover:shadow"><h3 className="text-xl mb2">{s.title}</h3><p className="text-stone-600">{s.excerpt}</p></Link>)}</div></div>) }
