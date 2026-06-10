
import {PRODUCTS, FILTERS} from '../../products-data'
import ProductCard from '../../../components/ProductCard'

export default function Collection({params}){
  const handle = params.handle
  const list = handle==='blouses' ? PRODUCTS.filter(p=>p.category==='blouse') : PRODUCTS.filter(p=>p.category!=='blouse')
  return (<main id="main" className="max-w-7xl mx-auto px-4 py-10 grid md:grid-cols-[250px_1fr] gap-10">
    <aside className="hidden md:block" aria-label="Filters">
      <h2 className="font-sans text-sm font-semibold uppercase tracking-wide text-ink mb-5">Filters</h2>
      {Object.entries(FILTERS).map(([group, values]) => (
        <fieldset key={group} className="mb-6 border-b border-line pb-5">
          <legend className="font-sans text-sm font-medium capitalize text-ink mb-2.5">{group}</legend>
          <div className="space-y-1">
            {values.map(v => (
              <label key={v} className="flex items-center gap-2.5 py-1.5 text-sm text-ink-soft cursor-pointer hover:text-ink transition-colors duration-150">
                <input type="checkbox" className="w-4 h-4 rounded border-line accent-[#7A1F2B]"/>
                <span>{v}</span>
              </label>
            ))}
          </div>
        </fieldset>
      ))}
    </aside>
    <section>
      <div className="flex items-baseline justify-between mb-6">
        <h1 className="text-4xl font-medium capitalize">{handle}</h1>
        <p className="text-sm text-ink-soft font-sans">{list.length} products</p>
      </div>
      {list.length === 0 ? (
        <div className="rounded-2xl border border-line bg-surface-raised p-12 text-center">
          <p className="font-display text-2xl">Nothing here yet</p>
          <p className="mt-2 text-sm text-ink-soft font-sans">New pieces are on the loom — check back soon or explore our sarees.</p>
        </div>
      ) : (
        <div className="grid grid-cols-2 lg:grid-cols-3 gap-5 md:gap-6">
          {list.map((p, i) => <ProductCard key={p.id} product={p} eager={i < 3}/>)}
        </div>
      )}
    </section>
  </main>)
}
