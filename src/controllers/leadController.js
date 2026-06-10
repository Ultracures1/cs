import crypto from "crypto";
import {
  appendToCollection,
  readCollection,
  writeCollection,
} from "../store/jsonStore.js";
import { isValidEmail } from "../utils/validate.js";

export function subscribe(body) {
  const email = body?.email;
  if (!isValidEmail(email)) {
    return { status: 400, body: { ok: false, error: "A valid email is required" } };
  }

  const normalized = email.trim().toLowerCase();
  const subscribers = readCollection("subscribers");
  if (subscribers.some((s) => s.email === normalized)) {
    return {
      status: 200,
      body: { ok: true, data: { subscribed: true, duplicate: true } },
    };
  }

  subscribers.push({ email: normalized, createdAt: new Date().toISOString() });
  writeCollection("subscribers", subscribers);
  return { status: 201, body: { ok: true, data: { subscribed: true } } };
}

export function contact(body) {
  const { name, email, message } = body ?? {};
  if (typeof name !== "string" || name.trim().length < 2 || name.trim().length > 80) {
    return { status: 400, body: { ok: false, error: "name must be 2-80 characters" } };
  }
  if (!isValidEmail(email)) {
    return { status: 400, body: { ok: false, error: "A valid email is required" } };
  }
  if (
    typeof message !== "string" ||
    message.trim().length < 5 ||
    message.trim().length > 2000
  ) {
    return { status: 400, body: { ok: false, error: "message must be 5-2000 characters" } };
  }

  const row = appendToCollection("messages", {
    id: `msg_${crypto.randomUUID()}`,
    name: name.trim(),
    email: email.trim().toLowerCase(),
    message: message.trim(),
    createdAt: new Date().toISOString(),
  });
  return { status: 201, body: { ok: true, data: { received: true, id: row.id } } };
}
