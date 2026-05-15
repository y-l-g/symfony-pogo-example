# Symfony + Pogo Queue example

```bash
git clone https://github.com/y-l-g/symfony-pogo-example.git

cd symfony-pogo-example

composer install

wget https://github.com/y-l-g/websocket/releases/download/nightly/frankenphp-linux-x86_64-nightly
chmod +x frankenphp-linux-x86_64-nightly
mv frankenphp-linux-x86_64-nightly frankenphp

./frankenphp run --config Caddyfile
```

Visit localhost:8000/test-dispatch
