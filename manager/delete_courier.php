<?php 
$courier_id=$_GET["id"];
$library = new SimpleXMLElement('../courier.xml',null,true);
$managerId=$library->xpath("//Courier[@courierId=".$courier_id."]/managerId")[0];
$dom = new DOMDocument();
$dom->load('../courier.xml');
$library = $dom->documentElement;
$xpath = new DOMXPath($dom);
$result = $xpath->query('//Courier[@courierId='.$courier_id.']');
$result->item(0)->parentNode->removeChild($result->item(0));
$dom->save('../courier.xml');
header('Location: '."http://localhost/xml_test/manager/manager.php?id=".$managerId);
?>