<?php
// https://api.userapp.io/{{version}}/{{service}}.{{method}}

// This bit is fucking essential
$app_id = $_ENV["USERAPP_APP_ID"];
$api_token = $_ENV["USERAPP_API_TOKEN"];

// Basic configuration
$api_url = 'https://api.userapp.io/';
$version = 'v1/';
$endpoint = $api_url . $version;