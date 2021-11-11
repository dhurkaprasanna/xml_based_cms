<?php
session_start();
if(!isset($_SESSION['manager'])){
    header('Location: '."http://localhost/xml_test/manager/manager_login.php");
}
?>
<h1>Details about the courier</h1>
<br>
<a href="http://localhost/xml_test/manager/manager_logout.php" class="btn-primary">Logout</a>
<?php 
$courier_id=$_GET["id"];
$library = new SimpleXMLElement('../courier.xml',null,true);
$from=$library->xpath("//Courier[@courierId=".$courier_id."]/From/userId")[0];
$type=$library->xpath("//Courier[@courierId=".$courier_id."]/Type")[0];
$qty=$library->xpath("//Courier[@courierId=".$courier_id."]/Qty")[0];
$managerId=$library->xpath("//Courier[@courierId=".$courier_id."]/managerId")[0];
$to_name=$library->xpath("//Courier[@courierId=".$courier_id."]/To/Name")[0];
$to_address=$library->xpath("//Courier[@courierId=".$courier_id."]/To/Address")[0];
$to_contact=$library->xpath("//Courier[@courierId=".$courier_id."]/To/Contact")[0];
$to_email=$library->xpath("//Courier[@courierId=".$courier_id."]/To/Email")[0];
$fees=$library->xpath("//Courier[@courierId=".$courier_id."]/Fees")[0];
$status=$library->xpath("//Courier[@courierId=".$courier_id."]/Status")[0];
$feedback=$library->xpath("//Courier[@courierId=".$courier_id."]/FeedBack")[0];


?>


        <p>Courier Id: <?php echo $courier_id?></p>
        <p>From: <?php echo $from?></p>
        <p>To Name: <?php echo $to_name?></p>
        <p>To Address: <?php echo $to_address?></p>
        <p>To Contact: <?php echo $to_contact?></p>
        <p>To Email: <?php echo $to_email?></p>
        <p>Quantity <?php echo $qty?></p>
        <p>Fees: <?php echo $fees?></p>
        <p>Status: <?php echo $status?></p>
        <p>Feedback: <?php echo $feedback?></p>

        <a href="http://localhost/xml_test/manager/update_courier.php?id=<?php echo $courier_id ?>" class="btn-primary">Update Courier</a>&nbsp
        <a href="http://localhost/xml_test/manager/delete_courier.php?id=<?php echo $courier_id ?>" class="btn-primary">Delete Courier</a>&nbsp
        <a href="http://localhost/xml_test/manager/manager.php?id=<?php echo $managerId ?>" class="btn-primary">Back to DashBoard</a>&nbsp

       

