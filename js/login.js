'use strict';

function Login() {
    this.isLoginPageRendered = false;
    this.isLogin = false;

    this.qbConnect = function (data) {

        var
            self = this,
            timer,
            userRequiredParams = {
                'email': data.email,
                'password': data.password 
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

        this.connect = async function () {
            self.stopReconnecting();
            app.user = null;
            /*app.init(app._config);*/

            var user = localStorage.getItem('user');

            var savedUser = JSON.parse(user);
            app.room = savedUser.tag_list;

            try {
                var isLogin = await loginModule.login(savedUser);
            }catch (e) {
                app.init(app._config);
                isLogin = await loginModule.login(savedUser);
            }

            listeners.setListeners();

            if(!isLogin) {
                router.navigate('/login');
            }

            return Promise.resolve();

        };

        this.reconnecting = function(interval) {
            timer = setInterval(this.connect, interval);
        };

        this.stopReconnecting = function() {
            clearInterval(timer);
        }
        

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
        alert('user account does not exist')
        var currentUrl= window.location.href;
        //if currently on messages page
        if('messages'==currentUrl.substring(currentUrl.length - 8, currentUrl.length)){
            window.location.replace("./auth/register.php");
        }else{
            window.location.replace("../view/auth/register.php");

        }
    }

    // if(userData.user_tags !== user.tag_list || userData.full_name !== user.full_name) {
    //     userData = await userModule.update(userData.id,{
    //         'full_name': user.full_name,
    //         'tag_list': user.tag_list
    //     });
    // }
    
    app.user = userModule.addToCache(userData);
    // app.user.user_tags = userData.user_tags;

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



Login.prototype.setListeners = async function(email,password){
    var self = this;
        // loginForm = document.forms.loginForm,
        // loginBtn = loginForm.signin;

        var user = {
            email: email,
            password: password
        };
        localStorage.setItem('user', JSON.stringify(user));

        window.qbConnect = new self.qbConnect(user);
    
        var session = await window.qbConnect.createSession();
    
        app.token = session.token;

        
        self.login(user).then(function(){
            console.log('logged in user');
            router.navigate('/dashboard');
            
        }).catch(function(error){
            if(!loginModule.isLogin){
                alert('lOGIN ERROR\n open console to get more info');
                console.log(error);

            }
            
        });
   

    
};

Login.prototype.primarySetListeners = async function(email,password){
    var self = this;
        // loginForm = document.forms.loginForm,
        // loginBtn = loginForm.signin;

        var user = {
            email: email,
            password: password
        };
        localStorage.setItem('user', JSON.stringify(user));

        window.qbConnect = new self.qbConnect(user);
    
        var session = await window.qbConnect.createSession();
    
        app.token = session.token;


        self.login(user).then(function(){
            console.log('logged in user');
            
            window.location.replace("../view/swipe_page.php");
            
        }).catch(function(error){
            alert('lOGIN ERROR\n open console to get more info');
            console.log(error);
            
        });
   

    
};

var loginModule = new Login();

