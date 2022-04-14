<?php


class addNewUser{
    public $connection;
    public $userID;
    public $fullname;
    public $fullname_err;
    public $username;
    public $username_err;
    public $email;
    public $email_err;
    public $password;
    public $password_err;
    public $confirm_password;
    public $confirm_password_err;
    public $gender;
    public $DOb;
    public $phone_number;
    public $sexual_orientation;


    function __construct($con,$userID,$fullname,$username,$email,$password,$gender,$Dob,$phone_number,$sexual_orientation,$pictureID){
        $this->connection=$con;
        $this->userID=$userID;
        $this->fullname=$fullname;
        $this->username=$username;
        $this->email=$email;
        $this->password=$password;
        $this->gender=$gender;
        $this->DOb=$Dob;
        $this->phone_number=$phone_number;
        $this->sexual_orientation=$sexual_orientation;

    }

    function registerUser(){



    }

    function insertNuser(){
        // validte firstname
        if (empty(trim($this->fullname))){
            $this->firstname_err= "Please type your firstname";
        }else{
            $newfullname=trim($this->fullname);
        }

        // Validate username
        if(empty(trim($this->username))){
            $this->username_err = "Please enter a username.";
        } else{
            // Prepare a select statement
            $sql = "SELECT userid FROM users WHERE username = ?";

            if($stmt = $this->connection->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("s", $param_username);

                // Set parameters
                $param_username = trim($_POST["username"]);

                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    // store result
                    $stmt->store_result();

                    if($stmt->num_rows == 1){
                        $this->username_err = "This username is already taken.";
                    } else{
                        $newusername = trim($this->username);
                    }
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }

                // Close statement
                $stmt->close();
            }else{
                echo "there is something wrong";
            }
        }

        // Validate password
        if(empty(trim($this->password))){
            $this->password_err = "Please enter a password.";
        } elseif(strlen(trim($this->password)) < 6){
            $this->password_err = "Password must have atleast 6 characters.";
        } else{
            $newpassword = trim($this->password);
        }

        // Validate confirm password
        if(empty(trim($this->confirm_password))){
            $this->confirm_password_err = "Please confirm password.";
        } else{
            $newconfirm_password = trim($this->confirm_password);

        }

        //validate gender
        if(empty(trim($this->gender))){
            $this->gender_err="please select your gender type";
        }else{
            $newgender=trim($this->gender);
        }

        //validate email address
        if(empty(trim($this->email))){
            $this->email_err="please enter your emailaddress";
        }else{
            $newemailaddres=trim($this->email);
        }

        //validate dateOfbirth
        if(empty(trim($this->DOb))){
            $this->DOb_err="Please specify your date of birth";

        }else{
            $newdateBirth=trim($this->DOb);
        }

        // validate phonenumber
        if(empty(trim($this->phone_number))){
            $this->phone_number_err="Please enter your phone number";

        }else{
            $newphoneNumber=trim($this->phone_number);
        }

        // validate sexual orientation
        if(empty(trim($this->sexual_orientation))){
            $this->sexual_orientation="Please specify your sexual orientation";
        }else{
            $newsexualOrientation=trim($this->sexual_orientation);
        }

        // Check input errors before inserting in database
        if(empty($this->username_err) && empty($this->password_err) && empty($this->confirm_password_err)){
            //  if(empty($firstname_err)&& empty($lastname_err)){
            // Prepare an insert statement
            $sql = "INSERT INTO users (userID,fullname,username,email,password,gender,Dob,phone_number,sexual_orientation) VALUES (?,?,?,?,?,?,?,?,?)";

            if($stmt = $this->connection->prepare($sql)){
                // Bind variables to the prepared statement as parameters
                $stmt->bind_param("ssssssss",$param_userid,$param_username,$param_email,$param_password,$param_gender,$param_Dob,$param_phoneNumber,$param_sexualOrientation);

                $param_userid=uniqid();
                $param_fullname= $newfullname;
                $param_username= $newusername;
                $param_email = $newemailaddres;
                $param_password = password_hash($newpassword, PASSWORD_DEFAULT); // Creates a password hash
                $param_gender=$newgender;
                $param_Dob=$newdateBirth;
                $param_phoneNumber=$newphoneNumber;
                $param_sexualOrientation=$newsexualOrientation;




                // Attempt to execute the prepared statement
                if($stmt->execute()){
                    //Save the pictures
                    $this->insertUserPIC('myfile');
                    // Redirect to login page
                    header("location: ../view/auth/login.php");
                } else{
                    echo "Something went wrong. Please try again later.";
                }

                // Close statement
                $stmt->close();
            }
        }

        // Close connection
        $this->connection->close();



    }
    function insertUserPIC($fileID){
        if (($_FILES[$fileID]['name']!="")){
            // Where the file is going to be stored
            $target_dir = "../images/";
            $file = $_FILES[$fileID]['name'];
            $path = pathinfo($file);
            $filename = $path['filename'];
            $ext = $path['extension'];
            $temp_name = $_FILES[$fileID]['tmp_name'];
            $path_filename_ext = $target_dir.$filename.".".$ext;
            // Check if file already exists
            if (file_exists($path_filename_ext)) {
                echo "Sorry, file already exists.";
            }else{
                move_uploaded_file($temp_name,$path_filename_ext);
                echo "Congratulations! File Uploaded Successfully.";
            }
        }

    }

}






?>
