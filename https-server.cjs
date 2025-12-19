const https = require("https");
const http = require("http");
const fs = require("fs");
const express = require("express");
const vhost = require("vhost");
const app = express();
const sub_domain = express();
const local_domian = express();

app.use(vhost(`${process.env.CN}`, sub_domain));
app.use(vhost("localhost",local_domian));
app.use((req, res) => {
    req.pipe(http.request({
        host: "127.0.0.1",
        port: "2998",
        path: req.url,
        method: req.method,
        headers: req.headers,
        body: req.body
    }, (resp) => {
        res.writeHead(resp.statusCode,resp.headers);
        resp.pipe(res);
    }));
    res.header("Service-Worker-Allowed", "/");
    res.set({
        "Service-Worker-Allowed": "/",
        "X-Content-Type-Options": "nosniff",
        "X-XSS-Protection": "1; mode=block",
        "X-Frame-Options": "SAMEORIGIN",
        "Strict-Transport-Security": "max-age=63072000; includeSubdomains; preload",
        "Referrer-Policy": "no-referrer",
        "Cache-Control": "no-cache",
        "Content-Security-Policy": `default-src 'self'; script-src 'self' 'unsafe-inline' 'unsafe-eval' https://${process.env.CN}:2999/; style-src 'self' 'unsafe-inline' https://fonts.googleapis.com; img-src 'self' data: blob:; font-src 'self' data: https://fonts.gstatic.com; connect-src 'self' https: https://${process.env.CN}:2999/livereload.js wss://${process.env.CN}:2999/livereload; media-src 'self' https:; frame-src 'self' https:; worker-src 'self' blob:; object-src 'none'; base-uri 'self'; form-action 'self'; manifest-src 'self';`,
    });
});

https.createServer({
    key: fs.readFileSync("./certs/server.key"),
    cert: fs.readFileSync("./certs/server.crt")
}, app).listen(3000, () => {
    console.log(`server live: https://${process.env.CN}:3000`)
});