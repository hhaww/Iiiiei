<?php
$brokid = file_get_contents('ID');
$callback = function ($update, $EzTG) {
    global $brokid;
    if($update->message->chat->id == $brokid ){
            $text= $update->message->text;
        	$cha = $update->message->chat->id;
        	if($update->message->text === '/start'){
        	    $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- قسم التشيكرات .','checkers')
                   ->newline() 
                   ->add('- صنع لستة معرفات .','makelist')
                   ->newline()
                   ->add('- معلومات الكل .','allinfo')
                   ->add('- معرفات الكل .','allusers')
                   ->newline()
                   ->add('- تثبيت بلكل .','pinall')
                   ->add('- اضافة لستة للكل .','addall')
                   ->newline()
                    ->add('- حذف لستات الكل .','delall')
                    ->newline()
                    ->add('- تشغيل الكل .','runall')
                    ->add('- ايقاف الكل .','sleepall')
                    ->newline()
                    ->add('- تسجيل الخروج من الكل .','logall')
                    ->done();
                $EzTG->sendMessage(['chat_id' => $update->message->chat->id, 'text' => "- اهلا بك عزيزي في الاوامر الخاصة بك .\n- اختر الامر الذي تريده من الازرار ادناه .\n- - - - -\n- BY => @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
        	}
            if(file_exists('mode')){
        	    $mode = file_get_contents('mode');
        	    if(preg_match("/@+/", $text)){
        	        if($mode == 'pin1'){
                         $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back1')
                   ->done();
            	        $user = explode("@", $text) [1];
                            file_put_contents("users1", $user);
                            $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم التثبيت على => @$user .",'reply_markup'=>$keyboard]);
                            unlink('mode');
        }
       } 
        if(preg_match("/@+/", $text)){
    if($mode == 'unpin1'){
        $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back1')
                   ->done();
        $user = explode("@", $text) [1];
                        $data = str_replace("\n" . $user, "", file_get_contents("users1"));
                        file_put_contents("users1", $data);
                        file_put_contents("users1",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users1"))));
        $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم حذف => @$user من اللستة .",'reply_markup'=>$keyboard]);
        unlink('mode');
    } 
}  if(preg_match("/@+/", $text)){
        if($mode == 'putold1'){
             $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back1')
                   ->done();
        $user = explode("@", $text) [1];
        $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم تعيين => @$user كقناة معينة للتشيكر الاول .",'reply_markup'=>$keyboard]);
        file_put_contents('old1',$user);
        file_put_contents('type1','old');
        unlink('mode');
    }
}
if($text !='/start' and $mode == 'login1'){
    file_put_contents('phone1', $text);
    system('rm -rf m1.madeline');
	            system('rm -rf m1.madeline.lock');
                file_put_contents("step1","2");
                system('php g1.php');
                unlink('mode');
}
if($text !='/start' and $mode == 'addlist1'){
     $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back1')
                   ->done();
    $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم اضافة المعرفات للستة .",'reply_markup'=>$keyboard]);
    file_put_contents('users1',"\n$text",FILE_APPEND);
    unlink('mode');
}
// Second Checker //
if(preg_match("/@+/", $text)){
        	        if($mode == 'pin2'){
                         $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back2')
                   ->done();
            	        $user = explode("@", $text) [1];
                            file_put_contents("users2", $user);
                            $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم التثبيت على => @$user .",'reply_markup'=>$keyboard]);
                            unlink('mode');
        }
       }
        if(preg_match("/@+/", $text)){
    if($mode == 'unpin2'){
        $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back2')
                   ->done();
        $user = explode("@", $text) [1];
                        $data = str_replace("\n" . $user, "", file_get_contents("users2"));
                        file_put_contents("users2", $data);
                        file_put_contents("users2",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users2"))));
        $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم حذف => @$user من اللستة .",'reply_markup'=>$keyboard]);
        unlink('mode');
    } 
}  if(preg_match("/@+/", $text)){
        if($mode == 'putold2'){
             $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back2')
                   ->done();
        $user = explode("@", $text) [1];
        $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم تعيين => @$user كقناة معينة للتشيكر الثاني .",'reply_markup'=>$keyboard]);
        file_put_contents('old2',$user);
        file_put_contents('type2','old');
        unlink('mode');
    }
}
if($text !='/start' and $mode == 'login2'){
    file_put_contents('phone2', $text);
    system('rm -rf m2.madeline');
	            system('rm -rf m2.madeline.lock');
                file_put_contents("step2","2");
                system('php g2.php');
                unlink('mode');
}
if($text !='/start' and $mode == 'addlist2'){
     $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back2')
                   ->done();
    $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم اضافة المعرفات للستة .",'reply_markup'=>$keyboard]);
    file_put_contents('users2',"\n$text",FILE_APPEND);
    unlink('mode');
}
// Third Checker //
if(preg_match("/@+/", $text)){
        	        if($mode == 'pin3'){
                         $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back3')
                   ->done();
            	        $user = explode("@", $text) [1];
                            file_put_contents("users3", $user);
                            $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم التثبيت على => @$user .",'reply_markup'=>$keyboard]);
                            unlink('mode');
        }
       }
        if(preg_match("/@+/", $text)){
    if($mode == 'unpin3'){
        $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back3')
                   ->done();
        $user = explode("@", $text) [1];
                        $data = str_replace("\n" . $user, "", file_get_contents("users3"));
                        file_put_contents("users3", $data);
                        file_put_contents("users3",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users3"))));
        $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم حذف => @$user من اللستة .",'reply_markup'=>$keyboard]);
        unlink('mode');
    } 
}  if(preg_match("/@+/", $text)){
        if($mode == 'putold3'){
             $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back3')
                   ->done();
        $user = explode("@", $text) [1];
        $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم تعيين => @$user كقناة معينة للتشيكر الثالث .",'reply_markup'=>$keyboard]);
        file_put_contents('old3',$user);
        file_put_contents('type3','old');
        unlink('mode');
    }
}
if($text !='/start' and $mode == 'login3'){
    file_put_contents('phone3', $text);
    system('rm -rf m3.madeline');
	            system('rm -rf m3.madeline.lock');
                file_put_contents("step3","2");
                system('php g3.php');
                unlink('mode');
}
if($text !='/start' and $mode == 'addlist3'){
     $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back3')
                   ->done();
    $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم اضافة المعرفات للستة .",'reply_markup'=>$keyboard]);
    file_put_contents('users3',"\n$text",FILE_APPEND);
    unlink('mode');
}
// Forth Checker //
if(preg_match("/@+/", $text)){
        	        if($mode == 'pin4'){
                         $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back4')
                   ->done();
            	        $user = explode("@", $text) [1];
                            file_put_contents("users4", $user);
                            $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم التثبيت على => @$user .",'reply_markup'=>$keyboard]);
                            unlink('mode');
        }
       }
        if(preg_match("/@+/", $text)){
    if($mode == 'unpin4'){
        $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back4')
                   ->done();
        $user = explode("@", $text) [1];
                        $data = str_replace("\n" . $user, "", file_get_contents("users4"));
                        file_put_contents("users4", $data);
                        file_put_contents("users4",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users4"))));
        $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم حذف => @$user من اللستة .",'reply_markup'=>$keyboard]);
        unlink('mode');
    } 
}  if(preg_match("/@+/", $text)){
        if($mode == 'putold4'){
             $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back4')
                   ->done();
        $user = explode("@", $text) [1];
        $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم تعيين => @$user كقناة معينة للتشيكر الرابع .",'reply_markup'=>$keyboard]);
        file_put_contents('old4',$user);
        file_put_contents('type4','old');
        unlink('mode');
    }
}
if($text !='/start' and $mode == 'login4'){
    file_put_contents('phone4', $text);
    system('rm -rf m4.madeline');
	            system('rm -rf m4.madeline.lock');
                file_put_contents("step4","2");
                system('php g4.php');
                unlink('mode');
}
if($text !='/start' and $mode == 'addlist4'){
     $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back4')
                   ->done();
    $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم اضافة المعرفات للستة .",'reply_markup'=>$keyboard]);
    file_put_contents('users4',"\n$text",FILE_APPEND);
    unlink('mode');
}
// Fifth Checker //
if(preg_match("/@+/", $text)){
        	        if($mode == 'pin5'){
                         $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back5')
                   ->done();
            	        $user = explode("@", $text) [1];
                            file_put_contents("users5", $user);
                            $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم التثبيت على => @$user .",'reply_markup'=>$keyboard]);
                            unlink('mode');
        }
       }
        if(preg_match("/@+/", $text)){
    if($mode == 'unpin5'){
        $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back5')
                   ->done();
        $user = explode("@", $text) [1];
                        $data = str_replace("\n" . $user, "", file_get_contents("users5"));
                        file_put_contents("users5", $data);
                        file_put_contents("users5",preg_replace('~[\r\n]+~',"\n",trim(file_get_contents("users5"))));
        $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم حذف => @$user من اللستة .",'reply_markup'=>$keyboard]);
        unlink('mode');
    } 
}  if(preg_match("/@+/", $text)){
        if($mode == 'putold5'){
             $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back5')
                   ->done();
        $user = explode("@", $text) [1];
        $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم تعيين => @$user كقناة معينة للتشيكر الخامس .",'reply_markup'=>$keyboard]);
        file_put_contents('old5',$user);
        file_put_contents('type5','old');
        unlink('mode');
    }
}
if($text !='/start' and $mode == 'login5'){
    file_put_contents('phone5', $text);
    system('rm -rf m5.madeline');
	            system('rm -rf m5.madeline.lock');
                file_put_contents("step5","2");
                system('php g5.php');
                unlink('mode');
}
if($text !='/start' and $mode == 'addlist5'){
     $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back5')
                   ->done();
    $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم اضافة المعرفات للستة .",'reply_markup'=>$keyboard]);
    file_put_contents('users5',"\n$text",FILE_APPEND);
    unlink('mode');
}
// All Checkers //
if(preg_match("/@+/", $text)){
        	        if($mode == 'pinall'){
                         $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back')
                   ->done();
            	        $user = explode("@", $text) [1];
                        file_put_contents("users1", $user);
                        file_put_contents("users2", $user);
                        file_put_contents("users3", $user);
                        file_put_contents("users4", $user);
                        file_put_contents("users5", $user);
                            $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم التثبيت على => @$user بجميع التشيكرات .",'reply_markup'=>$keyboard]);
                            unlink('mode');
        }
       }
       if($text !='/start' and $mode == 'addall'){
     $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back')
                   ->done();
    $EzTG->sendMessage(['chat_id'=>$cha,'text'=>"- تم اضافة المعرفات لجميع اللستات .",'reply_markup'=>$keyboard]);
    file_put_contents('users1',"\n$text",FILE_APPEND);
    file_put_contents('users2',"\n$text",FILE_APPEND);
    file_put_contents('users3',"\n$text",FILE_APPEND);
    file_put_contents('users4',"\n$text",FILE_APPEND);
    file_put_contents('users5',"\n$text",FILE_APPEND);
    unlink('mode');
}
            }
            // inline Control //
        }elseif(isset($update->callback_query)){
            $data = $update->callback_query->data;
            $cha = $update->callback_query->message->chat->id;
            if($data == 'checkers'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- التشيكر الاول .','firstchecker')
                   ->add('- التشيكر الثاني .','secondchecker')
                   ->newline() 
                   ->add('- التشيكر الثالث .','thirdchecker')
                   ->newline()
                   ->add('- التشيكر الرابع .','fourthchecker')
                   ->add('- التشيكر الخامس .','fifthchecker')
                    ->newline()
                    ->add('- رجوع .','back')
                    ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- اهلا بك عزيزي في قسم التشيكرات .\n- اختر التشيكر الذي تريده من الاسفل .\n- BY => @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
            }
            if($data == 'firstchecker' or $data == 'back1'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- تثبيت ع معرف .','pin1')
                   ->add('- حذف معرف .','del1')
                   ->newline() 
                   ->add('- معلومات التشيكر .','info1')
                   ->newline()
                   ->add('- لستة العرفات .','users1')
                   ->add('- حذف اللستة .','list1')
                   ->newline()
                   ->add('- اضافة لستة .','addlist1')
                   ->newline()
                   ->add('- تثبيت بقناة معينة .','oldch1')
                   ->newline()
                   ->add('- تشغيل التشيكر .','run1')
                   ->add('- ايقاف التشيكر .','sleep1')
                   ->newline()
                   ->add('- تسجيل دخول .','login1')
                   ->add('- تسجيل خروج .','logout1')
                    ->newline()
                    ->add('- رجوع .','back')
                    ->done();
                    $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- اهلا بك عزيزي في اوامر التشيكر الاول .\n- اختر الامر الذي تريده من الازرار ادناه .\n- BY => @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
                unlink('mode');
            }
            if($data == 'pin1'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back1')
                   ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال المعرف الان .\n- مثال على ذلك => @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','pin1');
            }
            elseif($data == 'del1'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back1')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال المعرف الان .\n- مثال على ذلك => @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','unpin1');
            }
            elseif($data == 'info1'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back1')
                ->done();
                $ses1 = json_decode(file_get_contents('ses1.json'),1);
$id = $ses1['id'];
$name = $ses1['first_name'];
$username = $ses1['username'];
$phone = $ses1['phone'];
              $type1 =  file_get_contents('type1');
              $old1 =  file_get_contents('old1');
              $run1 = file_get_contents('run1');
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- معلومات التشيكر الأول .\n- حالة التشيكر => $run1 .\n- التثبيت في => $type1 .\n- الرقم => $phone .\n- القناة المعينة => @$old1 .\n- اسم الحساب => $name .\n- ايدي الحساب => $id .\n- معرف الحساب => @$username .\n- - - - -\n- @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
            }
            elseif($data == 'users1'){
                            $se = explode("\n", file_get_contents('users1'));
$u = "";
                for($i=0; $i<count($se); $i++){
                    $n1 = $i + 1;
                    $u .= $n1." => @".$se[$i]." .\n";
                    }
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back1')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- معرفات التشيكر الاول .\n- - - - -\n$u"
                ,'reply_markup'=>$keyboard]);
            }
            elseif($data == 'list1'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back1')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم حذف معرفات التشيكر الاول ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('users1','');
            }
            elseif($data == 'oldch1'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back1')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم وضع التثبيت بقناة معينة .\n- ارسل معرف القناة الان مثل الاسفل .\n@aaaZaa"
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','putold1');
            }
            elseif($data == 'addlist1'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back1')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال لستة المعرفات بهذا الشكل .\naaaZaa\naaaDaa"
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','addlist1');
            }
            elseif($data == 'run1'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back1')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم تشغيل التشيكر الأول ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('run1','Running');
                shell_exec('screen -S ac -X kill'); 
                shell_exec('screen -dmS ac php checker1.php'); 
            }
            elseif($data == 'sleep1'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back1')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم ايقاف التشيكر الأول ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('run1','Sleeping');
                shell_exec('screen -S ac -X kill'); 
            }
            elseif($data == 'login1'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back1')
                ->add('- نعم متأكد .','ylogin1')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- هل انت متأكد من تبديل الحساب ؟"
                ,'reply_markup'=>$keyboard]); 
            }
            elseif($data == 'ylogin1'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back1')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال الرقم الان .\n- مثال على ذلك => +9647803667816 ."
                ,'reply_markup'=>$keyboard]); 
                file_put_contents('mode', 'login1');
            }
            elseif($data == 'logout1'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back1')
                -add('- نعم متأكد .','ylogout1')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- هل انت متأكد من تسجيل الخروج من حساب التشيكر الأول ؟"
                ,'reply_markup'=>$keyboard]); 
            }
            elseif($data == 'ylogout1'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back1')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم تسجيل الخروج من حساب التشيكر الأول ."
                ,'reply_markup'=>$keyboard]); 
                system('rm -rf m1.madeline');
	            system('rm -rf m1.madeline.lock');
            }
            elseif($data == 'back'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- قسم التشيكرات .','checkers')
                   ->newline() 
                   ->add('- صنع لستة معرفات .','makelist')
                   ->newline()
                   ->add('- معلومات الكل .','allinfo')
                   ->add('- معرفات الكل .','allusers')
                   ->newline()
                   ->add('- تثبيت بلكل .','pinall')
                   ->add('- اضافة لستة للكل .','addall')
                   ->newline()
                    ->add('- حذف لستات الكل .','delall')
                    ->newline()
                    ->add('- تشغيل الكل .','runall')
                    ->add('- ايقاف الكل .','sleepall')
                    ->newline()
                    ->add('- تسجيل الخروج من الكل .','logall')
                    ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- اهلا بك عزيزي في الاوامر الخاصة بك .\n- اختر الامر الذي تريده من الازرار ادناه .\n- - - - -\n- BY => @aaaZaa ."
                ,'reply_markup'=>$keyboard]); 
                unlink('mode');
                unlink('step1');
                unlink('step2');
                unlink('step3');
                unlink('step4');
                unlink('step5');
                unlink('makelist');
            }
