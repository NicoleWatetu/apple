<?php
include("connect.php");
if(isset($_POST['submit'])){
    $username=$_POST['user'];
    $email=$_POST['email'];
    $password=$_POST['pass'];
    $password=$_POST['cpass'];
    $role = $_POST['role'];

    $sql="SELECT * FROM signup WHERE username='$username'";
    $result = mysqli_query($conn,$sql);
    $count_user=my sqli_num_rows($result);

    $sql="SELECT * FROM signup WHERE email='$email'";
    $result=mysqli_query($conn,$sql);
    $count_email=my sqli_num_rows($result);

    if($count_user==0 && $count_email==0){ 
    if($password==$cpassword){
        $hash=password_hash($password,PASSWORD_DEFAULT);
        $sql="INSERT INTO signup(username,email,password) VALUES ('$username', '$email', '$hash')";
        $result=mysqli_query($conn.$sql);
        if($result){
            header("Location:welcome.php");
            exit();
        }
    }
    }
    else{
        if($count_user>0){
            echo"<script>
            window.location.href='index.php';
            alert('Username already exists!!');
            </script>";
        }
        if($count_email>0){
            echo"<script>
            window.location.href='index.php';
            alert("Email already exists!!");
            </script>";
        }
    }

}
?>
