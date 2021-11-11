<h1> User Login</h1>
<?php 
session_start();
if(isset($_SESSION['userLogin']))
{
    echo $_SESSION['userLogin'];
    unset($_SESSION['userLogin']);
}
?>
<br><br>
<form action="" method="POST">
Username:
<br>
<br>
<input type="text" name="username" placeholder="Enter Username">
<br>
<br>
Password:
<br>
<br>
<input type="password" name="password" placeholder="Enter Password">
<br>
<br>
<input type="submit" name="submit" value="Login" class="btn-primary">
</form>

<?php 

if(isset($_POST['submit']))
{
    $username=$_POST['username'];
    $password=$_POST['password'];
    $library = new SimpleXMLElement('../customer.xml',null,true);
    $num = count($library); 
    $flag=0;
    for($x=0;$x<$num;$x++){
        if(strcmp($library->xpath('//Customer[@userId]')[$x]["userId"],$username)==0 && strcmp($library->xpath('//Password')[$x],$password)==0){
            $flag=1;
        }
    }

    if($flag==1){
        //User is Present
        
        $_SESSION['userLogin']="<div>User Login Successful</div>";
        $_SESSION['user']=$username;
        header('Location: '."http://localhost/xml_test/customer/courier_history.php?id=".$username);
    }
    else{
        $_SESSION['userLogin']="<div>Username or Password did not match</div>";
        header('Location: '."http://localhost/xml_test/customer/user_login.php");
    }
}

?>