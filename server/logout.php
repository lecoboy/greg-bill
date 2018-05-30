<?php
setcookie("LoginUser", "", time()-3600,"/");
header("Location: ../login.html");
?>