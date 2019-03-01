<?php
//设置编码
header("Content-type: text/html; charset=utf-8");
//摘要认证
header('HTTP/1.1 401 Unauthorized');
header('WWW-Authenticate: Digest realm="127.0.0.1" qop="auth" nonce="sdsdfdsdfsdfsdfs" opaque="sdfsdfsccvxvdsfd');