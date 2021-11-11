<?php
session_start();
if(!isset($_SESSION['manager'])){
    header('Location: '."http://localhost/xml_test/manager/manager_login.php");
}
$managerId=$_GET['id'];
?>
<h1> Add User </h1>
<br>
<a href="http://localhost/xml_test/manager/manager_logout.php" class="btn-primary">Logout</a>
<br>

<form action="" method="POST">
    <table class="tbl-30">
        <tr>
            <td>User Id: </td>
            <td>
                <input type="text" name="user_id" placeholder="Enter the User ID">
            </td>
        </tr>
        <tr>
            <td>Password: </td>
            <td>
                <input type="password" name="password" placeholder="Enter the Password">
            </td>
        </tr>
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
    <input type="submit" name="submit" value="Register" class="btn-secondary">
</form>
<a href="http://localhost/xml_test/manager/manager.php?id=<?php echo $managerId ?>" class="btn-primary">Cancel</a>
<?php 

if(isset($_POST['submit']))
{
    //The submit button is clicked

    $user_id=$_POST['user_id'];
    $password=$_POST['password'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    
    $manages = new SimpleXMLElement('../customer.xml',null,true);
    $manage = $manages->addChild('Customer');
    $manage->addAttribute('userId', $user_id);
    $manage->addChild('Password',$password);
    $manage->addChild('Name',$name);
    $manage->addChild('Address',$address);
    $manage->addChild('Contact',$contact);
    $manage->addChild('Email',$email);
    $manages->asXML('../customer.xml');
    $_SESSION['addUser']="<div>User Added Successfully</div>";
    header('Location: '."http://localhost/xml_test/manager/manager.php?id=".$managerId);
}



?>