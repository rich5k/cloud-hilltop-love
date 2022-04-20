<?php


require('../controllers/UserController.php');
session_start();
//unset($SESSION['error']); 
//unset($SESSION['errors']);

if(isset($_POST['register'])){
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['password'];
    $username = $_POST['username'];
    $class = $_POST['class'];
    $confirmPass = $_POST['cpass'];
    $dob = $_POST['dob'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    $gender = $_POST['gender'];
    $sexual_orientation = $_POST['sexual_orientation'];
    $phone = $_POST['phone'];
    $major = $_POST['major'];
    $role = 1;

    if(find_email_controller($email)===true){
        header("Location: register.php?error=Email already exists!");
        die;
    }
    else if($pass !== $confirmPass){
        header("Location: register.php?error=Passwords do not match!");
        die;
    }
    else{
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        //die($pass);
        
        if( add_user_controller($fname, $lname, $username, $email, $pass,  $gender, $twitter, $instagram, $class, $sexual_orientation, $dob, $major, $phone) !== true) {
            header('Location: ../view/auth/register.php?error=Data could not be inserted');
        }
       
        if (isset($_FILES["file"]["name"])){
            $Uid = find_user_controller($email);
            //Get Image Upload path
            $targetDir = "../assets/avis/";
            
            //var_dump($Uid['Uid']);
            $fileName = basename($_FILES["file"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            //die;
            
            
            //Get file type
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
    
            //Check if file is an image and upload it to the server
            $allowTypes = array('jpg', 'JPG', 'png','jpeg','JPEG', 'PNG');
    
            if(in_array($fileType, $allowTypes)){
                //echo $fileName.'<br>';
                // Upload file to server
                if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                    //echo "true";
                    add_image_controller($Uid['Uid'], $fileName);
                    $_SESSION['avi'] = $fileName;
                    header('Location: ../view/profile.php');
                        
                }
            }
            
        }
        //$_SESSION['Uid'] = find_user_id($email);
        //header("Location: ../view/auth/login.php"); 
        
    }   
}
//die("ERROR: Could not execute");
//echo $_POST['signin'];


if(isset($_POST['signin'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $result = find_email_controller($email);
    // var_dump($result);
    // die;
    
    //die('home');
    

    if(isset($result['email'])){
        $result1 = find_user_controller($email); 
        var_dump($result1);
        echo "Email there<br>";
        var_dump(password_verify($password, $result1['pass']));
        //die;
        if(password_verify($password, $result1['pass']) === true){
            echo "password there";
            //die;
            $user = find_user_controller($email);
            $_SESSION['Uid'] = $user['Uid'];
            //$role = $user['user_role'];
            //var_dump($role);
            $image = get_all_user_images_controller($user['Uid']);
            $_SESSION['avi'] = $image;
            header("Location: ../view/profile.php");
        
        }else{
            $_SESSION['error'] = 'password is incorrect'; 
            
            header("Location: ../view/auth/login.php");
        }
        
    }else{
        $_SESSION['errors'] = 'Email or password is incorrect'; 
        header("Location: ../view/auth/login.php");
    }

}

    

?>
