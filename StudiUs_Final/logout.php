<?php
   session_start();
   unset($_SESSION["username"]);
   unset($_SESSION["pwd"]);
   session_destroy();
   
   header("Location: index.html");
?>