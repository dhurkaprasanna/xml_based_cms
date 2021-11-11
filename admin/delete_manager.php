<?php
session_start();
if(!isset($_SESSION['manager'])){
    header('Location: '."http://localhost/xml_test/manager/manager_login.php");
}
?>
<h1>Delete Manager</h1>

<?php 
$manager_id=$_GET["id"];
$dom = new DOMDocument();
$dom->load('../manager.xml');
$library = $dom->documentElement;
$xpath = new DOMXPath($dom);
$result = $xpath->query('//Manager[@managerId='.$manager_id.']');
$result->item(0)->parentNode->removeChild($result->item(0));
$dom->save('../manager.xml');
$_SESSION['deleteManager']="<div>Manager Deleted Successfully</div>";
header('Location: '."http://localhost/xml_test/admin/dashboard.php");
?>