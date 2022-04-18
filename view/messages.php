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
    <link rel="stylesheet" href="../css/dashboard.css">
    <link rel="stylesheet" href="../css/dialogs.css">
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
                <!-- <div class="message row my-4">
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
                </div> -->
                <div class="sidebar j-sidebar">
                    <div class="sidebar__inner">
                        <div class="sidebar__content">
                            <ul class="sidebar__dilog_list j-sidebar__dilog_list full">
                                <li class="dialog__item j-dialog__item selected" id="625d95ba32eaaf0070ce62f2" data-name="akwele">
                                    <a class="dialog__item_link" href="#!/dialog/625d95ba32eaaf0070ce62f2">
                                        <span class="dialog__avatar m-user__img_1 m-type_chat">

                                            <i class="icons">A</i>

                                        </span>
                                        <span class="dialog__info">
                                            <span class="dialog__name">akwele</span>
                                            <span class="dialog__last_message j-dialog__last_message">anyway, I'm not your boo so stop calling me that</span>
                                        </span>
                                        <span class="dialog_additional_info">
                                            <span class="dialog__last_message_date j-dialog__last_message_date">16:47</span>
                                            <span class="dialog_unread_counter j-dialog_unread_counter hidden"></span>
                                        </span>
                                    </a>
                                </li>
                                <li class="dialog__item j-dialog__item" id="625d826a32eaaf0070ce62db" data-name="kennyblaq">
                                    <a class="dialog__item_link" href="#!/dialog/625d826a32eaaf0070ce62db">
                                        <span class="dialog__avatar m-user__img_7 m-type_chat">

                                            <i class="icons">K</i>

                                        </span>
                                        <span class="dialog__info">
                                            <span class="dialog__name">kennyblaq</span>
                                            <span class="dialog__last_message j-dialog__last_message">bro are you still there?</span>
                                        </span>
                                        <span class="dialog_additional_info">
                                            <span class="dialog__last_message_date j-dialog__last_message_date">15:27</span>
                                            <span class="dialog_unread_counter j-dialog_unread_counter hidden"></span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
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
                <div class="content__inner j-content__inner">
                    <div class="messages j-messages">
                        <div class="message__wrap">
                            <div class="message__content type_chat message__right ">
                                <div class="message__text_and_date">

                                    <div class="message__text_wrap you ">
                                        <div style="height: 1px; opacity: 0;">
                                            <p class="message__sender_name">johnedem
                                                <samp class="message__timestamp">
                                                    16:47
                                                </samp>
                                            </p>
                                        </div>
                                        <p class="message__text you">
                                            Hey, we matched!
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class="talk-bubble tri-right right-in">
                                <div class="talktext">
                                    <p class="from-them">
                                        Hey, Jess. How are you?
                                    </p>
                                </div>

                            </div>
                            <!-- <form action="">
                                <input type="text" placeholder="Type a message..." required>
                                <button class="send-text" type="submit">SEND</button>
                            </form> -->

                        </div>
                    </div>
                    <form name="send_message" class="send_message" autocomplete="off">


                        <div class="attachments_preview j-attachments_preview" style="display: none;"></div>

                        <div class="message__actions">

                            <label for="attach_btn" class="attach_btn">
                                <i class="material-icons">attachment</i>
                                <input type="file" id="attach_btn" name="attach_file" class="attach_input" accept="image/*">
                            </label>

                        </div>
                        <button class="send_btn" style="top: 10px;">
                            <img style="width: 28px;  " src="../img/Send.svg" alt="send">
                        </button>
                        <textarea name="message_feald" class="message_feald" id="message_feald" autocomplete="off" autocorrect="off" autocapitalize="off" placeholder="Send message…" autofocus=""></textarea>


                    </form>
                </div>

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
    <script src="../js/QBconfig.js" defer></script>
    <script src="../js/helpers.js" defer></script>
    <script src="../js/user.js" defer></script>
    <script src="../js/dialog.js" defer></script>
    <script src="../js/message.js" defer></script>
    <script src="../js/listeners.js" defer></script>
    <script src="../js/app.js" defer></script>
</body>

</html>