// Sexond Checker Inline //
if($data == 'secondchecker' or $data == 'back2'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- تثبيت ع معرف .','pin2')
                   ->add('- حذف معرف .','del2')
                   ->newline() 
                   ->add('- معلومات التشيكر .','info2')
                   ->newline()
                   ->add('- لستة العرفات .','users2')
                   ->add('- حذف اللستة .','list2')
                   ->newline()
                   ->add('- اضافة لستة .','addlist2')
                   ->newline()
                   ->add('- تثبيت بقناة معينة .','oldch2')
                   ->newline()
                   ->add('- تشغيل التشيكر .','run2')
                   ->add('- ايقاف التشيكر .','sleep2')
                   ->newline()
                   ->add('- تسجيل دخول .','login2')
                   ->add('- تسجيل خروج .','logout2')
                    ->newline()
                    ->add('- رجوع .','back')
                    ->done();
                    $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- اهلا بك عزيزي في اوامر التشيكر الثاني .\n- اختر الامر الذي تريده من الازرار ادناه .\n- BY => @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
                unlink('mode');
            }
            if($data == 'pin2'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back2')
                   ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال المعرف الان .\n- مثال على ذلك => @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','pin2');
            }
            elseif($data == 'del2'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back2')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال المعرف الان .\n- مثال على ذلك => @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','unpin2');
            }
            elseif($data == 'info2'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back2')
                ->done();
                $ses1 = json_decode(file_get_contents('ses2.json'),1);
$id = $ses1['id'];
$name = $ses1['first_name'];
$username = $ses1['username'];
$phone = $ses1['phone'];
              $type1 =  file_get_contents('type2');
              $old1 =  file_get_contents('old2');
              $run1 = file_get_contents('run2');
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- معلومات التشيكر الثاني .\n- حالة التشيكر => $run1 .\n- التثبيت في => $type1 .\n- الرقم => $phone .\n- القناة المعينة => @$old1 .\n- اسم الحساب => $name .\n- ايدي الحساب => $id .\n- معرف الحساب => @$username .\n- - - - -\n- @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
            }
            elseif($data == 'users2'){
                            $se = explode("\n", file_get_contents('users2'));
$u = "";
                for($i=0; $i<count($se); $i++){
                    $n1 = $i + 1;
                    $u .= $n1." => @".$se[$i]." .\n";
                    }
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back2')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- معرفات التشيكر الثاني .\n- - - - -\n$u"
                ,'reply_markup'=>$keyboard]);
            }
            elseif($data == 'list2'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back2')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم حذف معرفات التشيكر الثاني ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('users2','');
            }
            elseif($data == 'oldch2'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back2')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم وضع التثبيت بقناة معينة .\n- ارسل معرف القناة الان مثل الاسفل .\n@aaaZaa"
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','putold2');
            }
            elseif($data == 'addlist2'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back2')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال لستة المعرفات بهذا الشكل .\naaaZaa\naaaDaa"
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','addlist2');
            }
            elseif($data == 'run2'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back2')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم تشغيل التشيكر الثاني ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('run2','Running');
                shell_exec('screen -S se -X kill'); 
                shell_exec('screen -dmS se php checker2.php'); 
            }
            elseif($data == 'sleep2'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back2')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم ايقاف التشيكر الثاني ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('run2','Sleeping');
                shell_exec('screen -S se -X kill'); 
            }
            elseif($data == 'login2'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back2')
                ->add('- نعم متأكد .','ylogin2')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- هل انت متأكد من تبديل الحساب ؟"
                ,'reply_markup'=>$keyboard]); 
            }
            elseif($data == 'ylogin2'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back2')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال الرقم الان .\n- مثال على ذلك => +9647803667816 ."
                ,'reply_markup'=>$keyboard]); 
                file_put_contents('mode', 'login2');
            }
            elseif($data == 'logout2'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back2')
                -add('- نعم متأكد .','ylogout2')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- هل انت متأكد من تسجيل الخروج من حساب التشيكر الثاني ؟"
                ,'reply_markup'=>$keyboard]); 
            }
            elseif($data == 'ylogout2'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back2')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم تسجيل الخروج من حساب التشيكر الثاني ."
                ,'reply_markup'=>$keyboard]); 
                system('rm -rf m2.madeline');
	            system('rm -rf m2.madeline.lock');
            }
            elseif($data == 'back'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- قسم التشيكرات .','checkers')
                   ->newline() 
                   ->add('- صنع لستة معرفات .','makelist')
                   ->newline()
                   ->add('- معلومات الكل .','allinfo')
                   ->add('- معرفات الكل .','allusers')
                   ->newline()
                   ->add('- تثبيت بلكل .','pinall')
                   ->add('- اضافة لستة للكل .','addall')
                   ->newline()
                    ->add('- حذف لستات الكل .','delall')
                    ->newline()
                    ->add('- تشغيل الكل .','runall')
                    ->add('- ايقاف الكل .','sleepall')
                    ->newline()
                    ->add('- تسجيل الخروج من الكل .','logall')
                    ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- اهلا بك عزيزي في الاوامر الخاصة بك .\n- اختر الامر الذي تريده من الازرار ادناه .\n- - - - -\n- BY => @aaaZaa ."
                ,'reply_markup'=>$keyboard]); 
                unlink('mode');
                unlink('step1');
                unlink('step2');
                unlink('step3');
                unlink('step4');
                unlink('step5');
                unlink('makelist');
            }
            // Third Checker Inline //
            if($data == 'thirdchecker' or $data == 'back3'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- تثبيت ع معرف .','pin3')
                   ->add('- حذف معرف .','del3')
                   ->newline() 
                   ->add('- معلومات التشيكر .','info3')
                   ->newline()
                   ->add('- لستة العرفات .','users3')
                   ->add('- حذف اللستة .','list3')
                   ->newline()
                   ->add('- اضافة لستة .','addlist3')
                   ->newline()
                   ->add('- تثبيت بقناة معينة .','oldch3')
                   ->newline()
                   ->add('- تشغيل التشيكر .','run3')
                   ->add('- ايقاف التشيكر .','sleep3')
                   ->newline()
                   ->add('- تسجيل دخول .','login3')
                   ->add('- تسجيل خروج .','logout3')
                    ->newline()
                    ->add('- رجوع .','back')
                    ->done();
                    $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- اهلا بك عزيزي في اوامر التشيكر الثالث .\n- اختر الامر الذي تريده من الازرار ادناه .\n- BY => @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
                unlink('mode');
            }
            if($data == 'pin3'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back3')
                   ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال المعرف الان .\n- مثال على ذلك => @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','pin3');
            }
            elseif($data == 'del3'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back3')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال المعرف الان .\n- مثال على ذلك => @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','unpin3');
            }
            elseif($data == 'info3'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back3')
                ->done();
                $ses1 = json_decode(file_get_contents('ses3.json'),1);
$id = $ses1['id'];
$name = $ses1['first_name'];
$username = $ses1['username'];
$phone = $ses1['phone'];
              $type1 =  file_get_contents('type3');
              $old1 =  file_get_contents('old3');
              $run1 = file_get_contents('run3');
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- معلومات التشيكر الثالث .\n- حالة التشيكر => $run1 .\n- التثبيت في => $type1 .\n- الرقم => $phone .\n- القناة المعينة => @$old1 .\n- اسم الحساب => $name .\n- ايدي الحساب => $id .\n- معرف الحساب => @$username .\n- - - - -\n- @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
            }
            elseif($data == 'users3'){
                            $se = explode("\n", file_get_contents('users3'));
$u = "";
                for($i=0; $i<count($se); $i++){
                    $n1 = $i + 1;
                    $u .= $n1." => @".$se[$i]." .\n";
                    }
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back3')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- معرفات التشيكر الثالث .\n- - - - -\n$u"
                ,'reply_markup'=>$keyboard]);
            }
            elseif($data == 'list3'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back3')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم حذف معرفات التشيكر الثالث ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('users3','');
            }
            elseif($data == 'oldch3'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back3')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم وضع التثبيت بقناة معينة .\n- ارسل معرف القناة الان مثل الاسفل .\n@aaaZaa"
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','putold3');
            }
            elseif($data == 'addlist3'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back3')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال لستة المعرفات بهذا الشكل .\naaaZaa\naaaDaa"
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','addlist3');
            }
            elseif($data == 'run3'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back3')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم تشغيل التشيكر الثالث ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('run3','Running');
                shell_exec('screen -S Th -X kill'); 
                shell_exec('screen -dmS Th php checker3.php'); 
            }
            elseif($data == 'sleep3'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back3')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم ايقاف التشيكر الثالث ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('run3','Sleeping');
                shell_exec('screen -S Th -X kill'); 
            }
            elseif($data == 'login3'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back3')
                ->add('- نعم متأكد .','ylogin3')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- هل انت متأكد من تبديل الحساب ؟"
                ,'reply_markup'=>$keyboard]); 
            }
            elseif($data == 'ylogin3'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back3')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال الرقم الان .\n- مثال على ذلك => +9647803667816 ."
                ,'reply_markup'=>$keyboard]); 
                file_put_contents('mode', 'login3');
            }
            elseif($data == 'logout3'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back3')
                -add('- نعم متأكد .','ylogout3')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- هل انت متأكد من تسجيل الخروج من حساب التشيكر الثالث ؟"
                ,'reply_markup'=>$keyboard]); 
            }
            elseif($data == 'ylogout3'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back3')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم تسجيل الخروج من حساب التشيكر الثالث ."
                ,'reply_markup'=>$keyboard]); 
                system('rm -rf m3.madeline');
	            system('rm -rf m3.madeline.lock');
            }
            elseif($data == 'back'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- قسم التشيكرات .','checkers')
                   ->newline() 
                   ->add('- صنع لستة معرفات .','makelist')
                   ->newline()
                   ->add('- معلومات الكل .','allinfo')
                   ->add('- معرفات الكل .','allusers')
                   ->newline()
                   ->add('- تثبيت بلكل .','pinall')
                   ->add('- اضافة لستة للكل .','addall')
                   ->newline()
                    ->add('- حذف لستات الكل .','delall')
                    ->newline()
                    ->add('- تشغيل الكل .','runall')
                    ->add('- ايقاف الكل .','sleepall')
                    ->newline()
                    ->add('- تسجيل الخروج من الكل .','logall')
                    ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- اهلا بك عزيزي في الاوامر الخاصة بك .\n- اختر الامر الذي تريده من الازرار ادناه .\n- - - - -\n- BY => @aaaZaa ."
                ,'reply_markup'=>$keyboard]); 
                unlink('mode');
                unlink('step1');
                unlink('step2');
                unlink('step3');
                unlink('step4');
                unlink('step5');
                unlink('makelist');
            }
            // Fourth Checker Inline //
            if($data == 'fourthchecker' or $data == 'back4'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- تثبيت ع معرف .','pin4')
                   ->add('- حذف معرف .','del4')
                   ->newline() 
                   ->add('- معلومات التشيكر .','info4')
                   ->newline()
                   ->add('- لستة العرفات .','users4')
                   ->add('- حذف اللستة .','list4')
                   ->newline()
                   ->add('- اضافة لستة .','addlist4')
                   ->newline()
                   ->add('- تثبيت بقناة معينة .','oldch4')
                   ->newline()
                   ->add('- تشغيل التشيكر .','run4')
                   ->add('- ايقاف التشيكر .','sleep4')
                   ->newline()
                   ->add('- تسجيل دخول .','login4')
                   ->add('- تسجيل خروج .','logout4')
                    ->newline()
                    ->add('- رجوع .','back')
                    ->done();
                    $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- اهلا بك عزيزي في اوامر التشيكر الرابع .\n- اختر الامر الذي تريده من الازرار ادناه .\n- BY => @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
                unlink('mode');
            }
            if($data == 'pin4'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back4')
                   ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال المعرف الان .\n- مثال على ذلك => @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','pin4');
            }
            elseif($data == 'del4'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back4')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال المعرف الان .\n- مثال على ذلك => @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','unpin4');
            }
            elseif($data == 'info4'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back4')
                ->done();
                $ses1 = json_decode(file_get_contents('ses4.json'),1);
$id = $ses1['id'];
$name = $ses1['first_name'];
$username = $ses1['username'];
$phone = $ses1['phone'];
              $type1 =  file_get_contents('type4');
              $old1 =  file_get_contents('old4');
              $run1 = file_get_contents('run4');
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- معلومات التشيكر الرابع .\n- حالة التشيكر => $run1 .\n- التثبيت في => $type1 .\n- الرقم => $phone .\n- القناة المعينة => @$old1 .\n- اسم الحساب => $name .\n- ايدي الحساب => $id .\n- معرف الحساب => @$username .\n- - - - -\n- @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
            }
            elseif($data == 'users4'){
                            $se = explode("\n", file_get_contents('users4'));
$u = "";
                for($i=0; $i<count($se); $i++){
                    $n1 = $i + 1;
                    $u .= $n1." => @".$se[$i]." .\n";
                    }
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back4')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- معرفات التشيكر الرابع .\n- - - - -\n$u"
                ,'reply_markup'=>$keyboard]);
            }
            elseif($data == 'list4'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back4')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم حذف معرفات التشيكر الرابع ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('users4','');
            }
            elseif($data == 'oldch4'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back4')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم وضع التثبيت بقناة معينة .\n- ارسل معرف القناة الان مثل الاسفل .\n@aaaZaa"
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','putold4');
            }
            elseif($data == 'addlist4'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back4')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال لستة المعرفات بهذا الشكل .\naaaZaa\naaaDaa"
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','addlist4');
            }
            elseif($data == 'run4'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back4')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم تشغيل التشيكر الرابع ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('run4','Running');
                shell_exec('screen -S Fo -X kill'); 
                shell_exec('screen -dmS Fo php checker4.php'); 
            }
            elseif($data == 'sleep4'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back4')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم ايقاف التشيكر الرابع ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('run4','Sleeping');
                shell_exec('screen -S Fo -X kill'); 
            }
            elseif($data == 'login4'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back4')
                ->add('- نعم متأكد .','ylogin4')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- هل انت متأكد من تبديل الحساب ؟"
                ,'reply_markup'=>$keyboard]); 
            }
            elseif($data == 'ylogin4'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back4')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال الرقم الان .\n- مثال على ذلك => +9647803667816 ."
                ,'reply_markup'=>$keyboard]); 
                file_put_contents('mode', 'login4');
            }
            elseif($data == 'logout4'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back4')
                -add('- نعم متأكد .','ylogout4')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- هل انت متأكد من تسجيل الخروج من حساب التشيكر الرابع ؟"
                ,'reply_markup'=>$keyboard]); 
            }
            elseif($data == 'ylogout4'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back4')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم تسجيل الخروج من حساب التشيكر الرابع ."
                ,'reply_markup'=>$keyboard]); 
                system('rm -rf m4.madeline');
	            system('rm -rf m4.madeline.lock');
            }
            elseif($data == 'back'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- قسم التشيكرات .','checkers')
                   ->newline() 
                   ->add('- صنع لستة معرفات .','makelist')
                   ->newline()
                   ->add('- معلومات الكل .','allinfo')
                   ->add('- معرفات الكل .','allusers')
                   ->newline()
                   ->add('- تثبيت بلكل .','pinall')
                   ->add('- اضافة لستة للكل .','addall')
                   ->newline()
                    ->add('- حذف لستات الكل .','delall')
                    ->newline()
                    ->add('- تشغيل الكل .','runall')
                    ->add('- ايقاف الكل .','sleepall')
                    ->newline()
                    ->add('- تسجيل الخروج من الكل .','logall')
                    ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- اهلا بك عزيزي في الاوامر الخاصة بك .\n- اختر الامر الذي تريده من الازرار ادناه .\n- - - - -\n- BY => @aaaZaa ."
                ,'reply_markup'=>$keyboard]); 
                unlink('mode');
                unlink('step1');
                unlink('step2');
                unlink('step3');
                unlink('step4');
                unlink('step5');
                unlink('makelist');
            }
            // Fifth Checker Inline //
            if($data == 'fifthchecker' or $data == 'back5'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- تثبيت ع معرف .','pin5')
                   ->add('- حذف معرف .','del5')
                   ->newline() 
                   ->add('- معلومات التشيكر .','info5')
                   ->newline()
                   ->add('- لستة العرفات .','users5')
                   ->add('- حذف اللستة .','list5')
                   ->newline()
                   ->add('- اضافة لستة .','addlist5')
                   ->newline()
                   ->add('- تثبيت بقناة معينة .','oldch5')
                   ->newline()
                   ->add('- تشغيل التشيكر .','run5')
                   ->add('- ايقاف التشيكر .','sleep5')
                   ->newline()
                   ->add('- تسجيل دخول .','login5')
                   ->add('- تسجيل خروج .','logout5')
                    ->newline()
                    ->add('- رجوع .','back')
                    ->done();
                    $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- اهلا بك عزيزي في اوامر التشيكر الخامس .\n- اختر الامر الذي تريده من الازرار ادناه .\n- BY => @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
                unlink('mode');
            }
            if($data == 'pin5'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back5')
                   ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال المعرف الان .\n- مثال على ذلك => @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','pin5');
            }
            elseif($data == 'del5'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back5')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال المعرف الان .\n- مثال على ذلك => @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','unpin5');
            }
            elseif($data == 'info5'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back5')
                ->done();
                $ses1 = json_decode(file_get_contents('ses5.json'),1);
$id = $ses1['id'];
$name = $ses1['first_name'];
$username = $ses1['username'];
$phone = $ses1['phone'];
              $type1 =  file_get_contents('type5');
              $old1 =  file_get_contents('old5');
              $run1 = file_get_contents('run5');
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- معلومات التشيكر الخامس .\n- حالة التشيكر => $run1 .\n- التثبيت في => $type1 .\n- الرقم => $phone .\n- القناة المعينة => @$old1 .\n- اسم الحساب => $name .\n- ايدي الحساب => $id .\n- معرف الحساب => @$username .\n- - - - -\n- @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
            }
            elseif($data == 'users5'){
                            $se = explode("\n", file_get_contents('users5'));
$u = "";
                for($i=0; $i<count($se); $i++){
                    $n1 = $i + 1;
                    $u .= $n1." => @".$se[$i]." .\n";
                    }
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back5')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- معرفات التشيكر الخامس .\n- - - - -\n$u"
                ,'reply_markup'=>$keyboard]);
            }
            elseif($data == 'list5'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back5')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم حذف معرفات التشيكر الخامس ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('users5','');
            }
            elseif($data == 'oldch5'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back5')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم وضع التثبيت بقناة معينة .\n- ارسل معرف القناة الان مثل الاسفل .\n@aaaZaa"
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','putold5');
            }
            elseif($data == 'addlist5'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back5')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال لستة المعرفات بهذا الشكل .\naaaZaa\naaaDaa"
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','addlist5');
            }
            elseif($data == 'run5'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back5')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم تشغيل التشيكر الخامس ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('run5','Running');
                shell_exec('screen -S vi -X kill'); 
                shell_exec('screen -dmS vi php checker5.php'); 
            }
            elseif($data == 'sleep5'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back5')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم ايقاف التشيكر الخامس ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('run5','Sleeping');
                shell_exec('screen -S vi -X kill'); 
            }
            elseif($data == 'login5'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back5')
                ->add('- نعم متأكد .','ylogin5')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- هل انت متأكد من تبديل الحساب ؟"
                ,'reply_markup'=>$keyboard]); 
            }
            elseif($data == 'ylogin5'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back5')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال الرقم الان .\n- مثال على ذلك => +9647803667816 ."
                ,'reply_markup'=>$keyboard]); 
                file_put_contents('mode', 'login5');
            }
            elseif($data == 'logout5'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back5')
                -add('- نعم متأكد .','ylogout5')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- هل انت متأكد من تسجيل الخروج من حساب التشيكر الخامس ؟"
                ,'reply_markup'=>$keyboard]); 
            }
            elseif($data == 'ylogout5'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back5')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم تسجيل الخروج من حساب التشيكر الخامس ."
                ,'reply_markup'=>$keyboard]); 
                system('rm -rf m5.madeline');
	            system('rm -rf m5.madeline.lock');
            }
            elseif($data == 'back'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- قسم التشيكرات .','checkers')
                   ->newline() 
                   ->add('- صنع لستة معرفات .','makelist')
                   ->newline()
                   ->add('- معلومات الكل .','allinfo')
                   ->add('- معرفات الكل .','allusers')
                   ->newline()
                   ->add('- تثبيت بلكل .','pinall')
                   ->add('- اضافة لستة للكل .','addall')
                   ->newline()
                    ->add('- حذف لستات الكل .','delall')
                    ->newline()
                    ->add('- تشغيل الكل .','runall')
                    ->add('- ايقاف الكل .','sleepall')
                    ->newline()
                    ->add('- تسجيل الخروج من الكل .','logall')
                    ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- اهلا بك عزيزي في الاوامر الخاصة بك .\n- اختر الامر الذي تريده من الازرار ادناه .\n- - - - -\n- BY => @aaaZaa ."
                ,'reply_markup'=>$keyboard]); 
                unlink('mode');
                unlink('step1');
                unlink('step2');
                unlink('step3');
                unlink('step4');
                unlink('step5');
                unlink('brokusers');
            }
            // All Checkers Commands //
            if($data == 'makelist'){
                 $list = explode("\n", file_get_contents('https://brok-aapi.ml/list.txt'));
$brok1 = $list[array_rand($list,1)];
$brok2 = $list[array_rand($list,1)];
$brok3 = $list[array_rand($list,1)];
$brok4 = $list[array_rand($list,1)];
$brok5 = $list[array_rand($list,1)];
$brok6 = $list[array_rand($list,1)];
$brok7 = $list[array_rand($list,1)];
$brok8 = $list[array_rand($list,1)];
$brok9 = $list[array_rand($list,1)];
$brok10 = $list[array_rand($list,1)];
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- اضافة اللستة للتشيكر 1 .','to1l')
                   ->newline() 
                   ->add('- اضافة اللستة للتشيكر 2 .','to2l')
                   ->newline()
                   ->add('- اضافة اللستة للتشيكر 3 .','to3l')
                   ->add('- اضافة اللستة للتشيكر 4 .','to4l')
                   ->newline()
                   ->add('- اضافة اللستة للتشيكر 5 .','to5l')
                   ->add('- اضافة اللستة للكل .','toal')
                    ->newline()
                    ->add('- رجوع .','back')
                    ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم صنع لستة معرفات عشوائية .
1 - @$brok1 .\n2 - @$brok2 .\n3 - @$brok3 .\n4 - @$brok4 .\n5 - @$brok5 .\n6 - @$brok6 .\n7 - @$brok7 .\n8 - @$brok8 .\n9 - @$brok9 .\n10 - @$brok10 ."
                ,'reply_markup'=>$keyboard]); 
                file_put_contents('brokusers',"$brok1\n$brok2\n$brok3\n$brok4\n$brok5\n$brok6\n$brok7\n$brok8\n$brok9\n$brok10");
            }
            if($data == 'to1l'){
                $broklist = file_get_contents('brokusers');
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم اضافة اللستة للتشيكر الاول ."
                ,'reply_markup'=>$keyboard]); 
                file_put_contents('users1',$broklist);
                unlink('brokusers');
            }
            if($data == 'to2l'){
                $broklist = file_get_contents('brokusers');
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم اضافة اللستة للتشيكر الثاني ."
                ,'reply_markup'=>$keyboard]); 
                file_put_contents('users2',$broklist);
                unlink('brokusers');
            }
            if($data == 'to3l'){
                $broklist = file_get_contents('brokusers');
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم اضافة اللستة للتشيكر الثالث ."
                ,'reply_markup'=>$keyboard]); 
                file_put_contents('users3',$broklist);
                unlink('brokusers');
            }
            if($data == 'to4l'){
                $broklist = file_get_contents('brokusers');
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم اضافة اللستة للتشيكر الرابع ."
                ,'reply_markup'=>$keyboard]); 
                file_put_contents('users4',$broklist);
                unlink('brokusers');
            }
            if($data == 'to5l'){
                $broklist = file_get_contents('brokusers');
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم اضافة اللستة للتشيكر الخامس ."
                ,'reply_markup'=>$keyboard]); 
                file_put_contents('users5',$broklist);
                unlink('brokusers');
            }
            if($data == 'toal'){
                $broklist = file_get_contents('brokusers');
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم اضافة اللستة لجميع التشيكرات ."
                ,'reply_markup'=>$keyboard]); 
                file_put_contents('users1',$broklist);
                file_put_contents('users2',$broklist);
                file_put_contents('users3',$broklist);
                file_put_contents('users4',$broklist);
                file_put_contents('users5',$broklist);
                unlink('brokusers');
            }
            if($data == 'allinfo'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- التشيكر الاول .','info1')
                   ->newline() 
                   ->add('- التشيكر الثاني .','info2')
                   ->newline()
                   ->add('- التشيكر الثالث .','info3')
                   ->add('- التشيكر الرابع .','info4')
                   ->newline()
                   ->add('- التشيكر الخامس .','info5')
                    ->newline()
                    ->add('- رجوع .','logall')
                    ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- اختر التشيكر الذي تريد رؤية معلوماته ."
                ,'reply_markup'=>$keyboard]); 
            }
            if($data == 'allusers'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- التشيكر الاول .','users1')
                   ->newline() 
                   ->add('- التشيكر الثاني .','users2')
                   ->newline()
                   ->add('- التشيكر الثالث .','users3')
                   ->add('- التشيكر الرابع .','users4')
                   ->newline()
                   ->add('- التشيكر الخامس .','users5')
                    ->newline()
                    ->add('- رجوع .','logall')
                    ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- اختر التشيكر الذي تريد رؤية معرفاته ."
                ,'reply_markup'=>$keyboard]); 
            }
            if($data == 'pinall'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back')
                   ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال المعرف الان .\n- مثال على ذلك => @aaaZaa ."
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','pinall');
            }
            if($data == 'addall'){
                $keyboard = $EzTG->newKeyboard('inline')
                   ->add('- رجوع .','back')
                   ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- حسنا عزيزي قم بأرسال اللستة الان .\n- مثال على ذلك .\naaaZaa\naaaDaa"
                ,'reply_markup'=>$keyboard]);
                file_put_contents('mode','addall');
            }
            if($data == 'delall'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back')
                ->add('- نعم متأكد .','ydellall')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- هل انت متأكد من حذف كل اللستات ؟"
                ,'reply_markup'=>$keyboard]); 
            }
            if($data == 'ydellall'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم حذف جميع اللستات ."
                ,'reply_markup'=>$keyboard]); 
                file_put_contents('users1','');
                file_put_contents('users2','');
                file_put_contents('users3','');
                file_put_contents('users4','');
                file_put_contents('users5','');
            }
            if($data == 'runall'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم تشغيل جميع التشيكرات ."
                ,'reply_markup'=>$keyboard]); 
                file_put_contents('run1','Running');
  file_put_contents('run2','Running');
  file_put_contents('run3','Running');
  file_put_contents('run4','Running');
  file_put_contents('run5','Running');
  shell_exec('screen -S ac -X kill'); 
  shell_exec('screen -dmS ac php checker1.php');
  shell_exec('screen -S se -X kill'); 
  shell_exec('screen -dmS se php checker2.php');
  shell_exec('screen -S Th -X kill'); 
  shell_exec('screen -dmS Th php checker3.php');
  shell_exec('screen -S Fo -X kill'); 
  shell_exec('screen -dmS Fo php checker4.php');
  shell_exec('screen -S vi -X kill'); 
  shell_exec('screen -dmS vi php checker5.php');
            }
            if($data == 'sleepall'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم ايقاف جميع التشيكرات ."
                ,'reply_markup'=>$keyboard]); 
                file_put_contents('run1','Sleeping');
  file_put_contents('run2','Sleeping');
  file_put_contents('run3','Sleeping');
  file_put_contents('run4','Sleeping');
  file_put_contents('run5','Sleeping');
  shell_exec('screen -S ac -X kill'); 
  shell_exec('screen -S se -X kill'); 
  shell_exec('screen -S Th -X kill'); 
  shell_exec('screen -S Fo -X kill'); 
  shell_exec('screen -S vi -X kill'); 
            }
            if($data == 'logall'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back')
                ->add('- نعم متأكد .','ylogall')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- هل انت متأكد من تسجيل الخروج من الكل ؟"
                ,'reply_markup'=>$keyboard]); 
            }
            if($data == 'ylogall'){
                $keyboard = $EzTG->newKeyboard('inline')
                ->add('- رجوع .','back')
                ->done();
                $EzTG->editMessageText(['message_id'=>$update->callback_query->message->message_id,'chat_id' => $cha, 'text' => "- تم تسجيل الخروج من جميع التشيكرات ."
                ,'reply_markup'=>$keyboard]); 
                system('rm -rf m1.madeline');
    system('rm -rf m1.madeline.lock');
	system('rm -rf m2.madeline');
	system('rm -rf m2.madeline.lock');
	system('rm -rf m3.madeline');
	system('rm -rf m3.madeline.lock');
    system('rm -rf m4.madeline');
    system('rm -rf m4.madeline.lock');
	system('rm -rf m5.madeline');
	system('rm -rf m5.madeline.lock');
    system('rm -rf ses1.json');
    system('rm -rf ses2.json');
    system('rm -rf ses3.json');
    system('rm -rf ses4.json');
    system('rm -rf ses5.json');
            }
}
};
$token = file_exists('token') ? file_get_contents('token') : readline('- Enter Token => ');
if(!file_exists('token') or file_get_contents('token') != $token){
    file_put_contents('token', $token);
}
if (!file_exists("ID")) {
  $g = readline("- Enter Sudo ID => ");
  file_put_contents("ID", $g);
}
if (!file_exists("token")) {
  $g = readline("- Enter Token => ");
  file_put_contents("token", $g);
}
if (!file_exists("brokadmin")) {
    $g = readline("- Enter Sudo Username => ");
    file_put_contents("brokadmin", $g);
  }
