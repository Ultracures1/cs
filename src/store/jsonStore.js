import fs from "fs";
import path from "path";
import { fileURLToPath } from "url";

const __dirname = path.dirname(fileURLToPath(import.meta.url));
const DATA_DIR = process.env.DATA_DIR || path.join(__dirname, "../../data");

function fileFor(name) {
  return path.join(DATA_DIR, `${name}.json`);
}

export function readCollection(name) {
  const file = fileFor(name);
  if (!fs.existsSync(file)) return [];
  try {
    return JSON.parse(fs.readFileSync(file, "utf8"));
  } catch {
    // Corrupt file: don't crash reads; the next write replaces it.
    return [];
  }
}

export function writeCollection(name, rows) {
  fs.mkdirSync(DATA_DIR, { recursive: true });
  const file = fileFor(name);
  const tmp = `${file}.tmp`;
  fs.writeFileSync(tmp, JSON.stringify(rows, null, 2));
  fs.renameSync(tmp, file);
}

export function appendToCollection(name, row) {
  const rows = readCollection(name);
  rows.push(row);
  writeCollection(name, rows);
  return row;
}
