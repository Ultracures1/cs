
'use client'

import { useState, useEffect, useCallback } from 'react'
import Link from 'next/link'
import Header from '../components/Header'
import Footer from '../components/Footer'
import { FILTERS, API_URL } from './products-data'

// ─── Filter sidebar ────────────────────────────────────────────────────────────

const FILTER_LABELS = {
  fabric: 'Fabric',
  technique: 'Technique',
  occasion: 'Occasion',
  size: 'Size',
}

function FilterSection({ label, options, selected, onChange }) {
  const [open, setOpen] = useState(true)
  return (
    <div className="border-b border-stone-200 py-4">
      <button
        onClick={() => setOpen(o => !o)}
        className="w-full flex items-center justify-between text-sm font-semibold uppercase tracking-wider text-stone-700 hover:text-[#7A1F2B] transition-colors"
      >
        <span>{label}</span>
        <span className="text-lg leading-none">{open ? '−' : '+'}</span>
      </button>
      {open && (
        <div className="mt-3 space-y-2">
          {options.map(opt => {
            const checked = selected.includes(opt)
            return (
              <label
                key={opt}
                onClick={() => onChange(opt)}
                className="flex items-center gap-2.5 cursor-pointer group"
              >
                <span
                  className={`w-4 h-4 rounded border flex-shrink-0 flex items-center justify-center transition-colors ${
                    checked
                      ? 'bg-[#7A1F2B] border-[#7A1F2B]'
                      : 'border-stone-300 group-hover:border-[#7A1F2B]'
                  }`}
                >
                  {checked && (
                    <svg className="w-2.5 h-2.5 text-white" fill="none" viewBox="0 0 10 10">
                      <path d="M1.5 5l2.5 2.5 4.5-4.5" stroke="currentColor" strokeWidth="1.5" strokeLinecap="round" strokeLinejoin="round"/>
                    </svg>
                  )}
                </span>
                <span className={`text-sm ${checked ? 'text-[#7A1F2B] font-medium' : 'text-stone-600'}`}>
                  {opt}
                </span>
              </label>
            )
          })}
        </div>
      )}
    </div>
  )
}

// ─── Product card ──────────────────────────────────────────────────────────────

function ProductCard({ product }) {
  const imageUrl =
    product.images?.[0]?.url ||
    product.image_url ||
    'https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=600'

  const price = product.price ?? product.variants?.[0]?.price ?? 0
  const mrp = product.mrp ?? product.variants?.[0]?.mrp ?? price
  const hasDiscount = mrp > price

  return (
    <Link
      href={`/product/${product.id}`}
      className="group bg-white rounded-2xl overflow-hidden border border-stone-100 hover:shadow-lg hover:-translate-y-0.5 transition-all duration-200"
    >
      {/* Image */}
      <div className="relative aspect-[4/5] overflow-hidden bg-stone-100">
        <img
          src={imageUrl}
          alt={product.name}
          className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
          onError={e => {
            e.target.src = 'https://images.unsplash.com/photo-1596462502278-27bfdc403348?w=600'
          }}
        />
        {product.tag && (
          <span className="absolute top-2.5 left-2.5 bg-[#7A1F2B] text-white text-[10px] font-semibold uppercase tracking-wider px-2.5 py-1 rounded-full shadow">
            {product.tag}
          </span>
        )}
        {hasDiscount && (
          <span className="absolute top-2.5 right-2.5 bg-[#C9A86A] text-white text-[10px] font-semibold px-2 py-1 rounded-full shadow">
            {Math.round(((mrp - price) / mrp) * 100)}% off
          </span>
        )}
      </div>

      {/* Info */}
      <div className="p-3.5">
        <h3 className="text-sm font-medium text-stone-800 truncate leading-snug">
          {product.name}
        </h3>
        {(product.fabric || product.technique) && (
          <p className="text-xs text-stone-400 mt-0.5 truncate">
            {[product.fabric, product.technique].filter(Boolean).join(' · ')}
          </p>
        )}
        <div className="mt-2 flex items-baseline justify-between gap-2">
          <div className="flex items-baseline gap-1.5">
            <span className="font-semibold text-stone-900">
              ₹{Number(price).toLocaleString('en-IN')}
            </span>
            {hasDiscount && (
              <span className="text-xs text-stone-400 line-through">
                ₹{Number(mrp).toLocaleString('en-IN')}
              </span>
            )}
          </div>
          {product.rating != null && (
            <span className="text-xs text-stone-500 whitespace-nowrap">
              {Number(product.rating).toFixed(2)} ★
              {product.reviews != null && (
                <span className="text-stone-400"> ({product.reviews})</span>
              )}
            </span>
          )}
        </div>
      </div>
    </Link>
  )
}

