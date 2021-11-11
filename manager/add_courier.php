<?php
session_start();
if(!isset($_SESSION['manager'])){
    header('Location: '."http://localhost/xml_test/manager/manager_login.php");
}
?>
<h1> New Courier </h1>
<br>
<a href="http://localhost/xml_test/manager/manager_logout.php" class="btn-primary">Logout</a>
<br>
<form action="" method="POST">
    <table class="tbl-30">
        <tr>
            <td>User Id: </td>
            <td>
                <input type="text" name="user_id" placeholder="Enter the user Id">
            </td>
        </tr>
    </table>
    <br>
    <h3>Destination</h3>
    <table>
        <tr>
            <td>Name: </td>
            <td>
                <input type="text" name="name" placeholder="Enter the Name">
            </td>
        </tr>

        <tr>
            <td>Address: </td>
            <td>
                <input type="text" name="address" placeholder="Enter the Address">
            </td>
        </tr>

        <tr>
            <td>Contact: </td>
            <td>
                <input type="text" name="contact" placeholder="Enter the Contact">
            </td>
        </tr>

        <tr>
            <td>Email: </td>
            <td>
                <input type="text" name="email" placeholder="Enter the Email">
            </td>
        </tr>
    </table>
    <br>
    <h3>Courier Details</h3>
    <table>
        <tr>
            <td>Type: </td>
            <td>
                <input type="text" name="type" placeholder="Enter the Type">
            </td>
        </tr>

        <tr>
            <td>Quantity: </td>
            <td>
                <input type="text" name="qty" placeholder="Enter the quantity">
            </td>
        </tr>

        <tr>
            <td>Fees: </td>
            <td>
                <input type="text" name="fees" placeholder="Enter the Fees">
            </td>
        </tr>

    </table>
    <br>
    <input type="submit" name="submit" value="Book Courier" class="btn-secondary">
</form>

<?php 

if(isset($_POST['submit']))
{
    //The submit button is clicked
    
    $digits = 3;
    $courier_id=strval(rand(pow(10, $digits-1), pow(10, $digits)-1));
    $manager_id=$_GET['id'];
    $user_id=$_POST['user_id'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $type=$_POST['type'];
    $qty=$_POST['qty'];
    $fees=$_POST['fees'];
    $status="Booked";
    $feedback="NA";
    
    $library = new SimpleXMLElement('../courier.xml',null,true);
    $book = $library->addChild('Courier');
    $book->addAttribute('courierId', $courier_id);
    $book->addChild('managerId',$manager_id);
    $sub=$book->addChild('From');
    $sub->addChild('userId',$user_id);
    $bus=$book->addChild('To');
    $bus->addChild('Name',$name);
    $bus->addChild('Address',$address);
    $bus->addChild('Contact',$contact);
    $bus->addChild('Email',$email);
    $book->addChild('Type',$type);
    $book->addChild('Qty',$qty);
    $book->addChild('Fees',$fees);
    $book->addChild('Status',$status);
    $book->addChild('FeedBack',$feedback);
    $library->asXML('../courier.xml');
    $_SESSION['addCourier']="<div>New Courier Registered Successfully</div>";
    header('Location: '."http://localhost/xml_test/manager/manager.php?id=".$manager_id);

}



?>


