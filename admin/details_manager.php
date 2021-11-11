<?php
session_start();
if(!isset($_SESSION['manager'])){
    header('Location: '."http://localhost/xml_test/manager/manager_login.php");
}
?>
<h1>Details about the Manager</h1>
<br>
<a href="http://localhost/xml_test/manager/manager_logout.php" class="btn-primary">Logout</a>
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



        <p>Manager Id: <?php echo $manager_id?></p>
        <p>Password <?php echo $password?></p>
        <p>Name: <?php echo $name?></p>
        <p>Address: <?php echo $address?></p>
        <p>Contact: <?php echo $contact?></p>
        <p>Email: <?php echo $email?></p>
        <p>Branch: <?php echo $branch?></p>
        

        <a href="http://localhost/xml_test/admin/update_manager.php?id=<?php echo $manager_id ?>" class="btn-primary">Update Manager</a>&nbsp
        <a href="http://localhost/xml_test/admin/delete_manager.php?id=<?php echo $manager_id ?>" class="btn-primary">Delete Manager</a>&nbsp
        <a href="http://localhost/xml_test/admin/dashboard.php" class="btn-primary">Back to Dashboard</a>