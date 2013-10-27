<?php
// https://api.userapp.io/{{version}}/{{service}}.{{method}}

// This bit is fucking essential
$app_id = $_ENV["userapp_key"];
// Basic configuration
$api_url = 'https://api.userapp.io/';
$version = 'v1/';
$endpoint = $api_url . $version;