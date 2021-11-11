<h1> Manager Login</h1>
<?php 
session_start();
if(isset($_SESSION['managerLogin']))
{
    echo $_SESSION['managerLogin'];
    unset($_SESSION['managerLogin']);
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
    $library = new SimpleXMLElement('../manager.xml',null,true);
    $num = count($library); 
    $flag=0;
    for($x=0;$x<$num;$x++){
        if(strcmp($library->xpath('//Manager[@managerId]')[$x]["managerId"],$username)==0 && strcmp($library->xpath('//Password')[$x],$password)==0){
            $flag=1;
        }
    }

    if($flag==1){
        //User is Present
        
        $_SESSION['managerLogin']="<div>Login Successful</div>";
        $_SESSION['manager']=$username;
        if(strcmp($username,'111')==0){
            header('Location: '."http://localhost/xml_test/admin/dashboard.php");
        }
        else{
            header('Location: '."http://localhost/xml_test/manager/manager.php?id=".$username);
        }
        
    }
    else{
        $_SESSION['managerLogin']="<div>Username or Password did not match </div>";
        header('Location: '."http://localhost/xml_test/manager/manager_login.php");
    }
}

?>