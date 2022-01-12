<?php
session_start(); 
include('connect.php');


$adhar =$_POST['Adhar'];
$password =$_POST['password'];
$role =$_POST['role'];

$check = mysqli_query($connect, "SELECT * FROM user WHERE Adhar='$adhar' AND password='$password' AND role='$role'");

if(mysqli_num_rows($check)>0){
    $userdata = mysqli_fetch_array($chech);
    $groups = mysqli_query($connect, "SELECT * FROM user WHERE role=2");
    $groupsdata = mysqli_fetch_all($group, MYSQLI_ASSOC);

    $_SESSION['userdata']= $userdata;
    $_SESSION['groupsdata']= $groupsdata;

    echo '
            <script>
            window.location = "../routes.dashboard.php";
            </script>
            ';


}
else{
    echo '
            <script>
            alert("Invalid credentials or User not found!");
            window.location = "../";
            </script>
            ';
}



?>