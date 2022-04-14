<?php
include_once "../db/connect_db.php";
include_once "../classes/add_new_user.php";

$hiltop=new hilltopLove();
$con=$hiltop->connectdb();
$userID=uniqid();
$useremail=$_POST['email'];
$userPassword=$_POST['password'];
$userCpass=$_POST['cpass'];
$userfullname=$_POST['fname'].$_POST['lname'];
$userphone=$_POST['phone'];
$userdob=$_POST['dob'];
$username=$_POST['username'];
$usergender=$_POST['gender'];
$sexOrientation=$_POST['sexual_orient'];
$usertwiter=$_POST['twitter'];
$userInstagram=$_POST['facebook'];

$userPictureID='filefield';



$newUser=new addNewUser($con,$userID,$userfullname,$username,$useremail,$userPassword,$usergender,$userdob,$userphone,$sexOrientation,$userPictureID);
$addUSer=$newUser->insertNuser();


