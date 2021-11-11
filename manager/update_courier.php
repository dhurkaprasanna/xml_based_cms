<?php
session_start();
if(!isset($_SESSION['manager'])){
    header('Location: '."http://localhost/xml_test/manager/manager_login.php");
}
?>
<h1> Update Courier </h1>
<br>
<br>
<a href="http://localhost/xml_test/manager/manager_logout.php" class="btn-primary">Logout</a>
<br>
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
<form action="" method="POST">
    <table class="tbl-30">
        <tr>
            <td>User Id: </td>
            <td>
                <input type="text" name="user_id" value="<?php echo $from?>">
            </td>
        </tr>
    </table>
    <br>
    <h3>Destination</h3>
    <table>
        <tr>
            <td>Name: </td>
            <td>
                <input type="text" name="name" value="<?php echo $to_name?>">
            </td>
        </tr>

        <tr>
            <td>Address: </td>
            <td>
                <input type="text" name="address" value="<?php echo $to_address?>">
            </td>
        </tr>

        <tr>
            <td>Contact: </td>
            <td>
                <input type="text" name="contact" value="<?php echo $to_contact?>">
            </td>
        </tr>

        <tr>
            <td>Email: </td>
            <td>
                <input type="text" name="email" value="<?php echo $to_email?>">
            </td>
        </tr>
    </table>
    <br>
    <h3>Courier Details</h3>
    <table>
        <tr>
            <td>Type: </td>
            <td>
                <input type="text" name="type" value="<?php echo $type?>">
            </td>
        </tr>

        <tr>
            <td>Quantity: </td>
            <td>
                <input type="text" name="qty" value="<?php echo $qty?>">
            </td>
        </tr>

        <tr>
            <td>Fees: </td>
            <td>
                <input type="text" name="fees" value="<?php echo $fees?>">
            </td>
        </tr>

        <tr>
            <td>Status: </td>
            <td>
                <input type="text" name="status" value="<?php echo $status?>">
            </td>
        </tr>

        <tr>
            <td>Feedback: </td>
            <td>
                <input type="text" name="feedback" value="<?php echo $feedback?>">
            </td>
        </tr>

    </table>
    <br>
    <input type="submit" name="submit" value="Update Courier" class="btn-secondary">
</form>

<?php 

if(isset($_POST['submit']))
{
    //The submit button is clicked

    $manager_id=$managerId;
    $user_id=$_POST['user_id'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $type=$_POST['type'];
    $qty=$_POST['qty'];
    $fees=$_POST['fees'];
    $status=$_POST['status'];
    $feedback=$_POST['feedback'];
    
    $library = new SimpleXMLElement('../courier.xml',null,true);
    $book = $library->xpath('//Courier[@courierId='.$courier_id.']');
    $sub = $library->xpath('//Courier[@courierId='.$courier_id.']/From');
    $sub[0]->userId = $user_id;
    $sub = $library->xpath('//Courier[@courierId='.$courier_id.']/To');
    $sub[0]->Name=$name;
    $sub[0]->Address=$address;
    $sub[0]->Contact=$contact;
    $sub[0]->Email=$email;
    $book[0]->Type=$type;
    $book[0]->Qty=$qty;
    $book[0]->Fees=$fees;
    $book[0]->FeedBack=$feedback;
    $library->asXML('../courier.xml');
    header('Location: '."http://localhost/xml_test/manager/details_courier.php?id=".$courier_id);
}

?>

<a href="http://localhost/xml_test/manager/details_courier.php?id=<?php echo $courier_id ?>" class="btn-primary">Cancel</a>&nbsp
<a href="http://localhost/xml_test/manager/manager.php?id=<?php echo $managerId ?>" class="btn-primary">Back to DashBoard</a>&nbsp