<?php
require __DIR__ . '/Api.php';
$key = md5('lxwsj18776868502');
$api = new Api($key);

$arr = array(
    'a' => 78,
    'b' => 787,
    't' => 78,
    'o' => 868,
    'm' => 8,
    //'r' => '',
    // 'q' => null,
    //'e' => 0,
    'nonce_str' => md5(time())

);
$api->SetData($arr);
//$result = $api->SetSign();

//主动请求数据，执行签名
$api->SetSign();
$result = $api->GetValues();

//print_r($result);


//接受数据时验证签名
/*print_r($api->CheckSign());*/


/*$url = 'https://www.baidu.com/';
$data =  $api->CurlGet($url);
print_r($data);*/


$url = 'http://www.emidu.cn/api/echo_json.php';
$data = $api->CurlPost($url, $result);

if ($data) {
    $arr = json_decode($data, true);
    $api->SetData($arr);
    if ($api->CheckSign()) {

        print_r($data);

    }

}



