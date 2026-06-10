
export const PRODUCTS = [
  {id:'beet-turnip', name:'Beet and Turnip', price:4200, mrp:4200, rating:4.95, reviews:784, tag:'Bestseller', fabric:'Mul Cotton', technique:'Handwoven', occasion:'Office Wear', size:[''], img:'https://images.unsplash.com/photo-1596462502278-27bfdc403348', blouse:true, story:'Winter market hues from Kolkata, woven in Phulia.'},
  {id:'bells-ireland', name:'Bells of Ireland', price:4200, mrp:4200, rating:4.91, reviews:180, tag:'Bestseller', fabric:'Mul Cotton', technique:'Handloom', occasion:'Festive Wear', img:'https://images.unsplash.com/photo-1610030469983-98e2f1e8c7c4', blouse:true},
  {id:'parallel-universe', name:'Parallel Universe', price:4250, mrp:4250, rating:4.93, reviews:91, fabric:'Cotton', technique:'Handwoven', occasion:'Casual Wear', img:'https://images.unsplash.com/photo-1520975916090-3105956dac38', blouse:true},
  {id:'boundless-safar', name:'Boundless Safar', price:2350, mrp:2350, rating:5.0, reviews:11, tag:'Most Loved', fabric:'Cotton', technique:'Colour Block', occasion:'Daily Wear', img:'https://images.unsplash.com/photo-1583394838336-acd977736f90', blouse:false, stock:6},
  {id:'wandering-whirlwind', name:'Wandering Whirlwind', price:1365, mrp:2410, rating:5.0, reviews:1, fabric:'Cotton', technique:'Embroidery', occasion:'Office Wear', img:'https://images.unsplash.com/photo-1598554747436-c9293d6a588f', category:'blouse', sizes:['S','L']},
];
export const FILTERS = {
  fabric:['Acrylic','Cotton','Linen','Mul Cotton'],
  technique:['Colour Block','Embroidery','Hand Embroidery','Handloom','Handwoven','Jamdani'],
  occasion:['Casual Wear','Evening Wear','Festive Wear','Office Wear','Wedding Wear'],
  size:['XS','S','M','L','XL','XXL'],
  discount:['30% Off','50% Off']
}

export const API_URL = process.env.NEXT_PUBLIC_API_URL || 'http://localhost:4000';
