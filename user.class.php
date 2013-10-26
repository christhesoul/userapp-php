<?php
class User {
  
  static function login($username,$password)
  {
    $username = sanitize($username);
    $password = sanitize($password);
    $response = poster('user','login',array('login'=>$username,'password'=>$password));
    if(isset($response->body->token)):
      $_SESSION['token'] = $response->body->token;
      return $response;
    else:
      return false;
    endif;
  }
  
  static function logout()
  {
    if($_SESSION['token']) $token = $_SESSION['token'];
    $response = poster('user','logout',array('token'=>$token));
    unset($_SESSION['token']);
    return $response;
  }
  
  static function get($token = false)
  {
    if(!$token && isset($_SESSION['token'])) $token = $_SESSION['token'];
    if($token){
      $response = poster('user','get',array('token'=>$token));
      return $response->body[0];
    } else {
      throw new Exception('No token provided. Please provide one.');
    }
  }
  
}