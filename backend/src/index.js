
const express = require('express'); const cors = require('cors');
const app = express(); app.use(cors({origin: true, credentials: true})); app.use(express.json());
const PORT = process.env.PORT || 4000;

// Mock data - replace with DB later
const products = [
  {id:'beet-turnip', handle:'beet-turnip', name:'Beet and Turnip', price:4200, fabric:'Mul Cotton', technique:'Handwoven', occasion:'Office Wear', rating:4.95, reviews:784},
  {id:'bells-ireland', handle:'bells-ireland', name:'Bells of Ireland', price:4200, fabric:'Mul Cotton', technique:'Handloom', occasion:'Festive Wear', rating:4.91, reviews:180},
];

app.get('/', (req,res)=> res.json({ok:true, service:'suta-api'}));
app.get('/api/products', (req,res)=>{ res.json(products); });
app.get('/api/products/:id', (req,res)=>{ const p = products.find(x=>x.handle===req.params.id); res.json(p||{}); });
app.get('/api/v1/products', (req,res)=>{ res.json(products); });
app.get('/health', (req,res)=> res.send('ok'));

app.listen(PORT, '0.0.0.0', ()=> console.log('API on port', PORT));
