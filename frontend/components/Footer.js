
import Link from 'next/link'

const cols = [
  { title: 'Shop', links: [
    { href: '/collections/sarees', label: 'Sarees' },
    { href: '/collections/blouses', label: 'Blouses' },
    { href: '/collections/mens', label: 'Mens' },
  ]},
  { title: 'Help', links: [
    { href: '/pages/shipping', label: 'Shipping' },
    { href: '/pages/returns', label: 'Returns' },
    { href: '/pages/contact', label: 'Contact' },
  ]},
  { title: 'About', links: [
    { href: '/pages/about', label: 'Our Story' },
    { href: '/artisans', label: 'Artisans' },
    { href: '/stories', label: 'Stories' },
  ]},
]

export default function Footer(){
  return (<footer className="mt-20 bg-ink text-stone-300">
    <div className="max-w-7xl mx-auto px-4 py-14 grid gap-10 sm:grid-cols-2 md:grid-cols-4 text-sm">
      <div>
        <p className="font-display text-3xl font-semibold text-white">suta<span className="text-accent-soft">.</span></p>
        <p className="mt-3 leading-relaxed text-stone-400 max-w-xs">
          Woven stories, everyday wear. Handmade in India alongside 14,000+ weavers and artisans.
        </p>
      </div>
      {cols.map(col => (
        <nav key={col.title} aria-label={col.title}>
          <h4 className="font-sans font-semibold text-white tracking-wide uppercase text-xs mb-4">{col.title}</h4>
          <ul className="space-y-2.5">
            {col.links.map(l => (
              <li key={l.href}><Link href={l.href} className="hover:text-accent-soft transition-colors duration-200">{l.label}</Link></li>
            ))}
          </ul>
        </nav>
      ))}
    </div>
    <div className="border-t border-stone-800">
      <div className="max-w-7xl mx-auto px-4 py-5 flex flex-col sm:flex-row gap-2 items-center justify-between text-xs text-stone-500">
        <p>© {new Date().getFullYear()} Suta Clone. Crafted with care.</p>
        <p>Free shipping over ₹1999 • COD available • 7-day returns</p>
      </div>
    </div>
  </footer>)
}
