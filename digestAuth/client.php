<?php
function _gen_digest_auth_header_param($params) {
    $url = $params['url'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_HEADER, TRUE);
    curl_setopt($ch, CURLOPT_NOBODY, FALSE);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, FALSE);
    curl_setopt($ch, CURLOPT_AUTOREFERER, TRUE);
    curl_setopt($ch, CURLOPT_TIMEOUT, 120);
    $result = curl_exec($ch);
    //WWW-Authenticate: Digest realm="Restricted area" qop="auth" nonce="5c78edabb2b8e" opaque="cdce8a5c95a1427d74df7acbf41c9ce0"
    // var_dump($result);die;
    if(curl_getinfo($ch, CURLINFO_HTTP_CODE) == '401') {
        $raw = explode(PHP_EOL,$result);
        foreach ($raw as $value) {
            if(explode(': ',$value)[0] == 'WWW-Authenticate') {
                $all = explode(': ',$value)[1];
                $all = str_replace('"','',$all);
                $all = trim($all);
                $all = explode('Digest ',$all)[1];
                $auth = str_replace(', ','&',$all);
                parse_str($auth,$digest);
                break;
            }
        }
    } else {
        return array();
    }
    $c = explode('/',$url,4)[3];
    $d = '/'.$c;
    $digest['uri'] = $d;
    $data = array_merge($digest,$params);
    $data['nonce'] = "5c78edabb2b8e";
    $data['qop'] = "auth";
    $HA1 = md5($data['username'].':'.$data['realm'].':'.$data['password']);
    $HA2 = md5($data['method'].':'.$data['uri']);
    $response = md5($HA1.':'.$data['nonce'].':'.$data['nc'].':'.$data['cnonce'].':'.$data['qop'].':'.$HA2);
    $data['response'] = $response;
    return $data;
}
$username = 'zeron';
$password = '123456';
$url = 'http://127.0.0.1/github/digestAuth/server.php';
var_dump(_gen_digest_auth_header_param([
    'username' => $username,
    'password' => $password,
    'nc' => '00000015',
    'method' => 'GET',
    'cnonce' => 'noasgnsijhretrkksanmlghnebitb',
    'opaque' => '',
    'url'   => $url
]));