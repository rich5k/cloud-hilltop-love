var APPLICATION_ID = 96465;
var AUTH_KEY = "zhxr4Xm88NBJvWT";
var AUTH_SECRET = "QMTwXjCHLmHDmLv";
var ACCOUNT_KEY = "SryGxD8QXQzbvy5aNpeu";
var CONFIG = { debug: {mode:1} };

QB.init(APPLICATION_ID, AUTH_KEY, AUTH_SECRET, ACCOUNT_KEY, CONFIG);
function registerUser(){
    var fname= document.getElementById("fname");
    var lname= document.getElementById("lname");
    var password= document.getElementById("password");
    var email = document.getElementById("email");
    var params = {
      login: login,
      password: password,
      full_name: fname+" "+lname,
      email: email
    };
    
    QB.users.create(params, function(error, result) {
      if (error) {
        done.fail("Create user error: " + JSON.stringify(error));
      } else {
          console.log("Created new user");
      }
    });

}

function loginUser(){
    var password= document.getElementById("password");
    var email = document.getElementById("email");
    var params = { email: email, password: password };

    QB.init(APPLICATION_ID, AUTH_KEY, AUTH_SECRET, ACCOUNT_KEY, CONFIG);

    QB.login(params, function(error, result) {
        // callback function
        if (error) {
            // done.fail("Login user error: " + JSON.stringify(error));
            console.log("Login user error");
        } else {
            console.log("Logged user in");
        }
    });
}