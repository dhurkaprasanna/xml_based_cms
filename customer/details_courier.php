<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: '."http://localhost/xml_test/customer/user_login.php");
}
?>
<h1>Details about the courier</h1>
<a href="http://localhost/xml_test/customer/user_logout.php" class="btn-primary">Logout</a>
<?php 
$courier_id=$_GET["id"];
$library = new SimpleXMLElement('../courier.xml',null,true);
$from=$library->xpath("//Courier[@courierId=".$courier_id."]/From/userId")[0];
$type=$library->xpath("//Courier[@courierId=".$courier_id."]/Type")[0];
$qty=$library->xpath("//Courier[@courierId=".$courier_id."]/Qty")[0];
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
        <?php if(strcmp($feedback,"NA")==0 && strcmp(strtolower($status),"delivered")==0): ?>
        <form action="" method="POST">
    <table class="tbl-30">
        <tr>
            <td>Feedback: </td>
            <td>
                <input type="text" name="feedback" placeholder="Enter your Feedback">
            </td>
        </tr>
    </table>
    
    <input type="submit" name="submit" value="Submit" class="btn-secondary">
</form>
        <?php 

        if(isset($_POST['submit']))
        {
            $library = new SimpleXMLElement('../courier.xml',null,true);
            $book = $library->xpath('//Courier[@courierId='.$courier_id.']');
            $book[0]->FeedBack=$_POST['feedback'];
            $library->asXML('../courier.xml');
            header('Location: '."http://localhost/xml_test/customer/details_courier.php?id=".$courier_id);
        }
        ?>
        <?php elseif(strcmp($feedback,"NA")!=0): ?>
        <p>Feedback: <?php echo $feedback?></p>
        <?php endif; ?>

    <a href="http://localhost/xml_test/customer/courier_history.php?id=<?php echo $from ?>" class="btn-primary">Back to DashBoard</a>      

       

