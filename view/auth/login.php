<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../../css/style_login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href=" https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js">
</head>
<body style="background-color: #1f7ce3;">
    <!-- multistep form -->
    <div class="program_container" style="display:flex;">

      <div class="form_side" style="width:65%">
        <form name="registration" id="msform" action="" method='post' style="" style="margin-left:auto margin-right:auto">
          <!-- progressbar here -->
          <fieldset>
            <h2 class="fs-title" style="color:">Sign In</h2>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="text" name="email" placeholder="Email" required />
            </div>
            
            <div class="form-group">
            <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" required />
            </div>
            
            

            <span>
              <input type="button" name="next" class="next action-button" value="Login" onclick="loginUser();">
              <p class='text'>Dont have an Account? <a href="./register.php">Sign Up here</a></p>
            </span> 
            
          </fieldset>



          <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"> </script>
        <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>
        <script src="https://unpkg.com/quickblox/quickblox.min.js"></script>
        <script src="../../js/quickblox.js"></script>
        <script src="../../js/quickblox-auth.js"></script>
        <script src="../../js/login_validation.js"></script>
        </form>

      </div>
      <div class="picture side" style="width:50% ">
        <img src="../../images/sky.jpg" alt="hill top love" style="width: 714px;
height: 730px">

      </div>

    </div>


</body>
</html>
