<?php
function poster($service,$method,$params = array())
{
  global $endpoint;
  global $app_id;
  $array = array_merge(array('app_id'=>$app_id),$params);
  $response = Unirest::post($endpoint.$service.'.'.$method, array( "Accept" => "application/json" ),$array);
  return $response;
}