
import './globals.css'
import Header from '../components/Header'
import Footer from '../components/Footer'
export const metadata = { title: 'Suta Clone', description: 'Handloom stories, modern commerce' }
export default function RootLayout({ children }) {
  return (<html lang="en"><body className="bg-stone-50 text-stone-900"><Header/>{children}<Footer/></body></html>)
}
