<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="style.css">
    
</head>
<body>
    <!-- multistep form -->
<form name="registration" id="msform" action="" method='post'>
  <!-- progressbar -->
  <ul id="progressbar">
    <li class="active">Account Setup</li>
    <li>Social Profiles</li>
    <li>Personal Details</li>
  </ul>
  <!-- fieldsets -->
  <fieldset>
    <h2 class="fs-title">Create your account</h2>
    
    <input type="text" name="email" placeholder="Email" required />
    <input type="password" name="password" id="password" placeholder="Password" required />
    <h5 id="passcheck" style="color: red;">
      **Please Fill the password
    </h5>
    <input type="password" name="cpass" id="cpass" placeholder="Confirm Password" required />
    <h5 id="cpasscheck" style="color: red;">
        **Password didn't match
    </h5>
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>

  <fieldset>
    <h2 class="fs-title">Social Profiles</h2>
    <input type="text" name="twitter" placeholder="Twitter" />
    <input type="text" name="facebook" placeholder="Instagram" />
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="button" name="next" class="next action-button" value="Next" />
  </fieldset>

  <fieldset>
    <h2 class="fs-title">Personal Details</h2>
    <input type="text" name="fname" placeholder="First Name" required />
    <input type="text" name="lname" placeholder="Last Name" required />
    <input type="text" name="phone" placeholder="Phone" required />
    <input type="number" name="age" placeholder="Age" required />
    <input type="text" name="username" placeholder = "Username" required>

    <div class="select" style="width:200px">
      <select name="gender" id="gender" required>
        <option value="1">Male</option>
        <option value="2">Female</option>
      </select>
    </div>
    
    
    <input type="button" name="previous" class="previous action-button" value="Previous" />
    <input type="submit" name="submit" class="submit action-button" value="Submit" />
  </fieldset>


  <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"> </script> 
<script src="vendor/jquery-validation/dist/jquery.validate.min.js"></script>

  <script src='script.js'>
  </script>
</form>
</body>
</html>

