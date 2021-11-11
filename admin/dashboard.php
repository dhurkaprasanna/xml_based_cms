<?php
session_start();
if(!isset($_SESSION['manager'])){
    header('Location: '."http://localhost/xml_test/manager/manager_login.php");
}
?>
<h1> Welcome Admin </h1>
<br>
<a href="http://localhost/xml_test/manager/manager_logout.php" class="btn-primary">Logout</a>
<?php
if(isset($_SESSION['managerLogin']))
{
    echo $_SESSION['managerLogin'];
    unset($_SESSION['managerLogin']);
}
if(isset($_SESSION['deleteManager']))
{
    echo $_SESSION['deleteManager'];
    unset($_SESSION['deleteManager']);
}
$library = new SimpleXMLElement('../customer.xml',null,true); 
$userCount=count($library);
$library = new SimpleXMLElement('../manager.xml',null,true); 
$managerCount=count($library);
?>
<h3>The number of Users of this CMS are: <?php echo $userCount ?></h3>
<h3>The number of Managers in this CMS are: <?php echo $managerCount ?></h3>
<br>
<a href="http://localhost/xml_test/admin/add_manager.php" class="btn-secondary">Add Manager</a>
<br>
<h2>The List of Managers are<h2>


<?php 
$library = new SimpleXMLElement('../manager.xml',null,true);
$num = count($library); 
?>
<table cellpadding="5" cellspacing="5">
<tr>
    <th> Manager Id </th>
    <th> Name </th>
    <th> Branch </th>
</tr>

<?php

for($x=0;$x<$num;$x++){
   
        $manager_id=strval($library->xpath('//Manager[@managerId]')[$x]["managerId"]);
        $name=$library->xpath('//Name')[$x];
        $branch=$library->xpath('//Branch')[$x];
        ?>
        <tr>
            <td><?php echo $manager_id?> </td>
            <td> <?php echo $name?> </td>
            <td> <?php echo $branch?> </td>
            <td><a href="http://localhost/xml_test/admin/details_manager.php?id=<?php echo $manager_id ?>" class="btn-secondary">Details</a></td>
        </tr>
        <?php 
}
?>
</table>