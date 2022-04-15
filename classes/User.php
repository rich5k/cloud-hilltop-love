<?php
require("../settings/db_class.php");

//require(dirname(__FILE__).'/../settings/db_class.php');

class User extends Connection{
    function adduser($fname, $lname, $username, $email, $pass, $twitter, $instagram, $gender, $class, $sexual_orientation, $dob, $major,  $phone, $role){
        return $this->query("INSERT INTO User(fname, lname, user_email, user_password, gender, twitter, instagram, class, sexual_orientation, dob, major, user_number, user_role)
                                                    values ('$fname', '$lname', '$email', '$pass','$gender' ,'$class', '$sexual_orientation', '$dob', '$major',
                                                    '$phone','$role')");
    }

    function edituser($id, $fname, $lname, $username, $email, $pass, $twitter, $instagram, $gender, $class, $sexual_orientation, $dob, $major, $phone ){
        return $this->query("UPDATE User
                            SET fname = '$fname', lname='$lname', user_email = '$email', user_password= '$pass', gender='$gender', class = '$class',
                            major='$major', user_number = '$phone' , twitter = '$twitter', instagram = '$instagram', sexual_orientation = '$sexual_orientation' , dob = '$dob'
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

    function getPartner($id, $gender, $sexual_orientation){
        if($sexual_orientation = 'hetorosexual'){
            if($gender = 'male'){
                return $this->fetch('SELECT Uid, username, interest_name, image_1
                                    FROM user
                                    INNER JOIN user_interest
                                    ON user.Uid = user_interest.Uid
                                    INNER JOIN interest
                                    ON interest.int_id = user_interest.interest_id
                                    INNER JOIN pictures
                                    ON pictures.Uid = user.Uid
                                    WHERE gender = "female" and sexual_orientation = '.$sexual_orientation.' ');
            }else{
                return $this->fetch('SELECT Uid, username, interest_name, image_1
                                        FROM user
                                        INNER JOIN user_interest
                                        ON user.Uid = user_interest.Uid
                                        INNER JOIN interest
                                        ON interest.int_id = user_interest.interest_id
                                        INNER JOIN pictures
                                        ON pictures.Uid = user.Uid
                                        WHERE gender = "male" and sexual_orientation = '.$sexual_orientation.'');
            }
        }elseif ($sexual_orientation = 'bisexual') {
            return $this->fetch('SELECT Uid, username, interest_name, image_1
                                FROM user
                                INNER JOIN user_interest
                                ON user.Uid = user_interest.Uid
                                INNER JOIN interest
                                ON interest.int_id = user_interest.interest_id
                                INNER JOIN pictures
                                ON pictures.Uid = user.Uid');
        }elseif($sexual_orientation = 'homosexual'){
            return $this->fetch('SELECT Uid, username, interest_name, image_1
                                FROM user
                                INNER JOIN user_interest
                                ON user.Uid = user_interest.Uid
                                INNER JOIN interest
                                ON interest.int_id = user_interest.interest_id
                                INNER JOIN pictures
                                ON pictures.Uid = user.Uid
                                WHERE gender = '.$gender.' and sexual_orientation = '.$sexual_orientation.'');
        }elseif($sexual_orientation = 'pansexual'){
            return $this->fetch('SELECT Uid, username, interest_name, image_1
                                FROM user
                                INNER JOIN user_interest
                                ON user.Uid = user_interest.Uid
                                INNER JOIN interest
                                ON interest.int_id = user_interest.interest_id
                                INNER JOIN pictures
                                ON pictures.Uid = user.Uid');
        }
        
    }

}








?>