
# Deploy Suta Clone to Railway

> **IMPORTANT — Root Directory:** this repo is a monorepo. Every service MUST
> have its **Root Directory** set (Service → Settings → Source → Root
> Directory). If you deploy the repo root, the build fails with
> "Railpack could not determine how to build the app."

## 1. Create project
- Go to railway.app → New Project → Deploy from GitHub → select this repo

## 2. Add PostgreSQL
- New → Database → PostgreSQL
- Copy DATABASE_URL

## 3. Deploy Backend
- New → Service → GitHub Repo → select this repo
- **Settings → Source → Root Directory: `backend`**
- Variables:
  PORT=4000
  DATABASE_URL=<from postgres>
  JWT_SECRET=<random 32 chars>
- Redeploy. Railway detects Node via backend/railway.toml. Build takes ~1 min.
- Settings → Networking → Generate Domain, copy the backend URL
  (e.g. https://suta-api-production.up.railway.app)

Run schema:
- In Railway DB → Connect → psql
- Paste contents of database/schema.sql

## 4. Deploy Frontend
- New → Service → GitHub Repo → select this repo again
- **Settings → Source → Root Directory: `frontend`**
- Variables:
  NEXT_PUBLIC_API_URL=<backend URL from step 3>
- Redeploy (build: npm install && npm run build, start: npm start — already
  configured in frontend/railway.toml)
- Settings → Networking → Generate Domain for the public site URL

## 5. Connect
- Update CORS in backend if needed (already open)
- Test: <backend URL>/api/v1/products should return JSON

## 6. Custom domain (optional)
- Settings → Domains → add your domain
