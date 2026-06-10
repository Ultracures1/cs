
const express = require('express'); const cors = require('cors');
const app = express(); app.use(cors({origin: true, credentials: true})); app.use(express.json());
const PORT = process.env.PORT || 4000;

// Mock data - replace with DB later
const products = [
  {id:'beet-turnip', handle:'beet-turnip', name:'Beet and Turnip', price:4200, mrp:4200, fabric:'Mul Cotton', technique:'Handwoven', occasion:'Office Wear', rating:4.95, reviews:784, tag:'Bestseller', img:'https://images.unsplash.com/photo-1596462502278-27bfdc403348', blouse:true, story:'Winter market hues from Kolkata, woven in Phulia.'},
  {id:'bells-ireland', handle:'bells-ireland', name:'Bells of Ireland', price:4200, mrp:4200, fabric:'Mul Cotton', technique:'Handloom', occasion:'Festive Wear', rating:4.91, reviews:180, tag:'Bestseller', img:'https://images.unsplash.com/photo-1610030469983-98e2f1e8c7c4', blouse:true},
  {id:'parallel-universe', handle:'parallel-universe', name:'Parallel Universe', price:4250, mrp:4250, fabric:'Cotton', technique:'Handwoven', occasion:'Casual Wear', rating:4.93, reviews:91, img:'https://images.unsplash.com/photo-1520975916090-3105956dac38', blouse:true},
  {id:'boundless-safar', handle:'boundless-safar', name:'Boundless Safar', price:2350, mrp:2350, fabric:'Cotton', technique:'Colour Block', occasion:'Daily Wear', rating:5.0, reviews:11, tag:'Most Loved', img:'https://images.unsplash.com/photo-1583394838336-acd977736f90', blouse:false},
  {id:'wandering-whirlwind', handle:'wandering-whirlwind', name:'Wandering Whirlwind', price:1365, mrp:2410, fabric:'Cotton', technique:'Embroidery', occasion:'Office Wear', rating:5.0, reviews:1, img:'https://images.unsplash.com/photo-1598554747436-c9293d6a588f', category:'blouse', sizes:['S','L']},
];

app.get('/', (req,res)=> res.json({ok:true, service:'suta-api'}));
app.get('/api/products', (req,res)=>{ const {fabric, occasion} = req.query; let out = products; if(fabric) out = out.filter(p=>p.fabric.toLowerCase().includes(String(fabric).toLowerCase())); if(occasion) out = out.filter(p=>p.occasion.toLowerCase().includes(String(occasion).toLowerCase())); res.json(out); });
app.get('/api/products/:id', (req,res)=>{ const p = products.find(x=>x.handle===req.params.id); res.json(p||{}); });
app.get('/api/v1/products', (req,res)=>{ res.json(products); });
app.get('/health', (req,res)=> res.send('ok'));

app.listen(PORT, '0.0.0.0', ()=> console.log('API on port', PORT));
