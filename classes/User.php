<?php
require("../db/db_class.php");

class User extends Connection{
    function adduser($fname, $lname, $username, $email, $pass, $twitter, $instagram, $gender, $class, $sexual_orientation, $major, $phone, $role){
        return $this->query("INSERT INTO User(fname, lname, user_email, user_password, gender, twitter, instagram, class, sexual_orientation, major, user_number, user_role)
                                                    values ('$fname', '$lname', '$email', '$pass','$gender' ,'$class', '$major',
                                                    '$phone','$role')");
    }

    function edituser($id, $fname, $lname, $username, $email, $pass, $twitter, $instagram, $gender, $class, $sexual_orientation, $major, $phone ){
        return $this->query("UPDATE User
                            SET fname = '$fname', lname='$lname', user_email = '$email', user_password= '$pass', gender='$gender', class = '$class',
                            major='$major', user_number = '$phone' , twitter = '$twitter', instagram = '$instagram', sexual_orientation = '$sexual_orientation'
                            WHERE Uid = '$id'");
    }

    function deleteuser($id){
        return $this->query("DELETE FROM User WHERE Uid = '$id'");
    }

    function finduser($email){
        return $this->fetchOne("SELECT Uid, user_email, user_password, user_role from User WHERE user_email = '$email'");
    }

    function findEmail($email){
        return $this->fetchOne("SELECT user_email from User WHERE user_email = '$email'");
    }

    function findID($email){
        return $this->fetchOne("SELECT Uid FROM User WHERE user_email = '$email'");
    }

    function addImage($image_1, $image_2, $image_3, $image_4, $image_5){
        return $this->query("INSERT INTO pictures(image_1, image_2, image_3, image_4, image_5) values ('$image_1','$image_2','$image_3','$image_4','$image_5','')");
    }


    // function get_User($id){
    //     return $this->fetchOne("SELECT * FROM User_id WHERE User_id = '$id'");
    // }

    // function get_user_service($id){
    //     return $this->fetch("SELECT * FROM user_service WHERE id = '$id'");
    // }
}