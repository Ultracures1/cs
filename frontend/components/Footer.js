
export default function Footer(){
  return (<footer className="border-t mt-16 bg-white">
    <div className="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-4 gap-8 text-sm">
      <div><h4 className="font-semibold mb2">Shop</h4><ul className="space-y-1 text-stone-600"><li>Sarees</li><li>Blouses</li><li>Mens</li></ul></div>
      <div><h4 className="font-semibold mb2">Help</h4><ul className="space-y-1 text-stone-600"><li><a href="/pages/shipping">Shipping</a></li><li><a href="/pages/returns">Returns</a></li><li><a href="/pages/contact">Contact</a></li></ul></div>
      <div><h4 className="font-semibold mb2">About</h4><ul className="space-y-1 text-stone-600"><li><a href="/pages/about">Our Story</a></li><li><a href="/artisans">Artisans</a></li></ul></div>
      <div><h4 className="font-semibold mb2">Weave with us</h4><p className="text-stone-600">14,000+ weavers. Handmade in India.</p></div>
    </div>
  </footer>)
}
