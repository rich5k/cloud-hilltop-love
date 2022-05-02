<?php

require('../controllers/UserController.php');
session_start();
$user = $_SESSION['Uid'];
if (!isset($user)) {
    header('Location: ./auth/login.php');
}






?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Messages</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/messages.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://unpkg.com/navigo@7.1.2/lib/navigo.min.js" defer></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/underscore.js/1.8.3/underscore.js" defer></script>
    <script src="../js/quickblox.min.js" defer></script>
    <script type="text/javascript">
        var logData = [];
        (function(console) {

            var log = console.log,
                error = console.error,
                warn = console.warn,
                info = console.info;

            console.log = function() {
                var args = Array.prototype.slice.call(arguments);
                log.apply(this, args);
                logData.push({
                    level: "log",
                    arguments: args
                });
            };
            console.error = function() {
                var args = Array.prototype.slice.call(arguments);
                error.apply(this, args);
                logData.push({
                    level: "error",
                    arguments: args
                });
            };
            console.warn = function() {
                var args = Array.prototype.slice.call(arguments);
                warn.apply(this, args);
                logData.push({
                    level: "warn",
                    arguments: args
                });
            };
            console.info = function() {
                var args = Array.prototype.slice.call(arguments);
                info.apply(this, args);
                logData.push({
                    level: "info",
                    arguments: args
                });
            };

            console.save = function(data, filename) {

                if (!data) {
                    console.error('Console.save: No data');
                    return;
                }

                if (!filename) filename = 'console.json';

                if (typeof data === "object") {
                    data = JSON.stringify(data, undefined, 4)
                }

                var blob = new Blob([data], {
                        type: 'text/json'
                    }),
                    e = document.createEvent('MouseEvents'),
                    a = document.createElement('a');

                a.download = filename;
                a.href = window.URL.createObjectURL(blob);
                a.dataset.downloadurl = ['text/json', a.download, a.href].join(':')
                e.initMouseEvent('click', true, false, window, 0, 0, 0, 0, 0, false, false, false, false, 0,
                    null)
                a.dispatchEvent(e)
            }

        })(console);
    </script>
</head>

