<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../../css/style_signUP.css">
    <link rel="stylesheet" href="../../css/parsley.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/parsley.js/2.9.2/parsley.min.js" integrity="sha512-eyHL1atYNycXNXZMDndxrDhNAegH2BDWt1TmkXJPoGf1WLlNYt08CSjkqF5lnCRmdm3IrkHid8s2jOUY4NIZVQ==" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../../css/style_signUP.css">
  <link rel="stylesheet" href="yearpicker.css">
  <script src="/path/to/cdn/jquery.slim.min.js"></script>
  <script src="yearpicker.js" async></script>


</head>
<body style="background-color: #0f73d9;">
    <!-- multistep form -->
    <div class="program_container" style="display:flex;">

      <div class="form_side" style="width:65%">
        <form name="registration" id="msform" action="../../action/authprocess.php" method='post' >
          <!-- progressbar -->
          <ul id="progressbar">
            <li class="active">Account Setup</li>
            <li>Personal Details</li>
            <li>Social Profiles</li>
          </ul>
          <!-- fieldsets -->
          <fieldset id='userdetails' class='fieldset'>
            <h2 class="fs-title">Sign UP</h2>
            <div class='form-group'>
              <label for="email" >Email</label>
              <input type="email" id="email" name="email" placeholder="Email" required/>
            
            </div>
            
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" name="password" id="password" placeholder="Password" required />
            
            </div>
            
            <div class="form-group">
              <label for="cpass">Confirm Password</label>
              <input type="password"  name="cpass" id="cpass" placeholder="Confirm Password"  required/>
            
            </div>
            
            <input type="button" name="next" id="next" class="next action-button" value="Next" />
          </fieldset>



          <fieldset id='personal_details' class='fieldset'>
            <h2 class="fs-title">Personal Details</h2>
            <div class="form-group">
              <label for="fname">Firstname</label>
              <input type="text" id="fname" name="fname" placeholder="First Name" required />
            </div>
            
              

            <div class="form-group">
              <label for="lname">Lastname</label>
              <input type="text" id="lname" name="lname" placeholder="Last Name" required />
            </div>

            
            <div class="form-group">
              <label for="phone">phone number</label>
              <input type="text" id="phone" name="phone" placeholder="Phone" required />
            </div>

            
            <div class="form-group">
              <label for="dob">Date of  Birth</label>
              <input type="date" id="dob" name="dob" placeholder="Date of Birth" required />
            </div>
           
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" id="username" name="username" placeholder = "Username" required>
            </div>

            

            <div class='form-greoup'>
              <div class="select" style="width:200px">
                <label for="gender">Gender</label>
                <select name="gender" id="gender" required>
                  <option value="1">Male</option>
                  <option value="2">Female</option>
                </select>
              </div>
            </div>
            
            <div class='form-group'>
              <div class="select" style="width:200px">
                <label for="sexual_orient"> Sexual Orientation</label>
                <select name="sexual_orient" id="sexual_orient" required>
                  <option value="1">Hecterosexual</option>
                  <option value="2">Bisexual</option>
                  <option value="3">Homosexual</option>
                  <option value="4">Pansexual</option>
                </select>
              </div>
            </div>
            


            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="button" name="next" id="next" class="next action-button" value="Next" />
          </fieldset>

          <fieldset id='social_details' class='fieldset'>
            <h2 class="fs-title">Social Profiles</h2>
            <div class='form-group'>
              <label for="class">Year Group</label>
              <input type="text" id="class" name="class" placeholder="year group" />
            </div>

            <div class='form-group'>
              <label for="major">Offering Major</label>
              <input type="text" id="major" name="major" placeholder="major" />
            </div>
            <div class='form-group'>
              <label for="twitter">Twiter handle</label>
              <input type="text" id="twitter" name="twitter" placeholder="Twitter" />
            </div>
            
            <div class='form-group'>
              <label for="facebook">Instagram handle</label>
              <input type="text" id="facebook" name="facebook" placeholder="Instagram" />
            </div>

            <div class='form-group'>
              <div id="pictures_here">
                <label for="filefield">Pictures</label>
                <input type="file" name="filefield" id='filefield' multiple="multiple" onchange="preview_image()">
                <div id="image_preview" style="display:flex;"></div>
              </div>
            </div>
            
            
            


            <input type="button" name="previous" class="previous action-button" value="Previous" />
            <input type="submit" name="register" class="submit action-button" value="Submit"  onclick="registerUser();"/>
          </fieldset>


          <script src="http://code.jquery.com/jquery-3.4.1.min.js"></script>
          <!--<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>-->
        

<body>
  <!-- multistep form -->
  <div class="program_container" style="display:flex;">

    <div class="form_side" style="width:65%">
      <form name="registration" id="msform" action="../../action/authprocess.php" method='post' enctype="multipart/form-data">
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
          <input type="password" name="cpass" id="cpass" placeholder="Confirm Password" required />
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
          <label for="dob">Date of Birth</label>
          <input type="date" id="dob" name="dob" placeholder="Date of Birth" required />
          <label for="username">Username</label>
          <input type="text" id="username" name="username" placeholder="Username" required>

          <div class="select" style="width:200px">
            <label for="gender">Gender</label>
            <select name="gender" id="gender" required>
              <option value="f">Male</option>
              <option value="m">Female</option>
            </select>
          </div>
          
          <!-- <div class="select" style="width: 200px;">
            <label for="">Class</label>
            <select name="class" id="class" required>
              <option value="2022">2022</option>
              <option value="2023">2023</option>
              <option value="2024">2024</option>
              <option value="2025">2025</option>
            </select>
          </div>   -->

          <div class="select" style="width:200px">
            <label for="sexual_orient"> Sexual Orientation</label>
            <select name="sexual_orientation" id="sexual_orient" required>
              <option value="1">Heterosexual</option>
              <option value="2">Bisexual</option>
              <option value="3">Homosexual</option>
              <option value="4">Pansexual</option>
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
          <input type="text" id="facebook" name="instagram" placeholder="Instagram" />

          <div id="pictures_here">
            <label for="filefield">Pictures</label>
            <input type="file" name="filefield" multiple="multiple">
          </div>


          <input type="button" name="previous" class="previous action-button" value="Previous" />
          <input type="submit" name="register" class="submit action-button" value="register" onclick="registerUser();" />
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
    <script src="http://code.jquery.com/ui/1.12.1/jquery-ui.min.js"> </script>
        
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
        <script src='../../js/script.js'></script>
        <script src="https://unpkg.com/quickblox/quickblox.min.js"></script>
        <script src="../../js/quickblox.js"></script>
        <script src="../../js/quickblox-auth.js"></script>

  </div>

</body>

</html>