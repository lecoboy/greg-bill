<?php
if(!isset($_COOKIE['LoginUser']) 
  || $_COOKIE['LoginUser']==null
  || $_COOKIE['LoginUser']==""){
  header("Location: login.html");
}
?>