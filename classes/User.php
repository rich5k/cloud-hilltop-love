<?php
require("../settings/db_class.php");

//require(dirname(__FILE__).'/../settings/db_class.php');

class User extends db_connection
{
    
    function adduser($fname, $lname, $username, $email, $pass,  $gender, $twitter, $instagram, $class, $sexual_orientation, $dob, $major, $phone)
    {
        return $this->db_query("INSERT INTO `users`(fname, lname, username, email, pass, gender, twitter, insta, class, sexual_orientation, dob, major, phone)
                                                    values ('$fname', '$lname', '$username', '$email', '$pass','$gender', '$twitter','$instagram','$class', '$sexual_orientation', '$dob', '$major',
                                                    '$phone')");
    }

    function edituser($id, $fname, $lname, $username, $email, $pass, $twitter, $instagram, $gender, $class, $sexual_orientation, $dob, $major, $phone)
    {
        return $this->db_query("UPDATE `users`
                            SET fname = '$fname', lname='$lname', email = '$email', pass= '$pass', gender='$gender', class = '$class',
                            major='$major', phone = '$phone' , username = '$username', twitter = '$twitter', insta = '$instagram', sexual_orientation = '$sexual_orientation' , dob = '$dob'
                            WHERE Uid = '$id'");
    }

    function deleteuser($id)
    {
        return $this->db_query("DELETE FROM users WHERE Uid = '$id'");
    }

    function finduser($email)
    {
        return $this->db_fetch_one("SELECT Uid, email, pass from users WHERE email = '$email'");
    }

    function findEmail($email)
    {
        return $this->db_fetch_one("SELECT email from users WHERE email = '$email'");
    }

    function findID($email)
    {
        return $this->db_fetch_one("SELECT Uid FROM users WHERE email = '$email'");
    }

    function addImage($id, $image_1)
    {
        return $this->db_query("INSERT INTO pictures(Uid, pic_name) values ('$id','$image_!')");
    }

    function updateImage($id, $image_1)
    {
        return $this->db_query("UPDATE pictures
                                SET pic_name = '$image_1', 
                                WHERE pic_id = '$id' ");
    }

    function getAllUserImages($id){
        return $this->fetch("SELECT * FROM pictures where Uid = '$id'");
    }

    function getUser($id)
    {
        return $this->db_fetch_one("SELECT * 
                                FROM users
                                INNER JOIN pictures
                                ON pictures.Uid = users.Uid");
    }

    function getPartner($id, $gender, $sexual_orientation)
    {
        if ($sexual_orientation = 'hetorosexual') {
            if ($gender = 'm') {
                return $this->db_fetch_all('SELECT users.Uid, username, interest_name, image_1
                                    FROM users
                                    INNER JOIN user_interest
                                    ON users.Uid = user_interest.Uid
                                    INNER JOIN interest
                                    ON interest.int_id = user_interest.interest_id
                                    INNER JOIN pictures
                                    ON pictures.Uid = users.Uid
                                    WHERE gender = "f" and sexual_orientation = ' . $sexual_orientation . ' ');
            } else {
                return $this->db_fetch_all('SELECT users.Uid, username, interest_name, image_1
                                        FROM users
                                        INNER JOIN user_interest
                                        ON users.Uid = user_interest.Uid
                                        INNER JOIN interest
                                        ON interest.int_id = user_interest.interest_id
                                        INNER JOIN pictures
                                        ON pictures.Uid = users.Uid
                                        WHERE gender = "m" and sexual_orientation = ' . $sexual_orientation . '');
            }
        } elseif ($sexual_orientation = 'bisexual') {
            return $this->db_fetch_all('SELECT users.Uid, username, interest_name, image_1
                                FROM users
                                INNER JOIN user_interest
                                ON users.Uid = user_interest.Uid
                                INNER JOIN interest
                                ON interest.int_id = user_interest.interest_id
                                INNER JOIN pictures
                                ON pictures.Uid = users.Uid
                                WHERE gender = "m" or gender = "f" ');
        } elseif ($sexual_orientation = 'homosexual') {
            return $this->db_fetch_all('SELECT users.Uid, username, interest_name, image_1
                                FROM users
                                INNER JOIN user_interest
                                ON users.Uid = user_interest.Uid
                                INNER JOIN interest
                                ON interest.int_id = user_interest.interest_id
                                INNER JOIN pictures
                                ON pictures.Uid = users.Uid
                                WHERE gender = ' . $gender . ' and sexual_orientation = ' . $sexual_orientation . '');
        } elseif ($sexual_orientation = 'pansexual') {
            return $this->db_fetch_all('SELECT users.Uid, username, interest_name, image_1
                                FROM users
                                INNER JOIN user_interest
                                ON users.Uid = user_interest.Uid
                                INNER JOIN interest
                                ON interest.int_id = user_interest.interest_id
                                INNER JOIN pictures
                                ON pictures.Uid = users.Uid');
        }
    }
}
