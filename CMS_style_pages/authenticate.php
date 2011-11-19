<?php 

  define('ADMIN_LOGIN','ruikezhong'); 
  define('ADMIN_PASSWORD','mypass'); 

  if (!isset($_SERVER['PHP_AUTH_USER']) || !isset($_SERVER['PHP_AUTH_PW']) 
      || ($_SERVER['PHP_AUTH_USER'] != ADMIN_LOGIN) 
      || ($_SERVER['PHP_AUTH_PW'] != ADMIN_PASSWORD)) { 
    header('HTTP/1.1 401 Unauthorized'); 
    header('WWW-Authenticate: Basic realm="My CMS"'); 
    exit("Access Denied: Username and password required."); 
  } 
   
?>