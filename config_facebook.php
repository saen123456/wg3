<?php
//require_once 'vendor/autoload.php';
require 'vendor/facebook/graph-sdk/src/Facebook/autoload.php';

if(!session_id()) {
    session_start();
}
// Call Facebook API

$facebook = new \Facebook\Facebook([
  'app_id'      => '2904339173012416',
  'app_secret'     => '4c4a976d3352914f41fbe32e378a3c35',
  'default_graph_version'  => 'v2.10'
]);

?>