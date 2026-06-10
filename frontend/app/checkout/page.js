
export default function Checkout(){
  return (<div className="max-w-5xl mx-auto px-4 py-10 grid md:grid-cols-2 gap-10">
    <form className="space-y4"><h1 className="text-2xl">Checkout</h1>
      <div><h3 className="font-medium mb2">Contact</h3><input placeholder="Phone (OTP login)" className="w-full border rounded-lg px-3 py-2"/></div>
      <div><h3 className="font-medium mb2">Shipping Address</h3><div className="grid grid-cols-2 gap3"><input placeholder="Full Name" className="border rounded-lg px-3 py-2 col-span-2"/><input placeholder="Pincode" className="border rounded-lg px-3 py-2"/><input placeholder="City" className="border rounded-lg px-3 py-2"/><input placeholder="Address" className="border rounded-lg px-3 py-2 col-span-2"/></div></div>
      <div><h3 className="font-medium mb2">Payment</h3><div className="space-y2"><label className="flex items-center gap2 border rounded-lg p-3"><input type="radio" name="pay" defaultChecked/><span>UPI / Cards / Netbanking (Razorpay)</span></label><label className="flex items-center gap2 border rounded-lg p-3"><input type="radio" name="pay"/><span>Cash on Delivery</span></label></div></div>
      <button className="w-full bg-[#7A1F2B] text-white py-3 rounded-xl">Place Order</button>
    </form>
    <aside className="bg-white border rounded-xl p-4 h-fit"><h3 className="font-semibold">Your order</h3><p className="text-sm text-stone-600 mt2">2 items • Free shipping</p></aside>
  </div>)
}
