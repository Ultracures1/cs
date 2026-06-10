
import './globals.css'
export const metadata = { title: 'Suta Clone', description: 'Handloom stories, modern commerce' }
export default function RootLayout({ children }) {
  return (<html lang="en"><body className="bg-stone-50 text-stone-900">{children}</body></html>)
}
