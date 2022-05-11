<?php

require('../settings/core.php');
/*if (check_login() ===  false) {
    header('Location: ./auth/login.php');
}*/
require('../controllers/UserController.php');

//var_dump($_SESSION['Uid']);

$user = get_user_controller($_SESSION['Uid']);

//header('Location: ./auth/login.php');
$interest = get_user_interests($_SESSION['Uid']);


//var_dump($user);
//die;
// echo $pImage;
$imageUrl = "../assets/avis/" . $user['pic_name'];
//require_once "../../action/userlike.php";

$numLikes = get_Number_of_Likes($_SESSION['Uid']);
?>
<!DOCTYPE html>
<html lang="en">

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Profile</title>
</head>

<body>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <link rel="stylesheet" href="../css/view_user.css">

  <body>
    <div class="main-content">
      <!-- Top navbar -->
      <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
        <div class="container-fluid">
          <!-- Brand -->
          <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="swipe_page.php"><img src="../img/red-cards.png" alt="swipe-cards"> Home</a>
          <!-- Form -->
          <!-- <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form> -->
          <!-- User -->
          <ul class="navbar-nav align-items-center d-none d-md-flex">
            <li class="nav-item">
              <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="<?php echo "../assets/avis/" . $user['pic_name'] ?>">
                  </span>
                  <div class="media-body ml-2 d-none d-lg-block">
                    <span class="mb-0 text-sm  font-weight-bold"><?php echo $user['fname'] . ' ' . $user['lname'] ?> </span>
                  </div>
                </div>
              </a>

            </li>
            <li class="nav-item">
              <form action="./auth/logout.php" method="POST">
                <button class="nav-link btn btn-danger" name="logout" type="submit">Logout</button>
              </form>
            </li>



          </ul>

      </nav>
      <!-- Header -->
      <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 600px; background-image: url(<?php echo "../assets/avis/" . $user['pic_name'] ?>); background-size: cover; background-position: center top;">
        <!-- Mask -->
        <span class="mask bg-gradient-default opacity-8"></span>
        <!-- Header container -->
        <div class="container-fluid d-flex align-items-center">
          <div class="row">
            <div class="col-lg-7 col-md-10">
              <h1 class="display-2 text-white">Hello <?php echo $user['fname'] ?></h1>
              <p class="text-white mt-0 mb-5">This is your profile page. </p>

            </div>
          </div>
        </div>
      </div>
      <!-- Page content -->
      <div class="container-fluid mt--7">
        <div class="row">
          <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
            <div class="card card-profile shadow">
              <div class="row justify-content-center">
                <div class="col-lg-3 order-lg-2">
                  <div class="card-profile-image">
                    <a href="#">
                      <img src="<?php echo "../assets/avis/" . $user['pic_name'] ?>" class="rounded-circle">
                    </a>
                  </div>
                </div>
              </div>
              <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                <div class="d-flex justify-content-between">

                  <a href="messages.php" class="btn btn-sm btn-default float-right">Messages</a>

                </div>
              </div>
              <div class="card-body pt-0 pt-md-4">
                <div class="row">
                  <div class="col">
                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                      <div>
                        <span class="heading"><?php echo $numLikes['COUNT(*)'] ?></span>
                        <span class="description">Likes</span>
                      </div>



                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <h3>
                    <?php echo $user['fname'] . " " . $user['lname'] ?><span class="font-weight-light"></span>
                  </h3>

                  <div>
                    <i class="ni education_hat mr-2"></i>Ashesi University
                  </div>
                  <hr class="my-4">


                </div>
              </div>
            </div>
          </div>
          <div class="col-xl-8 order-xl-1">
            <div class="card bg-secondary shadow">
              <div class="card-header bg-white border-0">
                <div class="row align-items-center">
                  <div class="col-8">
                    <h3 class="mb-0">My account</h3>
                  </div>

                </div>
              </div>
              <div class="card-body">

                <h6 class="heading-small text-muted mb-4">User information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-username">Username</label>
                        <input type="text" id="input-username" class="form-control form-control-alternative" placeholder="Username" value="<?php echo $user['username'] ?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                        <label class="form-control-label" for="input-email">Email Address</label>
                        <input type="email" id="input-email" class="form-control form-control-alternative" placeholder="jesse@example.com" value="<?php echo $user['email'] ?>" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-first-name">First Name</label>
                        <input type="text" id="input-first-name" class="form-control form-control-alternative" placeholder="First name" value="<?php echo $user['fname'] ?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-6">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-last-name">Last Name</label>
                        <input type="text" id="input-last-name" class="form-control form-control-alternative" placeholder="Last name" value="<?php echo $user['lname'] ?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Address -->
                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                <div class="pl-lg-4">
                  <div class="row">
                    <div class="col-md-12">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-address">Sexual Orientation</label>
                        <input id="input-address" class="form-control form-control-alternative" placeholder="Home Address" value="<?php echo $user['sex_name'] ?>" type="text" readonly>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-city">Instagram Account</label>
                        <input type="text" id="input-city" class="form-control form-control-alternative" value="<?php echo $user['insta'] ?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group focused">
                        <label class="form-control-label" for="input-country">Twitter Account</label>
                        <input type="text" id="input-country" class="form-control form-control-alternative" value="<?php echo $user['twitter'] ?>" readonly>
                      </div>
                    </div>
                    <div class="col-lg-4">
                      <div class="form-group">
                        <label class="form-control-label" for="input-country">Major</label>
                        <input type="text" id="input-postal-code" class="form-control form-control-alternative" value="<?php echo $user['course_title'] ?>" readonly>
                      </div>
                    </div>
                  </div>
                </div>
                <hr class="my-4">
                <!-- Description -->
                <?php if (!empty($interest)) { ?>
                  <h6 class="heading-small text-muted mb-4">Interests</h6>
                  <div class="pl-lg-4">
                    <div class="form-group focused">
                      <label>Interests</label>
                      <ul>
                        <?php foreach ($interest as $int) { ?>
                          <li><?php echo $int['interest_name']; ?></li>
                        <?php  } ?>
                      </ul>
                    </div>
                  </div>
                <?php } ?>

              </div>
              <a href="updateprofile.php" class="btn btn-info">Update</a>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    <footer class="footer">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-6 m-auto text-center">

        </div>
      </div>
    </footer>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/4.0.0/mdb.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/quickblox/quickblox.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="ajax-script.js"></script>

  </body>

</html>