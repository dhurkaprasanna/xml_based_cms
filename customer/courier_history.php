<?php
session_start();
if(!isset($_SESSION['user'])){
    header('Location: '."http://localhost/xml_test/customer/user_login.php");
}
?>
<?php 
$library = new SimpleXMLElement('../courier.xml',null,true);
$cust = new SimpleXMLElement('../customer.xml',null,true);
$num = count($library); 
$userId=$_GET['id'];
$name=$cust->xpath("//Customer[@userId=".$userId."]/Name")[0];

?>
<h1>Welcome <?php echo $name ?> </h1>
<br>
<a href="http://localhost/xml_test/customer/user_logout.php" class="btn-primary">Logout</a>
<?php

if(isset($_SESSION['userLogin']))
{
    echo $_SESSION['userLogin'];
    unset($_SESSION['userLogin']);
}

?>
<br>
<a href="http://localhost/xml_test/customer/update_customer.php?id=<?php echo $userId ?>" class="btn-primary">Update Profile</a>

<h3>Here are your Past Orders</h3>

<table cellpadding="5" cellspacing="5">
<tr>
    <th> Courier Id </th>
    <th> To </th>
    <th> Courier Type </th>
    <th> Quantity </th>
</tr>

<?php

for($x=0;$x<$num;$x++){
    if(strcmp($library->xpath('//userId')[$x],$userId)==0){
        $courier_id=strval($library->xpath('//Courier[@courierId]')[$x]["courierId"]);
        $to_name=$library->xpath('//Name')[$x];
        $type=$library->xpath('//Type')[$x];
        $qty=$library->xpath('//Qty')[$x];
        ?>
        <tr>
            <td><?php echo $courier_id?> </td>
            <td><?php echo $to_name?> </td>
            <td> <?php echo $type?> </td>
            <td> <?php echo $qty?> </td>
            <td><a href="http://localhost/xml_test/customer/details_courier.php?id=<?php echo $courier_id ?>" class="btn-secondary">Details</a></td>
        </tr>
        <?php 

    }
}
?>
</table>
<?php

?>