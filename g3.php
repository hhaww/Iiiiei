<?php
// BY BRoK - @x_BRK - @i_BRK //
date_default_timezone_set("Asia/Baghdad");
if (!file_exists('madeline.php')) {
 copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
define('MADELINE_BRANCH', 'deprecated');
include 'madeline.php';  
$settings['app_info']['api_id'] = 203088;  
$settings['app_info']['api_hash'] = 'f360233d3627586775bd7298ee775bd1';  
$MadelineProto = new \danog\MadelineProto\API('m3.madeline', $settings);  
require("conf.php"); 
$TT = file_get_contents("token");
$tg = new Telegram("$TT");
$lastupdid = 1; 
while(true){ 
 $upd = $tg->vtcor("getUpdates", ["offset" => $lastupdid]); 
 if(isset($upd['result'][0])){ 
  $text = $upd['result'][0]['message']['text']; 
  $chat_id = $upd['result'][0]['message']['chat']['id']; 
$from_id = $upd['result'][0]['message']['from']['id']; 
$sudo = file_get_contents("ID");;
$phone = file_get_contents('phone3');
if($from_id == $sudo){
try{
if(file_get_contents("step3") == "2"){
  file_put_contents('phone3',$phone);
$MadelineProto->phone_login($phone);
$tg->vtcor('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ارسل الكود الان .",
]);
file_put_contents('mode', '');
file_put_contents("step3","3");
}
elseif(file_get_contents("step3") == "3"){
if($text){
$authorization = $MadelineProto->complete_phone_login($text);
if ($authorization['_'] === 'account.password') {
$tg->vtcor('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- ارسل رمز التحقق الان .",
]);
file_put_contents("step3","4");
}else{
$tg->vtcor('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- تم التسجيل بنجاح .",
]);
$B = $MadelineProto->get_self();
file_put_contents('ses3.json',json_encode($B));
file_put_contents("step3","");
exit;
}
}
}elseif(file_get_contents("step3") == "4"){
if($text){
$authorization = $MadelineProto->complete_2fa_login($text);
$tg->vtcor('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- تم التسجيل بنجاح .",
]);
$B = $MadelineProto->get_self();
file_put_contents('ses3.json',json_encode($B));
file_put_contents("step3","");
exit;
}
}
}catch(Exception $e) {
  $tg->vtcor('sendmessage',[
'chat_id'=>$chat_id, 
'text'=>"- $e .",
]);
exit;
}}
$lastupdid = $upd['result'][0]['update_id'] + 1;
}
}