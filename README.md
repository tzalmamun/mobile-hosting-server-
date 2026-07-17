# 🚀 Skyhostr Mobile Hosting Setup

Android Phone ব্যবহার করে PHP Website Hosting এবং Cloudflare Tunnel দিয়ে নিজের Domain অনলাইনে চালানোর সম্পূর্ণ গাইড।

## Features

✅ PHP Web Server  
✅ Cloudflare Tunnel  
✅ Custom Domain Support  
✅ WiFi / Mobile Data Support  
✅ One Command Start  
✅ One Command Stop  
✅ No Router Port Forward Required  


# Requirements

- Android Phone
- Termux App
- Cloudflare Account
- Domain Name
- Internet Connection


# Step 1: Install Termux Packages

```bash
pkg update -y
pkg upgrade -y

pkg install php wget nano curl git -y
```


# Step 2: Install Cloudflared

```bash
wget https://github.com/cloudflare/cloudflared/releases/latest/download/cloudflared-linux-arm64

mv cloudflared-linux-arm64 cloudflared

chmod +x cloudflared

mv cloudflared $PREFIX/bin/
```


Check:

```bash
cloudflared --version
```


# Step 3: Login Cloudflare

```bash
cloudflared tunnel login
```

Browser Open হবে।

Cloudflare Account দিয়ে Login করুন।


# Step 4: Create Tunnel

```bash
cloudflared tunnel create skyhostr
```

Tunnel ID কপি করে রাখুন।


Example:

```
509872e6-xxxx-xxxx-xxxx-xxxxxxxx
```


# Step 5: Configure Tunnel

Folder:

```bash
mkdir -p ~/.cloudflared
```

Config:

```bash
nano ~/.cloudflared/config.yml
```


Paste:

```yaml
tunnel: YOUR_TUNNEL_ID

credentials-file: /data/data/com.termux/files/home/.cloudflared/YOUR_TUNNEL_ID.json

ingress:
  - hostname: yourdomain.com
    service: http://127.0.0.1:8080

  - service: http_status:404
```


Save:

CTRL + O  
Enter  
CTRL + X


# Step 6: Connect Domain

Example:

```bash
cloudflared tunnel route dns skyhostr yourdomain.com
```


এখন Domain Cloudflare Tunnel এর সাথে যুক্ত হবে।


# Step 7: Create Website Folder

```bash
mkdir ~/public_html
```


আপনার Website এখানে রাখুন:

```
~/public_html
```


Example:

```
~/public_html/index.php
```


# Step 8: Create Sky Command

```bash
nano ~/sky
```


Paste:

```bash
#!/data/data/com.termux/files/usr/bin/bash

pkill php
pkill cloudflared

cd ~/public_html

php -S 0.0.0.0:8080 > ~/php.log 2>&1 &

sleep 3

cloudflared tunnel run skyhostr
```


Save করুন।


Permission:

```bash
chmod +x ~/sky
```


Shortcut:

```bash
echo 'alias sky="~/sky"' >> ~/.bashrc

source ~/.bashrc
```


# Start Server

এখন থেকে শুধু:

```bash
sky
```

লিখলেই:

✅ PHP Server চালু হবে  
✅ Cloudflare Tunnel চালু হবে  
✅ Website Online হবে  


# Stop Server

বন্ধ করতে:

```bash
pkill php
pkill cloudflared
```


# Open Website

Browser:

```
https://yourdomain.com
```


# New Phone Setup

নতুন ফোনে একইভাবে:

```bash
pkg install git -y

git clone YOUR_REPOSITORY_LINK
```

তারপর README অনুসরণ করুন।


# Important Notes

- Termux বন্ধ করলে Server বন্ধ হবে।
- Battery Optimization বন্ধ রাখুন।
- WiFi অথবা SIM Internet দুইভাবেই কাজ করবে।
- Domain সবসময় একই থাকবে।


# Skyhostr

Mobile Hosting System

PHP + Cloudflare Tunnel
