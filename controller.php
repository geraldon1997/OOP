<?php

class Controller extends Model{

    public function checkEmpty($data){
       
    }

    public function validate($data){
        $data = htmlspecialchars(strip_tags($data));
        return $data;
    }

    public function hashPwd($pwd){
        $pwd = sha1($pwd);
        return $pwd;
    }

    public function sendMail($to,$subject,$message,$headers){
        $mail = mail($to,$subject,$message,$headers);
    }

    public function sendSms(){
        
    }
}