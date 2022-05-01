window.onload= async function(){
    app.init(app._config);
    app.renderDashboard()
    app.loadWelcomeTpl();
    app.sidebar.classList.add('active');
    var user=localStorage.getItem('user');
    var savedUser = JSON.parse(user);
    await loginModule.login(savedUser);
    // var match_id=await userModule.getUserIdByEmail('papakofi275@gmail.com').
    // then(result=> {return parseInt(result.id)});
    // console.log("Match's ID: "+match_id);
    // dialogModule.createDialog(match_id);
    // console.log(data.id);
    // var session = QB.service.getSession();
    // var userId = session.user_id;
    // var password = session.token;
    // var params = {userId, password};
    // console.log(params);
    // QB.chat.connect(params, function(error, contactList) {});
    // app.loadChatList();
}