// ─── Skeleton loader ───────────────────────────────────────────────────────────

function SkeletonCard() {
  return (
    <div className="bg-white rounded-2xl overflow-hidden border border-stone-100 animate-pulse">
      <div className="aspect-[4/5] bg-stone-200" />
      <div className="p-3.5 space-y-2">
        <div className="h-3.5 bg-stone-200 rounded w-3/4" />
        <div className="h-3 bg-stone-100 rounded w-1/2" />
        <div className="h-4 bg-stone-200 rounded w-1/3 mt-1" />
      </div>
    </div>
  )
}

// ─── Sort options ──────────────────────────────────────────────────────────────

const SORT_OPTIONS = [
  { value: 'featured', label: 'Featured' },
  { value: 'price_asc', label: 'Price: Low to High' },
  { value: 'price_desc', label: 'Price: High to Low' },
  { value: 'rating', label: 'Top Rated' },
  { value: 'newest', label: 'Newest' },
]

// ─── Main page ─────────────────────────────────────────────────────────────────

export default function Home() {
  const [products, setProducts] = useState([])
  const [loading, setLoading] = useState(true)
  const [error, setError] = useState(null)
  const [activeFilters, setActiveFilters] = useState({
    fabric: [],
    technique: [],
    occasion: [],
    size: [],
  })
  const [sort, setSort] = useState('featured')
  const [mobileFiltersOpen, setMobileFiltersOpen] = useState(false)

  // Fetch products from API
  useEffect(() => {
    const controller = new AbortController()
    setLoading(true)
    setError(null)

    fetch(`${API_URL}/api/v1/products`, { signal: controller.signal })
      .then(res => {
        if (!res.ok) throw new Error(`Server error ${res.status}`)
        return res.json()
      })
      .then(data => {
        // API may return { products: [...] } or a plain array
        const list = Array.isArray(data) ? data : data.products ?? []
        setProducts(list)
        setLoading(false)
      })
      .catch(err => {
        if (err.name === 'AbortError') return
        setError(err.message)
        setLoading(false)
      })

    return () => controller.abort()
  }, [])

  // Toggle a single filter value
  const toggleFilter = useCallback((group, value) => {
    setActiveFilters(prev => {
      const current = prev[group]
      return {
        ...prev,
        [group]: current.includes(value)
          ? current.filter(v => v !== value)
          : [...current, value],
      }
    })
  }, [])

  const clearAllFilters = useCallback(() => {
    setActiveFilters({ fabric: [], technique: [], occasion: [], size: [] })
  }, [])

  const totalActiveFilters = Object.values(activeFilters).flat().length

  // Client-side filter + sort
  const displayed = (() => {
    let list = [...products]

    // Filter
    if (activeFilters.fabric.length)
      list = list.filter(p => activeFilters.fabric.includes(p.fabric))
    if (activeFilters.technique.length)
      list = list.filter(p => activeFilters.technique.includes(p.technique))
    if (activeFilters.occasion.length)
      list = list.filter(p => activeFilters.occasion.includes(p.occasion))
    if (activeFilters.size.length)
      list = list.filter(p =>
        p.sizes?.some(s => activeFilters.size.includes(s)) ||
        p.size?.some(s => activeFilters.size.includes(s))
      )

    // Sort
    if (sort === 'price_asc')
      list.sort((a, b) => (a.price ?? 0) - (b.price ?? 0))
    else if (sort === 'price_desc')
      list.sort((a, b) => (b.price ?? 0) - (a.price ?? 0))
    else if (sort === 'rating')
      list.sort((a, b) => (b.rating ?? 0) - (a.rating ?? 0))
    else if (sort === 'newest')
      list.sort((a, b) => new Date(b.created_at ?? 0) - new Date(a.created_at ?? 0))

    return list
  })()

  return (
    <>
      <Header />

      {/* ── Hero banner ── */}
      <section className="bg-[#7A1F2B] text-white">
        <div className="max-w-7xl mx-auto px-4 py-14 md:py-20 text-center">
          <p className="text-[#C9A86A] text-xs font-semibold uppercase tracking-[0.25em] mb-3">
            Handwoven in India
          </p>
          <h1 className="text-3xl md:text-5xl font-light leading-tight tracking-wide">
            Woven stories,{' '}
            <span className="italic text-[#C9A86A]">everyday wear</span>
          </h1>
          <p className="mt-4 text-stone-300 text-sm md:text-base max-w-xl mx-auto">
            Sarees, blouses &amp; more — crafted by 14,000+ artisans across India.
            Free shipping over ₹1999 · COD · Easy returns.
          </p>
          <div className="mt-8 flex flex-wrap justify-center gap-3">
            <Link
              href="/collections/sarees"
              className="bg-[#C9A86A] text-white text-sm font-semibold px-6 py-2.5 rounded-full hover:bg-[#b8954f] transition-colors"
            >
              Shop Sarees
            </Link>
            <Link
              href="/collections/blouses"
              className="border border-white/50 text-white text-sm px-6 py-2.5 rounded-full hover:bg-white/10 transition-colors"
            >
              Shop Blouses
            </Link>
          </div>
        </div>
      </section>

      {/* ── Announcement strip ── */}
      <div className="bg-[#C9A86A]/10 border-y border-[#C9A86A]/30 text-center text-xs text-[#7A1F2B] font-medium py-2 tracking-wide">
        ✦ New arrivals every week &nbsp;·&nbsp; Handwoven by artisans &nbsp;·&nbsp; Free shipping over ₹1999 ✦
      </div>

      {/* ── Main content: sidebar + grid ── */}
      <div className="max-w-7xl mx-auto px-4 py-8">

        {/* Mobile filter toggle */}
        <div className="flex items-center justify-between mb-5 md:hidden">
          <h2 className="text-lg font-semibold text-stone-800">All Products</h2>
          <button
            onClick={() => setMobileFiltersOpen(o => !o)}
            className="flex items-center gap-2 text-sm border border-stone-300 rounded-full px-4 py-1.5 hover:border-[#7A1F2B] transition-colors"
          >
            <svg className="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M3 4h18M7 12h10M11 20h2" />
            </svg>
            Filters
            {totalActiveFilters > 0 && (
              <span className="bg-[#7A1F2B] text-white text-[10px] rounded-full w-4 h-4 flex items-center justify-center">
                {totalActiveFilters}
              </span>
            )}
          </button>
        </div>

        <div className="grid md:grid-cols-[240px_1fr] gap-8">

          {/* ── Left sidebar ── */}
          <aside
            className={`${
              mobileFiltersOpen ? 'block' : 'hidden'
            } md:block`}
          >
            <div className="sticky top-20">
              {/* Sidebar header */}
              <div className="flex items-center justify-between mb-1">
                <h2 className="text-sm font-bold uppercase tracking-widest text-stone-700">
                  Filters
                </h2>
                {totalActiveFilters > 0 && (
                  <button
                    onClick={clearAllFilters}
                    className="text-xs text-[#7A1F2B] underline underline-offset-2 hover:text-[#C9A86A] transition-colors"
                  >
                    Clear all ({totalActiveFilters})
                  </button>
                )}
              </div>

              {/* Filter sections — only show filters defined in FILTER_LABELS */}
              {Object.entries(FILTER_LABELS).map(([key, label]) => (
                <FilterSection
                  key={key}
                  label={label}
                  options={FILTERS[key] ?? []}
                  selected={activeFilters[key]}
                  onChange={value => toggleFilter(key, value)}
                />
              ))}
            </div>
          </aside>

          {/* ── Product grid ── */}
          <section>
            {/* Toolbar */}
            <div className="hidden md:flex items-center justify-between mb-5">
              <h2 className="text-lg font-semibold text-stone-800">
                All Products
                {!loading && (
                  <span className="ml-2 text-sm font-normal text-stone-400">
                    ({displayed.length})
                  </span>
                )}
              </h2>
              <div className="flex items-center gap-2">
                <label className="text-xs text-stone-500">Sort by</label>
                <select
                  value={sort}
                  onChange={e => setSort(e.target.value)}
                  className="text-sm border border-stone-200 rounded-lg px-3 py-1.5 bg-white focus:outline-none focus:ring-1 focus:ring-[#7A1F2B]"
                >
                  {SORT_OPTIONS.map(o => (
                    <option key={o.value} value={o.value}>{o.label}</option>
                  ))}
                </select>
              </div>
            </div>

            {/* Active filter chips */}
            {totalActiveFilters > 0 && (
              <div className="flex flex-wrap gap-2 mb-5">
                {Object.entries(activeFilters).flatMap(([group, vals]) =>
                  vals.map(val => (
                    <button
                      key={`${group}-${val}`}
                      onClick={() => toggleFilter(group, val)}
                      className="flex items-center gap-1.5 text-xs bg-[#7A1F2B]/10 text-[#7A1F2B] border border-[#7A1F2B]/20 rounded-full px-3 py-1 hover:bg-[#7A1F2B]/20 transition-colors"
                    >
                      {val}
                      <svg className="w-3 h-3" fill="none" viewBox="0 0 12 12" stroke="currentColor">
                        <path strokeLinecap="round" d="M2 2l8 8M10 2l-8 8" strokeWidth="1.5"/>
                      </svg>
                    </button>
                  ))
                )}
              </div>
            )}

            {/* Error state */}
            {error && (
              <div className="flex flex-col items-center justify-center py-20 text-center">
                <div className="w-14 h-14 rounded-full bg-red-50 flex items-center justify-center mb-4">
                  <svg className="w-7 h-7 text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M12 9v4m0 4h.01M10.29 3.86L1.82 18a2 2 0 001.71 3h16.94a2 2 0 001.71-3L13.71 3.86a2 2 0 00-3.42 0z" />
                  </svg>
                </div>
                <p className="text-stone-600 font-medium">Couldn't load products</p>
                <p className="text-stone-400 text-sm mt-1">{error}</p>
                <button
                  onClick={() => window.location.reload()}
                  className="mt-5 text-sm bg-[#7A1F2B] text-white px-5 py-2 rounded-full hover:bg-[#6a1824] transition-colors"
                >
                  Try again
                </button>
              </div>
            )}

            {/* Loading skeletons */}
            {loading && !error && (
              <div className="grid grid-cols-2 lg:grid-cols-3 gap-4 md:gap-5">
                {Array.from({ length: 9 }).map((_, i) => (
                  <SkeletonCard key={i} />
                ))}
              </div>
            )}

            {/* Empty state */}
            {!loading && !error && displayed.length === 0 && (
              <div className="flex flex-col items-center justify-center py-20 text-center">
                <div className="w-14 h-14 rounded-full bg-stone-100 flex items-center justify-center mb-4">
                  <svg className="w-7 h-7 text-stone-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={1.5} d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                </div>
                <p className="text-stone-600 font-medium">No products match your filters</p>
                <button
                  onClick={clearAllFilters}
                  className="mt-4 text-sm text-[#7A1F2B] underline underline-offset-2"
                >
                  Clear all filters
                </button>
              </div>
            )}

            {/* Product grid */}
            {!loading && !error && displayed.length > 0 && (
              <div className="grid grid-cols-2 lg:grid-cols-3 gap-4 md:gap-5">
                {displayed.map(product => (
                  <ProductCard key={product.id} product={product} />
                ))}
              </div>
            )}
          </section>
        </div>
      </div>

      <Footer />
    </>
  )
}

