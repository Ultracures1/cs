import fs from "fs";
import path from "path";
import { fileURLToPath } from "url";
import { listProducts, getProduct } from "./controllers/productController.js";
import { createOrder, getOrder } from "./controllers/orderController.js";
import { subscribe, contact } from "./controllers/leadController.js";

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const PUBLIC_DIR = path.join(__dirname, "../public");
const BODY_LIMIT = 50 * 1024;

const MIME_TYPES = {
  ".html": "text/html; charset=utf-8",
  ".css": "text/css; charset=utf-8",
  ".js": "text/javascript; charset=utf-8",
  ".json": "application/json; charset=utf-8",
  ".png": "image/png",
  ".jpg": "image/jpeg",
  ".jpeg": "image/jpeg",
  ".svg": "image/svg+xml",
  ".webp": "image/webp",
  ".ico": "image/x-icon",
  ".woff2": "font/woff2",
  ".txt": "text/plain; charset=utf-8",
};

function sendJson(res, status, body) {
  const payload = JSON.stringify(body);
  res.writeHead(status, {
    "Content-Type": "application/json; charset=utf-8",
    "Content-Length": Buffer.byteLength(payload),
  });
  res.end(payload);
}

function readJsonBody(req) {
  return new Promise((resolve, reject) => {
    const chunks = [];
    let size = 0;
    req.on("data", (chunk) => {
      size += chunk.length;
      if (size > BODY_LIMIT) {
        reject(Object.assign(new Error("Payload too large"), { status: 413 }));
        req.destroy();
        return;
      }
      chunks.push(chunk);
    });
    req.on("end", () => {
      if (chunks.length === 0) return resolve({});
      try {
        resolve(JSON.parse(Buffer.concat(chunks).toString("utf8")));
      } catch {
        reject(Object.assign(new Error("Invalid JSON body"), { status: 400 }));
      }
    });
    req.on("error", reject);
  });
}

function serveStatic(req, res, pathname) {
  let relative;
  try {
    relative = decodeURIComponent(pathname);
  } catch {
    return sendJson(res, 400, { ok: false, error: "Bad request" });
  }

  let filePath = path.normalize(path.join(PUBLIC_DIR, relative));
  if (filePath !== PUBLIC_DIR && !filePath.startsWith(PUBLIC_DIR + path.sep)) {
    return sendJson(res, 404, { ok: false, error: "Not found" });
  }
  if (fs.existsSync(filePath) && fs.statSync(filePath).isDirectory()) {
    filePath = path.join(filePath, "index.html");
  }
  if (!fs.existsSync(filePath)) {
    return sendJson(res, 404, { ok: false, error: "Not found" });
  }

  const type = MIME_TYPES[path.extname(filePath).toLowerCase()] || "application/octet-stream";
  res.writeHead(200, {
    "Content-Type": type,
    "Content-Length": fs.statSync(filePath).size,
  });
  if (req.method === "HEAD") return res.end();
  fs.createReadStream(filePath).pipe(res);
}

// Routes: [method, pattern, handler(params, body)]
const routes = [
  ["GET", /^\/api\/health$/, () => ({ status: 200, body: { ok: true, data: { status: "up" } } })],
  ["GET", /^\/api\/products$/, () => listProducts()],
  ["GET", /^\/api\/products\/([^/]+)$/, ([id]) => getProduct(id)],
  ["POST", /^\/api\/orders$/, (params, body) => createOrder(body)],
  ["GET", /^\/api\/orders\/([^/]+)$/, ([id]) => getOrder(id)],
  ["POST", /^\/api\/newsletter$/, (params, body) => subscribe(body)],
  ["POST", /^\/api\/contact$/, (params, body) => contact(body)],
];

export default async function app(req, res) {
  const { pathname } = new URL(req.url, `http://${req.headers.host || "localhost"}`);

  try {
    for (const [method, pattern, handler] of routes) {
      if (req.method !== method) continue;
      const match = pathname.match(pattern);
      if (!match) continue;
      const params = match.slice(1).map(decodeURIComponent);
      const body = method === "POST" ? await readJsonBody(req) : undefined;
      const result = handler(params, body);
      return sendJson(res, result.status, result.body);
    }

    if (pathname.startsWith("/api/") || pathname === "/api") {
      return sendJson(res, 404, { ok: false, error: "Not found" });
    }
    if (req.method === "GET" || req.method === "HEAD") {
      return serveStatic(req, res, pathname);
    }
    return sendJson(res, 405, { ok: false, error: "Method not allowed" });
  } catch (err) {
    const status = err.status || 500;
    if (status === 500) console.error(err);
    sendJson(res, status, {
      ok: false,
      error: status === 500 ? "Internal server error" : err.message,
    });
  }
}
