// Shared SVG icon set (Lucide-style outlines, 1.5px stroke) — no emoji icons.
const base = { fill: 'none', stroke: 'currentColor', strokeWidth: 1.5, strokeLinecap: 'round', strokeLinejoin: 'round' }

export const SearchIcon = (props) => (
  <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" {...base} {...props}><circle cx="11" cy="11" r="7"/><path d="m21 21-4.3-4.3"/></svg>
)
export const HeartIcon = (props) => (
  <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" {...base} {...props}><path d="M19 14c1.5-1.4 3-3.2 3-5.5A5.5 5.5 0 0 0 16.5 3c-1.8 0-3 .5-4.5 2-1.5-1.5-2.7-2-4.5-2A5.5 5.5 0 0 0 2 8.5c0 2.3 1.5 4.1 3 5.5l7 7Z"/></svg>
)
export const BagIcon = (props) => (
  <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" {...base} {...props}><path d="M6 7h12l1 14H5L6 7Z"/><path d="M9 10V6a3 3 0 0 1 6 0v4"/></svg>
)
export const UserIcon = (props) => (
  <svg viewBox="0 0 24 24" width="20" height="20" aria-hidden="true" {...base} {...props}><circle cx="12" cy="8" r="4"/><path d="M4 21c0-4 3.6-6 8-6s8 2 8 6"/></svg>
)
export const StarIcon = (props) => (
  <svg viewBox="0 0 24 24" width="14" height="14" aria-hidden="true" fill="currentColor" stroke="none" {...props}><path d="M12 2.5l2.9 6 6.6.9-4.8 4.6 1.2 6.5L12 17.4l-5.9 3.1 1.2-6.5L2.5 9.4l6.6-.9 2.9-6Z"/></svg>
)
export const CheckIcon = (props) => (
  <svg viewBox="0 0 24 24" width="16" height="16" aria-hidden="true" {...base} {...props}><path d="m4 12.5 5 5L20 6.5"/></svg>
)
export const TruckIcon = (props) => (
  <svg viewBox="0 0 24 24" width="18" height="18" aria-hidden="true" {...base} {...props}><path d="M1 5h14v11H1zM15 9h4l4 4v3h-8z"/><circle cx="6" cy="18.5" r="1.8"/><circle cx="18.5" cy="18.5" r="1.8"/></svg>
)
