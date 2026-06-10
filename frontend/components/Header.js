
import Link from 'next/link'
import { SearchIcon, HeartIcon, BagIcon, UserIcon } from './icons'

const navLinks = [
  { href: '/collections/sarees', label: 'Sarees' },
  { href: '/collections/blouses', label: 'Blouses' },
  { href: '/collections/mens', label: 'Mens' },
  { href: '/stories', label: 'Stories' },
  { href: '/artisans', label: 'Artisans' },
]

export default function Header(){
  return (<header className="sticky top-0 z-40">
    <p className="bg-primary text-primary-foreground text-center text-xs tracking-wide py-1.5">
      Free shipping over ₹1999 &nbsp;•&nbsp; Cash on Delivery &nbsp;•&nbsp; Easy 7-day returns
    </p>
    <div className="bg-surface-raised/95 backdrop-blur border-b border-line">
      <div className="max-w-7xl mx-auto px-4 h-16 flex items-center justify-between gap-6">
        <Link href="/" className="font-display text-3xl font-semibold tracking-wide text-ink">
          suta<span className="text-accent">.</span>
        </Link>
        <nav aria-label="Main" className="hidden md:flex gap-7 text-sm font-medium text-ink-soft">
          {navLinks.map(l => (
            <Link key={l.href} href={l.href} className="py-2 hover:text-primary transition-colors duration-200">{l.label}</Link>
          ))}
        </nav>
        <div className="flex items-center gap-1">
          <Link href="/search" aria-label="Search" className="p-3 rounded-full hover:bg-surface transition-colors duration-200"><SearchIcon/></Link>
          <Link href="/wishlist" aria-label="Wishlist" className="p-3 rounded-full hover:bg-surface transition-colors duration-200"><HeartIcon/></Link>
          <Link href="/account" aria-label="Account" className="hidden sm:block p-3 rounded-full hover:bg-surface transition-colors duration-200"><UserIcon/></Link>
          <Link href="/cart" aria-label="Cart" className="p-3 rounded-full hover:bg-surface transition-colors duration-200"><BagIcon/></Link>
        </div>
      </div>
      <nav aria-label="Main mobile" className="md:hidden border-t border-line overflow-x-auto">
        <div className="flex gap-5 px-4 py-2.5 text-sm font-medium text-ink-soft whitespace-nowrap">
          {navLinks.map(l => (
            <Link key={l.href} href={l.href} className="py-1 hover:text-primary">{l.label}</Link>
          ))}
        </div>
      </nav>
    </div>
  </header>)
}
