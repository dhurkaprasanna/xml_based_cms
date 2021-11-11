<?php
session_start();
session_destroy();
header('Location: '."http://localhost/xml_test/customer/user_login.php");

?>