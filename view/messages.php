<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Messages</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/messages.css">
</head>

<body>
    <div class="row messages-page">
        <div class="contacts col-lg-4">
            <div class="profile-banner py-2 px-4">
                <img src="../images/homepic6.jpg" alt="profile-pic"> <strong>My Profile</strong>
                <span class="search-button">
                    <button><i class="fa-solid fa-magnifying-glass"></i></button>
                </span>
            </div>
            <div class="matches-page row">
                <div class="col-lg-2">
                    <button onclick="location.href = './swipe_page.php';"><i class="fa-solid fa-diamond card1"></i> <i class="fa-solid fa-diamond card2"></i></button>

                </div>
                <div class="col-lg-10">
                    <div class="caption">
                        Discover New Matches
                    </div>
                    <span class="micro-caption">
                        Start swiping to start connecting with new people
                    </span>

                </div>
            </div>
            <div class="messages px-4 py-2">
                <div class="messages-title">
                    Messages
                </div>
                <div class="message row my-4">
                    <div class="col-lg-2">
                        <img src="../images/person2.jpg" alt="match">
                    </div>
                    <div class="col-lg-10">
                        <span class="match-name">
                            Anna
                        </span>
                        <br>
                        <span class="latest-text">
                            New Match! Say Hello 👋
                        </span>
                    </div>
                </div>
                <div class="message row my-4">
                    <div class="col-lg-2">
                        <img src="../images/person3.jpg" alt="match">
                    </div>
                    <div class="col-lg-10">
                        <span class="match-name">
                            Anna
                        </span>
                        <br>
                        <span class="latest-text">
                            New Match! Say Hello 👋
                        </span>
                    </div>
                </div>
                <div class="message row my-4">
                    <div class="col-lg-2">
                        <img src="../images/person4.jpg" alt="match">
                    </div>
                    <div class="col-lg-10">
                        <span class="match-name">
                            Anna
                        </span>
                        <br>
                        <span class="latest-text">
                            New Match! Say Hello 👋
                        </span>
                    </div>
                </div>
                <div class="message row my-4">
                    <div class="col-lg-2">
                        <img src="../images/person5.jpg" alt="match">
                    </div>
                    <div class="col-lg-10">
                        <span class="match-name">
                            Anna
                        </span>
                        <br>
                        <span class="latest-text">
                            New Match! Say Hello 👋
                        </span>
                    </div>
                </div>
                <div class="message row my-4">
                    <div class="col-lg-2">
                        <img src="../images/person6.jpg" alt="match">
                    </div>
                    <div class="col-lg-10">
                        <span class="match-name">
                            Anna
                        </span>
                        <br>
                        <span class="latest-text">
                            New Match! Say Hello 👋
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="current-chat col-lg-6">
            <div class="chat-header row">
                <div class="col-lg-1">
                    <img src="../images/person1.jpg" alt="Alex's pic">
                </div>
                <div class="col-lg-10">
                    CONVERSATION WITH ALEX <br>
                    Alex Liked you on 09/12/16
                </div>
                <div class="col-lg-1">
                    <button class="close-chat"><i class="fa-solid fa-xmark"></i></button>
                </div>
            </div>
            <div class="chat-window ">
                <div class="your-text">
                    <!-- <span class="datetime">
                        Sept 12, 2016 11:11PM
                    </span> -->
                    <p class="your-chat-bubble from-me">
                        Hey, we matched!
                    </p>
                    <!-- <span class="text-status">Sent</span> -->
                </div>
                <div class="your-match-text ">
                    <p class="from-them">
                        Hey, Jess. How are you?
                    </p>
                </div>
                <form action="">
                    <input type="text" placeholder="Type a message..." required>
                    <button class="send-text" type="submit">SEND</button>
                </form>
            </div>
        </div>
        <div class="contact-info col-lg-2">
            <div class="your-match-pics">
                <img src="../images/person1.jpg" alt="Alex's pic">
            </div>
            <div class="personal-info">
                <span class="name-age p-2">Alex, 24</span>
                <span class="your-match-title">Founder at Creative Productions</span>
            </div>
            <br><br>
            <div class="your-match-bio">
                <p>
                    I'm a libra, but not sure what it means. I like
                    leftover pizza better than the fresh stuff. I love
                    to travel. I have a cat named pickles, if he likes
                    you I probably will too.
                </p>
            </div>
        </div>
    </div>
</body>

</html>