import http from "http";
import app from "./app.js";

const port = process.env.PORT || 3000;

http.createServer(app).listen(port, () => {
  console.log(`Maison Élite running at http://localhost:${port}`);
});
