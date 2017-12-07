<?php
/*
var methods = [
  'checkfriends',
  'consolecommand',
  'editevent',
  'editfriendgroups',
  'editfriends',
  'friendof',
  'getchallenge',
  'getdaycounts',
  'getevents',
  'getfriends',
  'getfriendgroups',
  'getusertags',
  'login',
  'postevent',
  'essionexpire',
  'sessiongenerate',
  'syncitems',
  'getfriendspage',
  'getcomments',
  'addcomment'
];
*/

include ("kd_xmlrpc.php"); 
define("XMLRPC_DEBUG", 1);    // Set to 1 for handy debugging 
$site = "www.livejournal.com"; 
$location = "/interface/xmlrpc";
$method = "LJ.XMLRPC.getfriends";

$param = array(
    'username' => 'TemaMadest',
    'password' => '123Madest'
);

list($success, $result) = XMLRPC_request( $site, $location, $method, array(XMLRPC_prepare($param))); 

XMLRPC_debug_print();    // uncomment for debugging 

if($success){  
  var_dump($result);
}

?>



  
  