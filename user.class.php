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
    $token = $_SESSION['token'];
    unset($_SESSION['token']);
    $response = poster('user','logout',array('token'=>$token));
    return $response->body;
  }
  
  static function get()
  {
    if(isset($_SESSION['token'])){
      $response = poster('user','get',array('token'=>$_SESSION['token']));
      return $response->body;
    } else {
      throw new Exception('No token provided. Please provide one.');
    }
  }
  
  static function resetPassword($login)
  {
    global $api_token;
    $response = poster('user','resetPassword',array('token'=>$api_token,'login'=>$login));
    return $response->body;
  }
  
}