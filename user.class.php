<?php
class User {
  
  static function login($username,$password)
  {
    $response = poster('user','login',array('login'=>$username,'password'=>$password));
    if($response->body->token):
      $_SESSION['token'] = $response->body->token;
    endif;
    return $response;
  }
  
  static function get($token = false)
  {
    if(!$token) $token = $_SESSION['token'];
    $response = poster('user','get',array('token'=>$token));
    return $response->body[0];
  }
  
}