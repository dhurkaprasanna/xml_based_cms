
<center><h1>Welcome to XML Based Courier Management System</h1></center>
<br>
<br>
<a href="http://localhost/xml_test/customer/user_login.php" class="btn-secondary">User Login</a>&nbsp
<a href="http://localhost/xml_test/manager/manager_login.php?" class="btn-secondary">Manager Login</a>
<h3>Track your Courier by entering the Courier Number below</h3>
<br>
<?php
session_start();
if(isset($_SESSION['invalid']))
{
    echo $_SESSION['invalid'];
    unset($_SESSION['invalid']);
}
?>

<br>
<form action="" method="POST">
<input type="text" name="courierId" placeholder="Enter the Courier ID">
<br>
<br>
    <input type="submit" name="submit" value="Track Courier" class="btn-secondary">
</form>


<?php
if(isset($_POST['submit']))
{
    $courier_id=$_POST['courierId'];
    $library = new SimpleXMLElement('courier.xml',null,true);
    $status = $library->xpath('//Courier[@courierId='.$courier_id.']/Status')[0];
    if(strcmp($status,"")==0){
        $_SESSION['invalid']="<div>Please enter a valid Courier Id</div>";
        header('Location: '."http://localhost/xml_test/main.php");
    }
    $type=$library->xpath('//Courier[@courierId='.$courier_id.']/Type')[0];
    $qty=$library->xpath('//Courier[@courierId='.$courier_id.']/Qty')[0];
    ?>
<h4>
    Courier Details:
</h4>
<p>
    Courier Id: <?php echo $courier_id ?>
</p>
<p>
    Type: <?php echo $type ?>
</p>
<p>
    Quantity: <?php echo $qty ?>
</p>
<p>
    Status: <?php echo $status ?>
</p>
<p>Please Login for more details</p>
<?php   
}
?>