<body>
    <div class="row messages-page">
        <div class="contacts col-lg-10 col-sm-12">
            <div id="user-name"></div>
            <div id="dialogName"></div>
            <div id="page">
                <div class="d-flex justify-content-center">
                    <div class="spinner-border text-primary" style="width: 8rem; height: 8rem;margin: 17% 0;" role="status">
                        <span class="sr-only">Loading...</span>
                    </div>
                </div>
            </div>
            <!-- Modal -->
            <div id="substrate">
                <!--<img class="close" src="./img/close.png" alt="close">-->
            </div>
            <div class="modal"></div>
        </div>
        <div class="contact-info col-lg-2 col-sm-12">
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

    <!-- script to handle when the user has not selected any chat yet -->
    <script type="text/template" id="tpl_welcome">
        <div class="content__inner j-content__inner welcome">
                            <div class="welcome__message">
                                <p>Please select a chat to start messaging</p>
                            </div>
                        </div>
                    </script>
    <!-- script to handle the chat window -->
    <script type="text/template" id="tpl_conversationContainer">
        <div class="content__title j-content__title j-dialog none">
                            <!--<button class="open_sidebar j-open_sidebar"></button>-->
                            <h1 class="dialog__title j-dialog__title" style="display:none;"><%- title %></h1>
                            <div class="action_links">
                                <a href="#!/dialog/<%- _id %>/edit"
                                class="add_to_dialog j-add_to_dialog <% type !== 2 ? print('hidden') : ''%>">
                                    <i class="material-icons">person_add</i>
                                </a>
                                <a href="#" class="quit_fom_dialog_link j-quit_fom_dialog_link <% type === 1 ? print('hidden') : ''%>"
                                data-dialog="<%- _id %>">
                                    <i class="icons">delete</i>
                                </a>
                            </div>
                        </div>
                        <div class="notifications j-notifications hidden"></div>
                        <div class="content__inner j-content__inner">
                            <div class=" messages j-messages"></div>
                            <form name="send_message" class="send_message" autocomplete="off">


                                <div class="attachments_preview j-attachments_preview"></div>

                                <div class="message__actions">

                                    <label for="attach_btn" class="attach_btn">
                                        <i class="material-icons">attachment</i>
                                        <input type="file" id="attach_btn" name="attach_file" class="attach_input" accept="image/*"/>
                                    </label>

                                </div>
                                <button class="send_btn">
                                    <img  style="width: 28px;  " src="../img/Send.svg" alt="send">
                                </button>
                                <textarea name="message_feald" class="message_feald" id="message_feald" autocomplete="off"
                                        autocorrect="off" autocapitalize="off" placeholder="Send message…" autofocus></textarea>


                            </form>
                        </div>
                    </script>
    <!-- script to handle message content -->
    <script type="text/template" id="tpl_editChatUser">
        <div class="user__item <% selected ? print('disabled selected') : ''%>" id="<%= id %>">
                                <span class="user__avatar m-user__img_<%= color %>">
                                    <i class="material-icons m-user_icon">account_circle</i>
                                </span>
                            <div class="user__details">
                                <p class="user__name"><%= name %></p>
                                <% if (last_request_at) { %>
                                <p class="user__last_seen"><%= last_request_at %></p>
                                <% } %>
                            </div>
                        </div>
                    </script>

    <script type="text/template" id="tpl_date_message">
        <div class="message__wrap" id="<%=month+'-'+date.getDate()%>">
                            <div class="dialog_date_message">
                                <%= groupDate %>
                            </div>
                        </div>
                    </script>
    <script type="text/template" id="tpl_message">
        <div class="message__wrap" id="<%= message.id %>" data-status="<%= message.status %>">
                            <% if (window.app.user.id !== sender.id && dialogType !== 3) { %>
                            <span class="message__avatar m-user__img_<%= sender ? sender.color : 'not_loaded' %>">
                                    <i class="icons"><%- sender.name[0].toUpperCase() %></i>
                                </span>
                            <% } %>
                            <div class="message__content <%= dialogType === 3 ? 'type_chat' : '' %>
                            <%= window.app.user.id === sender.id ? 'message__right' : '' %> ">
                                <div class="message__sender_and_status">
                                    <p class="message__sender_name">
                                        <%- sender ? (window.app.user.id !== sender.id ? sender.name: 'You') : 'unknown user (' + message.sender_id + ')' %>
                                    </p>

                                    <% var img = "./img/sent.svg"; %>
                                    <% if (message.status) { img = "../img/"+message.status+".svg"; } %>

                                    <% if (window.app.user.id == sender.id) { %>
                                    <img style="margin-right: 6px" class="message__status j-message__status" src="<%= img %>">
                                    <% } %>

                                    <div class="message__timestamp">
                                        <%= message.date_sent %>
                                    </div>
                                </div>
                                <div class="message__text_and_date">
                                    <div class="message__text_wrap <%= window.app.user.id === sender.id ? 'you' : '' %> ">
                                        <div style="height: 1px; opacity: 0;">
                                            <p class="message__sender_name"><%- sender ? sender.name : 'unknown user (' + message.sender_id + ')'
                                                %>
                                                <samp class="message__timestamp">
                                                    <%= message.date_sent %>
                                                </samp>
                                            </p>
                                        </div>

                                        <% if (message.origin_sender_name) { %>
                                            <div class="forwarded">Forwarded from <%= message.origin_sender_name %></div>
                                        <% } %>

                                        <% if (message.message) { %>
                                            <p class="message__text <%= window.app.user.id === sender.id ? 'you' : '' %>"><%= message.message %></p>
                                        <% } %>

                                        <% if (message.attachments.length) { %>
                                            <div class="message__attachments_wtap">
                                                <% _.each(message.attachments, function(attachment){ %>
                                                <img loading="lazy" src="../img/image.svg" data-src="<%= attachment.src %>" data-id="<%= attachment.id %>" alt="attachment" class="message_attachment">
                                                <% }); %>
                                            </div>
                                        <% } %>
                                    </div>
                                    <ul class="message-menu" data-message-id="<%= message.id %>">
                                        <li>Forward</li>
                                        <% if (window.app.user.id === sender.id) { %>
                                            <li>Delivered to…</li>
                                            <li>Viewed by…</li>
                                        <% } %>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </script>
    <!-- script to handle to notify a user when the other is typing -->
    <script type="text/template" id="tpl_message__typing">
        <div class="message__wrap m-typing j-istyping" id="is__typing">
                            <%- users %> typing
                            <% if (users.length){ %>
                            <div id="fountainG">
                                <div id="fountainG_1" class="fountainG"></div>
                                <div id="fountainG_2" class="fountainG"></div>
                                <div id="fountainG_3" class="fountainG"></div>
                            </div>
                            <% } %>

                        </div>
                    </script>
    <!-- script to handle attachment preview and cancellation -->
    <script type="text/template" id="tpl_attachmentPreview">
        <div class="attachment_preview__wrap m-loading" id="<%= id %>">
                            <img class="img-close" src="../img/Close.svg" width="24px" height="24px" >
                            <img class="attachment_preview__item" src="<%= src %>">
                        </div>
                    </script>
    <!-- script for attachment error -->
    <script type="text/template" id="tpl_attachmentLoadError">
        <p class="attachment__error">Can't load attachment...</p>
                    </script>
    <!-- script for pending network -->
    <script type="text/template" id="tpl_lost_connection">
        <div class="titile">Waiting for network.</div>
                        <div class="spinner"><img src="../img/loader2.gif" alt="wating"></div>
                    </script>
    <!-- script for loading data notification -->
    <script type="text/template" id="tpl_loading">
        <div class="loading__wrapper">
                            <div class="loading_inner">
                                <img class="loading__logo" src="../img/qb-logo.svg" alt="QB_logo">
                                <p class="loading__description">Loading...</p>
                            </div>
                        </div>
                    </script>
    <!-- script for delivered message dialog -->
    <script type="text/template" id="tpl_delivered">
        <div style="width: 100%;" class="modal__inner sidebar__inner">
                            <div class="content__title j-content__title j-create_dialog">

                                <div class="back_to_dashboard back_to_dialog j-back_to_dialog" ><i class="material-icons">arrow_back</i></div>


                                <div>
                                    <h1 class="group_chat__title">Message delivered to</h1>
                                    <h5 class="active" ><%- message.delivered_ids.length %> member<% message.delivered_ids.length == 1 ? "" : print("s") %></h5>
                                </div>
                            </div>
                            <div class="notifications j-notifications hidden"></div>
                            <div class="content__inner j-content__inner delivered">
                                <div class="update_chat__user_list j-occupants_chat__user_list active">
                                </div>
                            </div>
                        </div>
                    </script>
    <!-- script for read message dialog -->
    <script type="text/template" id="tpl_viewed">
        <div style="width: 100%;" class="modal__inner sidebar__inner">
                            <div class="content__title j-content__title j-create_dialog">

                                <div class="back_to_dashboard back_to_dialog j-back_to_dialog" ><i class="material-icons">arrow_back</i></div>

                                <div>
                                    <h1 class="group_chat__title">Message viewed by</h1>
                                    <h5 class="active" ><%- message.read_ids.length %> member<% message.read_ids.length == 1 ? "" : print("s") %></h5>
                                </div>
                            </div>
                            <div class="notifications j-notifications hidden"></div>
                            <div class="content__inner j-content__inner delivered">
                                <div class="update_chat__user_list j-occupants_chat__user_list active">
                                </div>
                            </div>
                        </div>
                    </script>
    <!-- script for forwarding messages dialog -->
    <script type="text/template" id="tpl_forward">
        <div style="width: 100%;" class="modal__inner sidebar__inner">
                            <div class="content__title j-content__title j-forward_dialog">

                                <div class="back_to_dashboard back_to_dialog j-back_to_dialog" style="
                                    margin-top: 18px;
                                ">
                                    <i class="material-icons">arrow_back</i>
                                </div>

                                <h1 class="group_chat__title" style="margin-top: 19px;">Forward to</h1>

                                <form action="" name="forward_dialog" class="dialog_form m-dialog_form_create active">
                                    <button style="padding: 0; margin: 17px 16px 0 0;" class="btn m-create_dialog_btn j-forward_dialog_btn" type="submit" name="create_dialog_submit"
                                            disabled>Send
                                    </button>
                                </form>

                            </div>
                            <div class="notifications j-notifications hidden"></div>
                            <div class="content__inner j-content__inner">
                                <div class="update_chat__user_list j-group_chat__dialog_list active">
                                </div>
                            </div>
                        </div>
                    </script>
    <!-- script for image preview -->
    <script type="text/template" id="tpl_imgPreview">
        <div class="id_preview" style="color: #fff; text-align: center;" ><%= id %></div>
                        <div class="img_preview" style="display: grid; padding-top: 16px;">
                            <img onload="window.modal.watch();" src="<%= src %>" style="margin: 0 auto;" >
                        </div>
                        <div style="display: grid; padding-top: 24px;">
                            <div class="download" href="#" download="<%= id %>" target="_blank" style="margin: 0 auto; color: #fff;" >
                                <img src="../img/Download.svg" style="padding-right: 8px;">
                                <div style="float: right; line-height: 29px;">Download</div>
                            </div>
                        </div>
                    </script>
    <script type="text/template" id="tpl_dashboardContainer">
        <div class="dashboard">
                        <div class="sidebar j-sidebar active">
                            <div class="sidebar__inner">
                                <div class="sidebar__content">
                                    <ul class="sidebar__dilog_list j-sidebar__dilog_list">
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="content j-content">
                        </div>
                    </div>
                </script>
    <script type="text/template" id="tpl_userConversations">
        <li class="dialog__item j-dialog__item" id="<%= dialog._id %>" data-name="<%- dialog.name %>">
                        <a class="dialog__item_link" href="#!/dialog/<%= dialog._id %>">
                            <span class="dialog__avatar m-user__img_<%= dialog.color %> m-type_<%= dialog.type === 2 ? 'group' : 'chat' %>">
                                <% if(dialog.type === 2) { %>
                                    <i class="icons"><%- name.toUpperCase() %></i>
                                <% } else { %>
                                    <i class="icons"><%- name.toUpperCase() %></i>
                                <% } %>
                            </span>
                            <span class="dialog__info">
                                <span class="dialog__name"><%- dialog.name %></span>
                                <span class="dialog__last_message j-dialog__last_message <%= dialog.attachment ? 'attachment' : ''%>"><%- dialog.last_message%></span>
                            </span>
                            <span class="dialog_additional_info">
                                <span class="dialog__last_message_date j-dialog__last_message_date">
                                    <%= helpers.getDialogLastMessageTime(dialog.last_message_date_sent) %>
                                </span>
                                <span class="dialog_unread_counter j-dialog_unread_counter <% !dialog.unread_messages_count ? print('hidden') : '' %>">
                                    <% dialog.unread_messages_count ? print(dialog.unread_messages_count) : '' %>
                                </span>
                            </span>
                        </a>
                    </li>
                </script>

    <script type="text/template" id="tpl_dialogItem">
        <div class="user__item <% user.selected ? print('disabled selected') : ''%>" id="<%= user._id %>">
                            <span class="user__avatar m-user__img_<%= user.color %>">
                                <i class="icons m-user_icon"><%- (user.name !== null) ? user.name[0].toUpperCase() : '' %></i>
                            </span>
                        <div class="user__details">
                            <span class="dialog__info">
                                <span class="dialog__name" style="<% user.isLastMessage ? print('margin-bottom: 4px; margin-top: 2px;') : print('margin-bottom: 0px; margin-top: 0px; line-height: 40px;')%>"><%- user.name %></span>

                                <% if(user.isLastMessage){ %>
                                <span class="dialog__last_message j-dialog__last_message <%= user.attachment ? 'attachment' : ''%>"><%- user.last_message%></span>
                                <% } %>

                            </span>

                            <label class="container">

                                <% if (user.selected) { %>
                                <input onclick="return false;"  type="checkbox" checked="checked" >
                                <% }else {  %>
                                <input onclick="return false;"  type="checkbox" >
                                <% } %>

                                <span class="checkmark"></span>
                                <div onclick="return false;"  style="
                                    position: absolute;
                                    width: 27px;
                                    height: 27px;
                                    opacity: 0.1;
                                    background-color: #f5f8f8;
                                    left: 0;
                                    z-index: 10;
                                "></div>
                            </label>
                        </div>
                    </div>
                </script>
    <script src="../js/QBconfig.js" defer></script>
    <script src="../js/app.js" defer></script>
    <script src="../js/dashboard.js" defer></script>
    <script src="../js/helpers.js" defer></script>
    <script src="../js/user.js" defer></script>
    <script src="../js/login.js" defer></script>
    <script src="../js/dialog.js" defer></script>
    <script src="../js/message.js" defer></script>
    <script src="../js/listeners.js" defer></script>
    <script src="../js/modal.js" defer></script>
    <script src="../js/router.js" defer></script>
    <script src="../js/bootstrap.min.js"></script>
</body>

</html>