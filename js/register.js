'use strict';

function Register() {
    this.isRegisterPageRendered = false;
    this.isRegister = false;

    this.qbConnect = function (data) {

        var
            self = this,
            timer,
            userRequiredParams = {
                'login': data.login,
                'email': data.email,
                'password': data.password ? data.password : 'quickblox'
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
                var isLogin = await registerModule.register(savedUser);
            }catch (e) {
                app.init(app._config);
                isLogin = await registerModule.login(savedUser);
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

Register.prototype.init = async function() {
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

function userCreate(user) {
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


Register.prototype.renderRegisterPage = async function(){
    // helpers.clearView(app.page);

    // app.page.innerHTML = helpers.fillTemplate('tpl_login', {
    //     version: QB.version + ':' + QB.buildNumber
    // });
    this.isRegisterPageRendered = true;
    this.setListeners();
};


Register.prototype.setListeners = async function(){
    var self = this;
    var registerForm = document.forms.registerForm;
    var registerBtn = registerForm.register;
    
    registerForm.addEventListener('submit', async ()=>{
        // e.preventDefault();
        
        
        var email = registerForm.email.value,
        full_name= registerForm.fname.value+" "+registerForm.lname.value,
        login= registerForm.username.value,
        password = registerForm.password.value;
        
        var user = {
            email: email,
            full_name: full_name,
            login: login,
            password: password
        };
        
        window.qbConnect = new self.qbConnect(user);
    
        var session = await window.qbConnect.createSession();
    
        app.token = session.token;
        localStorage.setItem('user', JSON.stringify(user));

        userCreate(user).then(function(){
            console.log("registered user");
            // router.navigate('/dashboard');
        }).catch(function(error){
            alert('register ERROR\n open console to get more info');
            registerBtn.removeAttribute('disabled');
            console.log(error);
            // registerForm.login_submit.innerText = 'LOGIN';
        });
    });


    
};

var registerModule = new Register();
window.onload= async function(){
    registerModule.renderRegisterPage();
}