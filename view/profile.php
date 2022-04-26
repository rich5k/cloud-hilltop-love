<?php

session_start();
require('../controllers/UserController.php');

$user = get_user_controller($_SESSION['Uid']);
if(!isset($user)){
    header('Location: /auth/login.php');
    exit;
}
$interests = get_interest_controller();


$pImage = $user['pic_name'];
// echo $pImage;
$imageUrl = "../assets/avis/" . $pImage;


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Profile</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css' rel="stylesheet">
    <link rel="stylesheet" href="../css/profile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/swipe_page.css">
</head>

<body>
    <style>
        select {
            padding: 15px;
            border: 1px solid #ccc;
            border-radius: 3px;
            margin-bottom: 10px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 13px;
        }


        .select::after {
            content: "";
            width: 0.8em;
            height: 0.5em;
            background-color: var(--select-arrow);
            clip-path: polygon(100% 0%, 0 0%, 50% 100%);
            justify-self: end;
        }
    </style>
    <div class="top-buttons">
        <button id="profile" onclick="location.href = './profile.php';"><i class="fa-solid fa-user"></i></button>
        <button id="message" onclick="location.href = './messages.php';"><i class="fa-solid fa-message"></i></button>
        <form action="./auth/logout.php" method="post">
            <input type="submit" class="btn" value="Logout" name="logout">
        </form>
    </div>
    <div class="userProfile">

        <div class="pic_session">
            <div class="avatar">
                <img alt="" src=<?php echo $imageUrl; ?>>
            </div>

        </div>



        <div class="row">
            <div class="col-lg-3" id="user_card">

                <div class="card hovercard">

                    
                        <div class="info">
                            <div class="title">
                                <a target="_blank"><?php echo $user['username'] ?></a>
                            </div>
                            <div class="desc">
                                <?php echo $user['fname'] ?>
                            </div>
                            <div class="desc">
                                <?php echo $user['lname'] ?>
                            </div>
                            
                            <div class="desc">
                                <?php echo $user['course_name'] ?> 
                            </div>
                            <?php foreach($interests as $interest){
                                echo "<input type='checkbox' id='' >
                                      <label for=''>".$interest['interest_name']."</label><br>";
                            }
                            

                            ?>
                            
                            
                        </div>
                        

                        <div class="bottom">
                            <a class="btn btn-primary btn-twitter btn-sm" href="https://twitter.com/webmaniac">
                                <i class="fa fa-twitter"></i>
                            </a>
                            <a class="btn btn-danger btn-sm" rel="publisher" href="https://plus.google.com/+ahmshahnuralam">
                                <i class="fa fa-google-plus"></i>
                            </a>
                            <a class="btn btn-primary btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
                                <i class="fa fa-facebook"></i>
                            </a>
                            <a class="btn btn-warning btn-sm" rel="publisher" href="https://plus.google.com/shahnuralam">
                                <i class="fa fa-behance"></i>
                            </a>
                        </div>
                        
                    
                </div>
                <div class="container-box rotated">
                            <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Update</button>
                        </div>
                <!-- Button trigger modal -->


            <!-- Modal -->
            <div id="myModal" class="modal fade" role="dialog">
                <div class="modal-dialog">

                <!-- Modal content-->
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">×</button>
                        <h4 class="modal-title">Update Profile</h4>
                    </div>
                    <div class="modal-body">
                    <form action="" method="post">

                        <input type="text" id="fname" name="fname" placeholder="First Name" required />

                        <input type="text" id="lname" name="lname" placeholder="Last Name" required />

                        <input type="email" id="email" name="email" placeholder="Email" required />

                        <input type="text" id="phone" name="phone" placeholder="Phone" required />

                        <input type="text" id="username" name="username" placeholder="Username" required>

                        <div class="select" style="width:200px">
                            <label for="sexual_orient"> Sexual Orientation</label>
                            <select name="sexual_orientation" id="sexual_orient" required>
                                <option value="1">Hecterosexual</option>
                                <option value="2">Bisexual</option>
                                <option value="3">Homosexual</option>
                                <option value="4">Pansexual</option>
                            </select>
                        </div>
                        <div class='form-group'>
                            <label for="twitter">Twiter handle</label>
                            <input type="text" id="twitter" name="twitter" placeholder="Twitter" />
                        </div>

                        <div class='form-group'>
                            <label for="facebook">Instagram handle</label>
                            <input type="text" id="instagram" name="instagram" placeholder="Instagram" />
                        </div>

                        <div id="pictures_here">
                            <label for="filefield">Pictures</label>
                            <input type="file" name="file" id='filefield' multiple="multiple" onchange="preview_image()">
                            <div id="image_preview" style="display:flex;"></div>
                        </div>

                        
                       
                        
                    </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
            </div>
                
            </div>

        </div>




    </div>

    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://unpkg.com/quickblox/quickblox.min.js"></script>

    <script>
$(function()
{
    function after_form_submitted(data)
    {
        if(data.result == 'success')
        {
            $('form#reused_form').hide();
            $('#success_message').show();
            $('#error_message').hide();
        }
        else
        {
            $('#error_message').append('<ul></ul>');

            jQuery.each(data.errors,function(key,val)
            {
                $('#error_message ul').append('<li>'+key+':'+val+'</li>');
            });
            $('#success_message').hide();
            $('#error_message').show();

            //reverse the response on the button
            $('button[type="button"]', $form).each(function()
            {
                $btn = $(this);
                label = $btn.prop('orig_label');
                if(label)
                {
                    $btn.prop('type','submit' );
                    $btn.text(label);
                    $btn.prop('orig_label','');
                }
            });

        }//else
    }

	$('#reused_form').submit(function(e)
      {
        e.preventDefault();

        $form = $(this);
        //show some response on the button
        $('button[type="submit"]', $form).each(function()
        {
            $btn = $(this);
            $btn.prop('type','button' );
            $btn.prop('orig_label',$btn.text());
            $btn.text('Sending ...');
        });


                    $.ajax({
                type: "POST",
                url: 'handler.php',
                data: $form.serialize(),
                success: after_form_submitted,
                dataType: 'json'
            });

      });
});
</script>
</body>

</html>