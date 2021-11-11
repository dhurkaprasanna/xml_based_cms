<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: '."http://localhost/xml_test/customer/user_login.php");
}
?>
<h1>Update your Profile Here</h1>
<br>
<a href="http://localhost/xml_test/customer/user_logout.php" class="btn-primary">Logout</a>
<br>
<?php
$user_id=$_GET["id"];
$library = new SimpleXMLElement('../customer.xml',null,true);
$password=$library->xpath("//Customer[@userId=".$user_id."]/Password")[0];
$name=$library->xpath("//Customer[@userId=".$user_id."]/Name")[0];
$address=$library->xpath("//Customer[@userId=".$user_id."]/Address")[0];
$contact=$library->xpath("//Customer[@userId=".$user_id."]/Contact")[0];
$email=$library->xpath("//Customer[@userId=".$user_id."]/Email")[0];


?>
<form action="" method="POST">
    <table class="tbl-30">
        <tr>
            <td>Password: </td>
            <td>
                <input type="text" name="password" value="<?php echo $password?>">
            </td>
        </tr>
        <tr>
            <td>Name: </td>
            <td>
                <input type="text" name="name" value="<?php echo $name?>">
            </td>
        </tr>

        <tr>
            <td>Address: </td>
            <td>
                <input type="text" name="address" value="<?php echo $address?>">
            </td>
        </tr>

        <tr>
            <td>Contact: </td>
            <td>
                <input type="text" name="contact" value="<?php echo $contact?>">
            </td>
        </tr>

        <tr>
            <td>Email: </td>
            <td>
                <input type="text" name="email" value="<?php echo $email?>">
            </td>
        </tr>

    </table>
    <br>
    <input type="submit" name="submit" value="Update Profile" class="btn-secondary">
</form>

<?php 

if(isset($_POST['submit']))
{
    //The submit button is clicked

    $password=$_POST['password'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    
    $library = new SimpleXMLElement('../customer.xml',null,true);
    $book = $library->xpath('//Customer[@userId='.$user_id.']');
    $book[0]->Password=$password;
    $book[0]->Name=$name;
    $book[0]->Address=$address;
    $book[0]->Contact=$contact;
    $book[0]->Email=$email;
    $library->asXML('../customer.xml');
    header('Location: '."http://localhost/xml_test/customer/courier_history.php?id=".$user_id);
}



?>

<a href="http://localhost/xml_test/customer/courier_history.php?id=<?php echo $user_id ?>" class="btn-primary">Back to Dashboard</a>