window.onload= function(){
    app.init(app._config);
    app.renderDashboard()
    app.loadWelcomeTpl();
    app.sidebar.classList.add('active');
    userModule.getUserIdByEmail('richard.anatsui@ashesi.edu.gh').
    then(result=>console.log("Data here: "+result.id));
    // console.log(data.id);
    // var session = QB.service.getSession();
    // var userId = session.user_id;
    // var password = session.token;
    // var params = {userId, password};
    // console.log(params);
    // QB.chat.connect(params, function(error, contactList) {});
    // app.loadChatList();
}