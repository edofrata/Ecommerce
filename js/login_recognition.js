
//Check to see if user is logged in already

function checkLogin() {
    if (sessionStorage.logged_in_user !== undefined) {
        //Extract details of logged in user
        let user = JSON.parse(localStorage[sessionStorage.logged_in_user]);

        //Say hello to logged in user
        document.getElementById("logged_check").innerHTML = user_login.email + " logged in.";
    }
}

// Tracking the user
let cookies = document.cookie;


function login_real() {

    validated = false;
    // document.getElementById("login_password").style.backgroundColor = "#FFFFFF";
    // document.getElementById("login_username").style.backgroundColor = "#FFFFFF";
    // retriving the usernzmd inserted 
    let email = document.getElementById("login_email").value;

    if (localStorage[email] === undefined) {

        // meaning that the user does not have an account
        document.getElementById("login_failure").innerHTML = "Are you sure that you have an account?";

        document.getElementById("login_email").style.backgroundColor = "#ff6e6c";
        return validated;

    } else {
        //  The user has an account
        let user_login = JSON.parse(localStorage[email]); //Convert to JS

        // retriving password
        let password = document.getElementById("login_password").value;

        // checking ig the password is in the system

        if (password === user_login.password) {

            validated = true;
            // clears any failures
            document.getElementById("login_failure").innerHTML = "";
            // we save the session in loggedInUser
            sessionStorage.logged_in_user = user_login.email;

            // Relocates the page if everything went through
            location.replace("index.php");

        }
        else {

            // password has not been found

            document.getElementById("login_password").style.backgroundColor = "#ff6e6c";
            document.getElementById("login_failure").innerHTML = "Password Not Recognized. Please try again.";

        }
     
    }
    return validated;
}


function sign_out() {

    sessionStorage.clear();
    location.replace("index.php");
}
