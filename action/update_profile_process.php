<?php

require('../controllers/UserController.php');
if(isset($_POST['update'])){
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $pass = $_POST['password'];
    $username = $_POST['username'];
    $confirmPass = $_POST['cpass'];
    $instagram = $_POST['instagram'];
    $twitter = $_POST['twitter'];
    $sexual_orientation = $_POST['sexual_orientation'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $class = $_POST['class'];
    $major = $_POST['major'];
    if(!empty($interest)){
        $interest = $_POST['interests'];
    }
    $Uid = $_POST['Uid'];
    if(isset($pass) && isset($confirmPass)){
        if($pass === $confirmPass){
            $nPass = $pass;
            $nPass = password_hash($pass, PASSWORD_DEFAULT);
        }else{
            header("Location: ../view/profile.php");
        }
    }else{
        $nPass = $_POST['pass'];
    }
        delete_interest_controller($Uid);
        if(isset($interest)){
            foreach($interest as $int){
                add_interest_controller($Uid, $int);
            }
        }
        //die($pass);
        // echo "passed email and password auth";
        if (update_user_controller($Uid, $fname, $lname, $username, $email, $npass, $twitter, $instagram, $gender, $class, $sexual_orientation, $major, $phone) !== true) {
            header('Location: ../view/profile.php?error=Data could not be updated');
        } 
       

        if (isset($_FILES["file"]["name"])) {
            $Uid = find_user_controller($email);
            //Get Image Upload path
            $targetDir = "../assets/avis/";

            //var_dump($Uid['Uid']);
            $fileName = basename($_FILES["file"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            //die;


            //Get file type
            $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

            //Check if file is an image and upload it to the server
            $allowTypes = array('jpg', 'JPG', 'png', 'jpeg', 'JPEG', 'PNG');

            if (in_array($fileType, $allowTypes)) {
                //echo $fileName.'<br>';
                // Upload file to server
                if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                    //echo "true";
                    add_image_controller($Uid['Uid'], $fileName);
                    $_SESSION['avi'] = $fileName;
                    echo '
                    <script src="../js/quickblox.min.js" ></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore.js" ></script>
                    <script src="https://unpkg.com/quickblox/quickblox.min.js"></script>
                    <script src="../js/QBconfig.js"></script>
                    <script src="../js/helpers.js" ></script>
                    <script src="../js/app.js" ></script>
                    <script src="../js/register.js" ></script>
                    <script>
                        var email="' . $email . '";
                        var fname="' . $fname . '";
                        var lname="' . $lname . '";
                        var username="' . $username . '";
                        var password="' . $nPass . '";
                        registerModule.setListeners(email, fname, lname, username,password);
                        
                    </script>
                    ';
                    header('Location: ../view/profile.php');
                }
            }
        }else{
            echo '
            <script src="../js/quickblox.min.js" ></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore.js" ></script>
            <script src="https://unpkg.com/quickblox/quickblox.min.js"></script>
            <script src="../js/QBconfig.js"></script>
            <script src="../js/helpers.js" ></script>
            <script src="../js/app.js" ></script>
            <script src="../js/register.js" ></script>
            <script>
                var email="' . $email . '";
                var fname="' . $fname . '";
                var lname="' . $lname . '";
                var username="' . $username . '";
                var password="' . $nPass . '";
                registerModule.setListeners(email, fname, lname, username,password);
                
            </script>
            ';
            //echo $username;
            header('Location: ../view/profile.php');
        }
        header('Location: ../view/profile.php');
        

    
}

?>