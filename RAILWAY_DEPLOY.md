
# Deploy Suta Clone to Railway

## 1. Create project
- Go to railway.app → New Project → Deploy from GitHub (push this folder) or Empty Project

## 2. Add PostgreSQL
- New → Database → PostgreSQL
- Copy DATABASE_URL

## 3. Deploy Backend
- New → Service → GitHub Repo (select backend folder) or Dockerfile
- Variables:
  PORT=4000
  DATABASE_URL=<from postgres>
  JWT_SECRET=<random 32 chars>
- Railway auto-detects Dockerfile. Build succeeds in ~1 min.
- After deploy, copy backend URL: https://suta-api-production.up.railway.app

Run schema:
- In Railway DB → Connect → psql
- Paste contents of database/schema.sql

## 4. Deploy Frontend
- New Service → select frontend folder
- Variables:
  NEXT_PUBLIC_API_URL=https://suta-api-production.up.railway.app
- Build command: npm install && npm run build
- Start: npm start
- Railway gives URL: https://suta-web-production.up.railway.app

## 5. Connect
- Update CORS in backend if needed (already open)
- Test: /api/v1/products should return JSON

## 6. Custom domain (optional)
- Settings → Domains → add your domain
