<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../../css/style_signUP.css">

</head>
<body>
    <!-- multistep form -->
    <div class="program_container" style="display:flex;">

      <div class="form_side" style="width:65%">
        <form name="registration" id="msform" action="../../controllers/call_registerUser.php" method='post' style="">
          <!-- progressbar -->
          <ul id="progressbar">
            <li class="active">Account Setup</li>
            <li>Personal Details</li>
            <li>Social Profiles</li>
          </ul>
          <!-- fieldsets -->
          <fieldset>
            <h2 class="fs-title">Sign UP</h2>
            <label for="email" style="text-align:left">Email</label>
            <input type="text" id="email" name="email" placeholder="Email" required />
              <h5 id="cemailcheck" style="color: red;" hidden>
                  **email should be like the ashesi email
              </h5>
              <label for="password">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" required />
            <h5 id="passcheck" style="color: red;" hidden>
              **Please Fill the password
            </h5>
            <label for="cpass">Confirm Password</label>
            <input type="password"  name="cpass" id="cpass" placeholder="Confirm Password" required />
            <h5 id="cpasscheck" style="color: red;" hidden>
                **Password didn't match
            </h5>
            <input type="button" name="next" class="next action-button" value="Next" />
          </fieldset>



          <fieldset>
            <h2 class="fs-title">Personal Details</h2>
            <label for="fname">Firstname</label>
            <input type="text" id="fname" name="fname" placeholder="First Name" required />
              <label for="lname">Lastname</label>
            <input type="text" id="lname" name="lname" placeholder="Last Name" required />
            <label for="phone">phone number</label>
            <input type="text" id="phone" name="phone" placeholder="Phone" required />
            <label for="dob">Date of  Birth</label>
            <input type="date" id="dob" name="dob" placeholder="Date of Birth" required />
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder = "Username" required>

            <div class="select" style="width:200px">
              <label for="gender">Gender</label>
              <select name="gender" id="gender" required>
                <option value="1">Male</option>
                <option value="2">Female</option>
              </select>
            </div>

            <div class="select" style="width:200px">
              <label for="sexual_orient"> Sexual Orientation</label>
              <select name="sexual_orient" id="sexual_orient" required>
                <option value="1">Hecterosexual</option>
                <option value="2">Bisexual</option>
                <option value="3">Homosexual</option>
                <option value="4">Pansexual</option>
                <option value="5">Pansexual</option>
              </select>
            </div>


            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" class="next action-button" value="Next" />
          </fieldset>

          <fieldset>
            <h2 class="fs-title">Social Profiles</h2>
            <label for="twitter">Twiter handle</label>
            <input type="text" id="twitter" name="twitter" placeholder="Twitter" />
            <label for="facebook">Intagram handle</label>
            <input type="text" id="facebook" name="facebook" placeholder="Instagram" />

            <div id="pictures_here">
              <label for="filefield">Pictures</label>
              <input type="file" name="filefield" multiple="multiple">
            </div>


            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="submit" name="submit" class="submit action-button" value="Submit"  onclick="validate1stInputs()"/>
          </fieldset>


          <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"> </script>
        <script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>

          <script src='../../js/script.js'>
          </script>
        </form>

      </div>
      <div class="picture side" style="width:35% ">
        <img src="../../images/forall_pic.jpg" alt="hill top love" style="width: 568px;
height: 100%;">

      </div>

    </div>


</body>
</html>
