# cloudflare
Setup a website under Cloudflare.com services. [NGINX, UBUNTU 16.04, HSTS, ECC]

## TASKS
### 1 - WEB SERVER
- Setup an Apache / Nginx web server, to serve a simple landing page.
- The landing page should be served through CloudFlare (need to signup for free account, convert to enterprise)
- Make the origin server only available over IPv6 (Apache / Nginx config)
### 2 - RAILGUN
- Setup [Railgun](https://www.cloudflare.com/docs/railgun/) and confirm Railgun is working correctly.
  - (hint, you can use rg-diag which is installed with the railgun package)

### 3 - EEC (Eliptic Curve Certificate)
- Generate a self-signed elliptic curve cert and use it on your origin server.
- Force all requests to your origin over SSL with page rules and HSTS.
  - Page Rules - to be configured on CloudFlare dashboard.
  - HSTS ([HTTP Strict Transport Security](https://www.nginx.com/blog/http-strict-transport-security-hsts-and-nginx/))

### 4 - SCRIPTING
- Create a script in the language of your choice (Bash, PHP, Ruby, Python, etc) 
  - Display HTTP response headers
  - Compare the HTTP response headers for an HTTP request going through CloudFlare versus going directly to your origin server.

Enjoy the the road, beware of the flare...
