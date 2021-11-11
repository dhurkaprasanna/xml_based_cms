<?php
session_start();
session_destroy();
header('Location: '."http://localhost/xml_test/manager/manager_login.php");

?>