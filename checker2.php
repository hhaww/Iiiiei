<?php
if (!file_exists('madeline.php')) {
 copy('https://phar.madelineproto.xyz/madeline.php', 'madeline.php');
}
define('MADELINE_BRANCH', 'deprecated');
include 'madeline.php';  
$settings['app_info']['api_id'] = 203088;  
$settings['app_info']['api_hash'] = 'f360233d3627586775bd7298ee775bd1';  
$MadelineProto = new \danog\MadelineProto\API('m2.madeline', $settings);  
$MadelineProto->start(); 
$brokold = file_get_contents('old2');
$admin = file_get_contents('brokadmin');
$users = explode("\n",file_get_contents("users2"));
while(1){
        foreach($users as $user){
            try{
            	$MadelineProto->messages->getPeerDialogs(['peers' => [$user]]);
            } catch (\danog\MadelineProto\Exception | \danog\MadelineProto\RPCErrorException $e) {
                    try{
                        $MadelineProto->channels->updateUsername(['channel' => $brokold, 'username' => $user]);
                        $MadelineProto->messages->sendMessage(['peer' => "$admin", 'message' => "- New Username => @$user ."]);
                        file_put_contents('run2','Sleeping');
                        exit;
                    }catch(Exception $e){{
                            $MadelineProto->messages->sendMessage(['peer' => "$admin", 'message' => "- @$user => ".$e->getMessage()]);
                            file_put_contents('run2','Sleeping');
                        }

  
                    }
	        }
        }
    }