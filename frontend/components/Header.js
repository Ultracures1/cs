
import Link from 'next/link'
export default function Header(){
  return (<header className="border-b bg-white sticky top-0 z-20">
    <div className="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
      <Link href="/" className="text-2xl font-semibold tracking-widest">suta<span className="text-[#C9A86A]">.</span></Link>
      <nav className="hidden md:flex gap-6 text-sm">
        <Link href="/collections/sarees">Sarees</Link>
        <Link href="/collections/blouses">Blouses</Link>
        <Link href="/collections/mens">Mens</Link>
        <Link href="/stories">Stories</Link>
        <Link href="/artisans">Artisans</Link>
      </nav>
      <div className="flex gap-4 text-sm">
        <Link href="/search">Search</Link>
        <Link href="/wishlist">Wishlist</Link>
        <Link href="/cart">Cart</Link>
        <Link href="/account">Account</Link>
      </div>
    </div>
    <div className="bg-stone-100 text-center text-xs py-1">Free shipping over ₹1999 • COD • Easy returns</div>
  </header>)
}
