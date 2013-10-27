<?php
class User {
  
  static function login($username,$password)
  {
    $username = sanitize($username);
    $password = sanitize($password);
    $response = poster('user','login',array('login'=>$username,'password'=>$password));
    if(isset($response->body->token)):
      $_SESSION['token'] = $response->body->token;
    endif;
    return $response->body;
  }
  
  static function logout()
  {
    $token = sanitize($_SESSION['token']);
    unset($_SESSION['token']);
    $response = poster('user','logout',array('token'=>$token));
    return $response->body;
  }
  
  static function get($array = array())
  {
    if(!empty($array)){
      global $api_token;
      $response = poster('user','get',array('token'=>$api_token,'user_id'=>$array));
      return $response->body;
    } else {
      if(isset($_SESSION['token'])){
        $response = poster('user','get',array('token'=>$_SESSION['token']));
        return $response->body;
      } else {
        throw new Exception('Unable to retrieve user information. No user is logged in.');
      }
    }
  }
  
  static function resetPassword($login)
  {
    global $api_token;
    $response = poster('user','resetPassword',array('token'=>$api_token,'login'=>$login));
    return $response->body;
  }
  
  static function changePassword($new_password,$password_token)
  {
    global $api_token;
    $response = poster('user','changePassword',array('token'=>$api_token,'password_token'=>$password_token,'new_password'=>$new_password));
    return $response->body;
  }
  
}