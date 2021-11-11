<?php
session_start();
if(!isset($_SESSION['manager'])){
    header('Location: '."http://localhost/xml_test/manager/manager_login.php");
}
$managerId=$_GET['id'];
$manage=new SimpleXMLElement('../manager.xml',null,true);
$name=$manage->xpath("//Manager[@managerId=".$managerId."]/Name")[0];
?>
<h1>Welcome <?php echo $name?></h1>
<br>
<?php
if(isset($_SESSION['managerLogin']))
{
    echo $_SESSION['managerLogin'];
    unset($_SESSION['managerLogin']);
}
if(isset($_SESSION['addUser']))
{
    echo $_SESSION['addUser'];
    unset($_SESSION['addUser']);
}
if(isset($_SESSION['addCourier']))
{
    echo $_SESSION['addCourier'];
    unset($_SESSION['addCourier']);
}
?>

<h3>Details About the Manager comes here</h3>
<br>
<a href="http://localhost/xml_test/manager/manager_logout.php" class="btn-primary">Logout</a>
<br>
<a href="http://localhost/xml_test/manager/add_courier.php?id=<?php echo $managerId ?>" class="btn-primary">New Courier</a>
<br>
<a href="http://localhost/xml_test/manager/add_user.php?id=<?php echo $managerId ?>" class="btn-primary">Add User</a>
<?php 


$library = new SimpleXMLElement('../courier.xml',null,true);
$num = count($library); 
?>
<table cellpadding="5" cellspacing="5">
<tr>
    <th> Courier Id </th>
    <th> Courier Type </th>
    <th> Quantity </th>
</tr>

<?php

for($x=0;$x<$num;$x++){
    if(strcmp($library->xpath('//managerId')[$x],$managerId)==0){
        $courier_id=strval($library->xpath('//Courier[@courierId]')[$x]["courierId"]);
        $type=$library->xpath('//Type')[$x];
        $qty=$library->xpath('//Qty')[$x];
        ?>
        <tr>
            <td><?php echo $courier_id?> </td>
            <td> <?php echo $type?> </td>
            <td> <?php echo $qty?> </td>
            <td><a href="http://localhost/xml_test/manager/details_courier.php?id=<?php echo $courier_id ?>" class="btn-secondary">Details</a></td>
        </tr>
        <?php 

    }
}
?>
</table>

