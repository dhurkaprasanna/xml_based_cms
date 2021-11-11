<?php
session_start();
if(!isset($_SESSION['manager'])){
    header('Location: '."http://localhost/xml_test/manager/manager_login.php");
}
?>
<a href="http://localhost/xml_test/manager/manager_logout.php" class="btn-primary">Logout</a>
<h1> Add Manager </h1>
<br>
<br>
<form action="" method="POST">
    <table class="tbl-30">
        <tr>
            <td>Manager Id: </td>
            <td>
                <input type="text" name="manager_id" placeholder="Enter the Manager ID">
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
        <tr>
            <td>Branch: </td>
            <td>
                <input type="text" name="branch" placeholder="Enter the Branch">
            </td>
        </tr>
    </table>
    <br>
    <input type="submit" name="submit" value="Register" class="btn-secondary">
</form>
<a href="http://localhost/xml_test/admin/dashboard.php" class="btn-secondary">Cancel</a>
<?php 

if(isset($_POST['submit']))
{
    //The submit button is clicked

    $manager_id=$_POST['manager_id'];
    $password=$_POST['password'];
    $name=$_POST['name'];
    $address=$_POST['address'];
    $contact=$_POST['contact'];
    $email=$_POST['email'];
    $branch=$_POST['branch'];
    
    $manages = new SimpleXMLElement('../manager.xml',null,true);
    $manage = $manages->addChild('Manager');
    $manage->addAttribute('managerId', $manager_id);
    $manage->addChild('Password',$password);
    $manage->addChild('Name',$name);
    $manage->addChild('Address',$address);
    $manage->addChild('Contact',$contact);
    $manage->addChild('Email',$email);
    $manage->addChild('Branch',$branch);
    $manages->asXML('../manager.xml');
    header('Location: '."http://localhost/xml_test/admin/dashboard.php");
}



?>