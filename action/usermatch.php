<?php 
require('../controllers/UserController.php');
session_start();
//this code puts the number of likes in a variable 
//then it does a for loop where the limit is the number of likes
//then it takes the people that the user has liked
//cross checks to see whether they have been liked back
//then puts them in the matches table
$a;
$a = get_Number_of_Likes($id);

for($i = 0; $i < $a; $i++){
    $b = get_likes($id);

    

}

     

 



?>