import products, { productById } from "../data/products.js";

export function listProducts() {
  return { status: 200, body: { ok: true, data: products } };
}

export function getProduct(id) {
  const product = productById.get(id);
  if (!product) {
    return { status: 404, body: { ok: false, error: "Product not found" } };
  }
  return { status: 200, body: { ok: true, data: product } };
}
