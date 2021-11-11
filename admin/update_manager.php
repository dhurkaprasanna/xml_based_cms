<?php
session_start();
if(!isset($_SESSION['manager'])){
    header('Location: '."http://localhost/xml_test/manager/manager_login.php");
}
?>
<h1> Update Manager </h1>
<br>
<a href="http://localhost/xml_test/manager/manager_logout.php" class="btn-primary">Logout</a>
<br>
<?php
$manager_id=$_GET["id"];
$library = new SimpleXMLElement('../manager.xml',null,true);
$password=$library->xpath("//Manager[@managerId=".$manager_id."]/Password")[0];
$name=$library->xpath("//Manager[@managerId=".$manager_id."]/Name")[0];
$address=$library->xpath("//Manager[@managerId=".$manager_id."]/Address")[0];
$contact=$library->xpath("//Manager[@managerId=".$manager_id."]/Contact")[0];
$email=$library->xpath("//Manager[@managerId=".$manager_id."]/Email")[0];
$branch=$library->xpath("//Manager[@managerId=".$manager_id."]/Branch")[0];

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
        <tr>
            <td>Branch: </td>
            <td>
                <input type="text" name="branch" value="<?php echo $branch?>">
            </td>
        </tr>

    </table>
    <br>
    <input type="submit" name="submit" value="Update Manager" class="btn-secondary">
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
    $branch=$_POST['branch'];
    
    $library = new SimpleXMLElement('../manager.xml',null,true);
    $book = $library->xpath('//Manager[@managerId='.$manager_id.']');
    $book[0]->Password=$password;
    $book[0]->Name=$name;
    $book[0]->Address=$address;
    $book[0]->Contact=$contact;
    $book[0]->Email=$email;
    $book[0]->Branch=$branch;
    $library->asXML('../manager.xml');
    header('Location: '."http://localhost/xml_test/admin/details_manager.php?id=".$manager_id);
}



?>
<a href="http://localhost/xml_test/admin/details_manager.php?id=<?php echo $manager_id ?>" class="btn-primary">Go Back</a>&nbsp
<a href="http://localhost/xml_test/admin/dashboard.php" class="btn-primary">Back to Dashboard</a>