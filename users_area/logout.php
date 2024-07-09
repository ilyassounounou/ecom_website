<?php

session_start();
session_unset();
session_destroy();


echo "<script>window.open('../first.php','_self')</script>";


?>