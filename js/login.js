'use strict';

function Login() {
    this.isLoginPageRendered = false;
    this.isLogin = false;

    this.qbConnect = function (data) {

        var
            self = this,
            timer,
            userRequiredParams = {
                'login': data.login,
                'password': data.password ? data.password : 'quickblox'
            };

        this.login = function() {
            return new Promise(function (resolve, reject) {
                QB.login(userRequiredParams, function (error, result) {
                    if (error) {
                        reject(error);
                    } else {
                        resolve(result);
                    }
                });
            });
        };

        this.userCreate = function(user) {
            return new Promise(function (resolve, reject) {
                QB.users.create(user, function (error, result) {
                    if (error) {
                        reject(error);
                    } else {
                        resolve(result);
                    }
                });
            });
        };

        this.createSession = function() {
            return new Promise(function(resolve, reject) {
                QB.createSession(function(error, result) {
                    if(error) {
                        reject(error);
                    } else {
                        resolve(result);
                    }
                });
            });
        };

        this.chatConnect = function() {
            return new Promise(function(resolve, reject) {
                QB.chat.connect({
                    jid: QB.chat.helpers.getUserJid( app.user.id, app._config.credentials.appId ),
                    password: userRequiredParams.password
                }, function(error, result) {
                    if(error) {
                        reject(error);
                    } else {
                        resolve(result)
                    }
                });
            });
        };

        

    }

}

Login.prototype.init = async function() {
    var self = this;

    var user = localStorage.getItem('user');

    if(!app.checkInternetConnection()){
        return false;
    }

    if(user && !app.user){
        var savedUser = JSON.parse(user);
        app.room = savedUser.tag_list;
        return await self.login(savedUser);
    }

    return Promise.resolve(false);

};

Login.prototype.login = async function (user) {
    var self = this;

    window.qbConnect = new self.qbConnect(user);

    var session = await window.qbConnect.createSession();

    app.token = session.token;

    try {
        var userData = await window.qbConnect.login();
    }catch (e) {
        await userModule.create(user);
        userData = await window.qbConnect.login();
    }

    if(userData.user_tags !== user.tag_list || userData.full_name !== user.full_name) {
        userData = await userModule.update(userData.id,{
            'full_name': user.full_name,
            'tag_list': user.tag_list
        });
    }
    
    app.user = userModule.addToCache(userData);
    app.user.user_tags = userData.user_tags;

    await window.qbConnect.chatConnect().then(function () {
        self.isLogin = true;
    });

    window.qbConnect.reconnecting(1800000);

    return Promise.resolve(true);

};

Login.prototype.renderLoginPage = function(){
    // helpers.clearView(app.page);

    this.isLoginPageRendered = true;
    this.setListeners();
};



Login.prototype.setListeners = function(){
    var self = this,
        loginForm = document.forms.loginForm,
        loginBtn = loginForm.signin;

    loginForm.addEventListener('submit', function(e){
        // e.preventDefault();

        
        var email = loginForm.email.value,
            password = loginForm.password.value;

        var user = {
            email: email,
            password: password
        };

        localStorage.setItem('user', JSON.stringify(user));

        self.login(user).then(function(){
            // router.navigate('/dashboard');
        }).catch(function(error){
            alert('lOGIN ERROR\n open console to get more info');
            loginBtn.removeAttribute('disabled');
            console.error(error);
            loginForm.login_submit.innerText = 'LOGIN';
        });
    });

    
};

var loginModule = new Login();

window.onload=function(){
    loginModule.renderLoginPage();
}