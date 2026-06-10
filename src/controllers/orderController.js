import crypto from "crypto";
import { productById } from "../data/products.js";
import { appendToCollection, readCollection } from "../store/jsonStore.js";
import { isValidEmail } from "../utils/validate.js";

const FREE_SHIPPING_THRESHOLD = 200;
const SHIPPING_FLAT_RATE = 15;

function validateOrder(body) {
  const customer = body?.customer;
  if (
    typeof customer?.name !== "string" ||
    customer.name.trim().length < 2 ||
    customer.name.trim().length > 80
  ) {
    return "customer.name must be 2-80 characters";
  }
  if (!isValidEmail(customer?.email)) {
    return "customer.email must be a valid email address";
  }
  const items = body?.items;
  if (!Array.isArray(items) || items.length < 1 || items.length > 50) {
    return "items must contain between 1 and 50 entries";
  }
  for (const item of items) {
    if (!productById.has(item?.productId)) {
      return `Unknown product: ${String(item?.productId)}`;
    }
    if (!Number.isInteger(item?.quantity) || item.quantity < 1 || item.quantity > 20) {
      return "quantity must be an integer between 1 and 20";
    }
  }
  return null;
}

export function createOrder(body) {
  const error = validateOrder(body);
  if (error) {
    return { status: 400, body: { ok: false, error } };
  }

  const { customer, items } = body;

  // Prices come from the catalog only — never from the client.
  const lines = items.map(({ productId, quantity }) => {
    const product = productById.get(productId);
    const unitPrice = product.salePrice ?? product.price;
    return {
      productId,
      name: product.name,
      unitPrice,
      quantity,
      lineTotal: unitPrice * quantity,
    };
  });

  const subtotal = lines.reduce((sum, line) => sum + line.lineTotal, 0);
  const shipping = subtotal >= FREE_SHIPPING_THRESHOLD ? 0 : SHIPPING_FLAT_RATE;

  const order = {
    id: `ord_${crypto.randomUUID()}`,
    status: "pending",
    customer: {
      name: customer.name.trim(),
      email: customer.email.trim().toLowerCase(),
    },
    items: lines,
    subtotal,
    shipping,
    total: subtotal + shipping,
    createdAt: new Date().toISOString(),
  };

  appendToCollection("orders", order);
  return { status: 201, body: { ok: true, data: order } };
}

export function getOrder(id) {
  const order = readCollection("orders").find((o) => o.id === id);
  if (!order) {
    return { status: 404, body: { ok: false, error: "Order not found" } };
  }
  return { status: 200, body: { ok: true, data: order } };
}
