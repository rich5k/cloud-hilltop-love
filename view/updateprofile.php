<?php

require('../settings/core.php');
if (check_login() ===  false) {
  header('Location: ./auth/login.php');
}
require('../controllers/UserController.php');

//var_dump($_SESSION['Uid']);

$user = get_user_controller($_SESSION['Uid']);

//header('Location: ./auth/login.php');
$interest = get_user_interests($_SESSION['Uid']);
$allInterest = get_all_interest_controller();

//var_dump($user['insta']);
//echo $user['insta'];
//die;
// echo $pImage;
$imageUrl = "../assets/avis/" . $user['pic_name'];
$majors = get_major_controller();


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="../css/updateprofile.css">
</head>

<body>
  <div class="container">
    <style>
      .avatar {
        position: relative;
        top: 30px;
        margin-bottom: -50px;
        text-align: center;
      }

      .pic_session .avatar img {
        width: 100px;
        height: 100px;
        max-width: 250px;
        max-height: 250px;
        -webkit-border-radius: 50%;
        -moz-border-radius: 50%;
        border-radius: 50%;
        border: 5px solid rgba(255, 255, 255, 0.5);
      }

      body {
        background-color: rgba(214, 224, 226, 0.2);
      }
    </style>
    <h1>Edit Profile</h1>
    <hr>
    <div class="row">
      <!-- left column -->
      <form action="../action/update_profile_process.php" class="form-horizontal" method="post" role="form" enctype='multipart/form-data'>
        <div class="col-md-3">
          <div class="text-center">
            <div class="pic_session">
              <div class="avatar">
                <img class="avatar pic_session" src=<?php echo $imageUrl ?> class="avatar img-circle" alt="avatar">
              </div>
            </div>

          </div>
          <br><br><br><br><br><br><br>
          <h6>Upload a different photo...</h6>
          <input type="file" class="form-control" name="file">
        </div>


        <!-- edit form column -->
        <div class="col-md-9 personal-info">
          <!-- <div class="alert alert-info alert-dismissable">
          <a class="panel-close close" data-dismiss="alert">×</a> 
          <i class="fa fa-coffee"></i>
          This is an <strong>.alert</strong>. Use this to show important messages to the user.
        </div> -->
          <h3>Personal info</h3>


          <div class="form-group">
            <label class="col-lg-3 control-label">First name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="fname" value=<?php echo $user['fname'] ?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Last name:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="lname" value=<?php echo $user['lname'] ?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Phone Number:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="phone" value=<?php echo $user['phone'] ?>>
            </div>
          </div>
          <div class="form-group">
            <label class="col-lg-3 control-label">Email:</label>
            <div class="col-lg-8">
              <input class="form-control" type="text" name="email" value=<?php echo $user['email'] ?>>
            </div>
          </div>
          <div class='form-group'>
            <label for="major" class="col-lg-3 control-label">Offering Major</label>
            <select id="major" class="form-select form-select-lg" name="major">
              <?php
              foreach ($majors as $major) { ?>
                <option value=<?php echo $major['course_id']; ?> <?php if ($major['course_id'] == $user['major']) {
                                                                    echo ("selected");
                                                                  } ?> id=<?php echo $major['course_id'] ?>><?php echo $major['course_title'] ?></option>
              <?php }
              ?>
            </select>
          </div>

          <div class='form-group'>
            <label for="twitter" class="col-lg-3 control-label">Twiter handle:</label>
            <div class="col-md-8">
              <input type="text" class="form-control" id="twitter" name="twitter" value=<?php echo $user['twitter'] ?>>
            </div>
          </div>

          <div class='form-group'>
            <label for="instagram" class="col-lg-3 control-label">Instagram handle:</label>
            <div class="col-md-8">
              <input type="text" class="form-control" id="instagram" name="instagram" value=<?php echo $user['insta'] ?>>
            </div>
          </div>

          <div class="form-group">
            <label class="col-lg-3 control-label">Username:</label>
            <div class="col-md-8">
              <input class="form-control" type="text" name="username" value=<?php echo $user['username'] ?>>
            </div>
          </div>

          <div class='form-group'>
            <label for="sexual_orient" class="col-md-3 control-label"> Sexual Orientation:</label>

            <select name="sexual_orientation" id="sexual_orient" class="form-select form-select-lg">
              <option value="2" <?php if (2 == $user['sexual_orientation']) {
                                  echo ("selected");
                                } ?>>Bisexual</option>
              <option value="1" <?php if (1 == $user['sexual_orientation']) {
                                  echo ("selected");
                                } ?>>Heterosexual</option>

              <option value="3" <?php if (3 == $user['sexual_orientation']) {
                                  echo ("selected");
                                } ?>>Homosexual</option>
              <option value="4" <?php if (4 == $user['sexual_orientation']) {
                                  echo ("selected");
                                } ?>>Pansexual</option>
            </select>

          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Interests:</label><br>
            <div class="col-md-8">
              <div class="form-check">


                <?php
                foreach ($allInterest as $int) { ?>

                  <input class='form-check-input' <?php
                                                  for ($i = 0; $i < count($interest); $i++) {
                                                    if ($int['int_id'] === $interest[$i]['Iid']) {
                                                      echo ("checked");
                                                    }
                                                  }
                                                  ?> type='checkbox' id=<?php echo $int['int_id'] ?> name='interests[]' value=<?php echo $int['int_id'] ?>>
                  <label for='form-check-label'><?php echo $int['interest_name'] ?></label><br>


                <?php } ?>

              </div>
            </div>
          </div>
          <div class="form-group">
            <label class="col-md-3 control-label">Password:</label>
            <div class="col-md-8">
              <input class="form-control" name="password" type="password" value="">
            </div>
          </div>

          <div class="form-group">
            <label class="col-md-3 control-label">Confirm password:</label>
            <div class="col-md-8">
              <input class="form-control" name="cpass" type="password" value="">
            </div>
          </div>

          <input type="hidden" name="pass" value=<?php echo $user['pass'] ?>>
          <input type="hidden" name="class" value=<?php echo $user['class'] ?>>
          <input type="hidden" name="gender" value=<?php echo $user['gender'] ?>>
          <input type="hidden" name="Uid" value=<?php echo $user['Uid'] ?>>

          <div class="form-group">
            <label class="col-md-3 control-label"></label>
            <div class="col-md-8">
              <input type="submit" name="update" class="btn btn-primary" value="Save Changes">

            </div>
          </div>
      </form>
    </div>
  </div>
  </div>
  <hr>

  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>

</body>

</html>