$EzTG = new EzTG(array('token' => $token, 'callback' => $callback, 'allow_only_telegram' => true, 'throw_telegram_errors' => false, 'magic_json_payload' => true)); //don't enable magic_json_payload if u want telegramz response
set_time_limit(0);
class EzTGException extends Exception
{
}
class EzTG
{
    private $settings;
    private $offset;
    private $json_payload;
    public function __construct($settings, $base = false)
    {
        $this->settings = array_merge(array(
      'endpoint' => 'https://api.telegram.org',
      'token' => '1234:abcd',
      'callback' => function ($update, $EzTG) {
          echo 'no callback' . PHP_EOL;
      },
      'objects' => true,
      'allow_only_telegram' => true,
      'throw_telegram_errors' => true,
      'magic_json_payload' => false
    ), $settings);
        if ($base !== false) {
            return true;
        }
        if (!is_callable($this->settings['callback'])) {
            $this->error('Invalid callback.', true);
        }
        if (php_sapi_name() === 'cli') {
            $this->settings['magic_json_payload'] = false;
            $this->offset = -1;
            $this->get_updates();
        } else {
            if ($this->settings['allow_only_telegram'] === true and $this->is_telegram() === false) {
                http_response_code(403);
                echo '403 - You are not Telegram,.,.';
                return 'Not Telegram';
            }
            if ($this->settings['magic_json_payload'] === true) {
                ob_start();
                $this->json_payload = false;
                register_shutdown_function(array($this, 'send_json_payload'));
            }
            if ($this->settings['objects'] === true) {
                $this->processUpdate(json_decode(file_get_contents('php://input')));
            } else {
                $this->processUpdate(json_decode(file_get_contents('php://input'), true));
            }
        }
    }
    private function is_telegram()
    {
        if (isset($_SERVER['HTTP_CF_CONNECTING_IP'])) { //preferisco non usare x-forwarded-for xk si può spoof
            $ip = $_SERVER['HTTP_CF_CONNECTING_IP'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        if (($ip >= '149.154.160.0' && $ip <= '149.154.175.255') || ($ip >= '91.108.4.0' && $ip <= '91.108.7.255')) { //gram'''s ip : https://core.telegram.org/bots/webhooks
            return true;
        } else {
            return false;
        }
    }
    private function get_updates()
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->settings['endpoint'] . '/bot' . $this->settings['token'] . '/getUpdates');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        while (true) {
            curl_setopt($ch, CURLOPT_POSTFIELDS, 'offset=' . $this->offset . '&timeout=10');
            if ($this->settings['objects'] === true) {
                $result = json_decode(curl_exec($ch));
                if (isset($result->ok) and $result->ok === false) {
                    $this->error($result->description, false);
                } elseif (isset($result->result)) {
                    foreach ($result->result as $update) {
                        if (isset($update->update_id)) {
                            $this->offset = $update->update_id + 1;
                        }
                        $this->processUpdate($update);
                    }
                }
            } else {
                $result = json_decode(curl_exec($ch), true);
                if (isset($result['ok']) and $result['ok'] === false) {
                    $this->error($result['description'], false);
                } elseif (isset($result['result'])) {
                    foreach ($result['result'] as $update) {
                        if (isset($update['update_id'])) {
                            $this->offset = $update['update_id'] + 1;
                        }
                        $this->processUpdate($update);
                    }
                }
            }
        }
    }
    public function processUpdate($update)
    {
        $this->settings['callback']($update, $this);
    }
    protected function error($e, $throw = 'default')
    {
        if ($throw === 'default') {
            $throw = $this->settings['throw_telegram_errors'];
        }
        if ($throw === true) {
            throw new EzTGException($e);
        } else {
            echo 'Telegram error: ' . $e . PHP_EOL;
            return array(
        'ok' => false,
        'description' => $e
      );
        }
    }
    public function newKeyboard($type = 'keyboard', $rkm = array('resize_keyboard' => true, 'keyboard' => array()))
    {
        return new EzTGKeyboard($type, $rkm);
    }
    public function __call($name, $arguments)
    {
        if (!isset($arguments[0])) {
            $arguments[0] = array();
        }
        if (!isset($arguments[1])) {
            $arguments[1] = true;
        }
        if ($this->settings['magic_json_payload'] === true and $arguments[1] === true) {
            if ($this->json_payload === false) {
                $arguments[0]['method'] = $name;
                $this->json_payload = $arguments[0];
                return 'json_payloaded'; //xd
            } elseif (is_array($this->json_payload)) {
                $old_payload = $this->json_payload;
                $arguments[0]['method'] = $name;
                $this->json_payload = $arguments[0];
                $name = $old_payload['method'];
                $arguments[0] = $old_payload;
                unset($arguments[0]['method']);
                unset($old_payload);
            }
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->settings['endpoint'] . '/bot' . $this->settings['token'] . '/' . urlencode($name));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($arguments[0]));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if ($this->settings['objects'] === true) {
            $result = json_decode(curl_exec($ch));
        } else {
            $result = json_decode(curl_exec($ch), true);
        }
        curl_close($ch);
        if ($this->settings['objects'] === true) {
            if (isset($result->ok) and $result->ok === false) {
                return $this->error($result->description);
            }
            if (isset($result->result)) {
                return $result->result;
            }
        } else {
            if (isset($result['ok']) and $result['ok'] === false) {
                return $this->error($result['description']);
            }
            if (isset($result['result'])) {
                return $result['result'];
            }
        }
        return $this->error('Unknown error', false);
    }
    public function send_json_payload()
    {
        if (is_array($this->json_payload)) {
            ob_end_clean();
            echo json_encode($this->json_payload);
            header('Content-Type: application/json');
            ob_end_flush();
            return true;
        }
    }
}
class EzTGKeyboard
{
    public function __construct($type = 'keyboard', $rkm = array('resize_keyboard' => true, 'keyboard' => array()))
    {
        $this->line = 0;
        $this->type = $type;
        if ($type === 'inline') {
            $this->keyboard = array(
        'inline_keyboard' => array()
      );
        } else {
            $this->keyboard = $rkm;
        }
        return $this;
    }
    public function add($text, $callback_data = null, $type = 'auto')
    {
        if ($this->type === 'inline') {
            if ($callback_data === null) {
                $callback_data = trim($text);
            }
            if (!isset($this->keyboard['inline_keyboard'][$this->line])) {
                $this->keyboard['inline_keyboard'][$this->line] = array();
            }
            if ($type === 'auto') {
                if (filter_var($callback_data, FILTER_VALIDATE_URL)) {
                    $type = 'url';
                } else {
                    $type = 'callback_data';
                }
            }
            array_push($this->keyboard['inline_keyboard'][$this->line], array(
        'text' => $text,
        $type => $callback_data
      ));
        } else {
            if (!isset($this->keyboard['keyboard'][$this->line])) {
                $this->keyboard['keyboard'][$this->line] = array();
            }
            array_push($this->keyboard['keyboard'][$this->line], $text);
        }
        return $this;
    }
    public function newline()
    {
        $this->line++;
        return $this;
    }
    public function done()
    {
        if ($this->type === 'remove') {
            return '{"remove_keyboard": true}';
        } else {
            return json_encode($this->keyboard);
        }
    }
}