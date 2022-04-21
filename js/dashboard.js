window.onload= function(){
    app.init(app._config);
    app.renderDashboard()
    app.loadWelcomeTpl();
    app.sidebar.classList.add('active');
    // app.loadChatList();
}