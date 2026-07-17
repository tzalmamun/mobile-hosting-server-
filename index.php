
---

## 2) `index.php` (Guide Page)

```php
<?php
?>
<!DOCTYPE html>
<html>
<head>
<title>Skyhostr Mobile Server</title>

<style>
body{
font-family:Arial;
background:#f5f5f5;
padding:20px;
}

.box{
background:white;
padding:20px;
border-radius:10px;
box-shadow:0 0 10px #ddd;
}

h1{
color:#2563eb;
}

code{
background:#eee;
padding:5px;
border-radius:5px;
}

</style>

</head>

<body>

<div class="box">

<h1>Skyhostr Mobile Server</h1>

<h3>Website Edit করার নিয়ম</h3>

<p>
আপনার ওয়েবসাইটের লেখা পরিবর্তন করতে:
</p>

<code>
public_html/index.php
</code>

<p>
এই ফাইল Edit করুন।
</p>


<h3>Termux থেকে Edit</h3>

<code>
cd ~/public_html
</code>

<br><br>

<code>
nano index.php
</code>


<h3>File Manager Access</h3>

<p>
সব ফাইল পরিবর্তন করতে নিচের লিংকে যান:
</p>

<a href="tinyfilemanager.php">

Open File Manager

</a>


<h3>Server Control</h3>


<p>
Server চালু:
</p>

<code>
sky
</code>


<p>
Server বন্ধ:
</p>

<code>
pkill php
pkill cloudflared
</code>


<hr>


<p>
Powered by Skyhostr Mobile Hosting
</p>


</div>


</body>
</html>
