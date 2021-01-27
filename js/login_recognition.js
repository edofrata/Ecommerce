
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

    // retriving the email inserted 
    let email = document.getElementById("login_email").value;
    // retriving password
    let password = document.getElementById("login_password").value;

    if (email === "admin" && password === "admin") {

        validated = true;
        // clears any failures
        document.getElementById("login_failure").innerHTML = "";
        // we save the session in loggedInUser
        sessionStorage.logged_in_user = "admin";

        // Relocates the page if everything went through
        location.replace("cms_products.php");
        return validated;
    }
    else if (localStorage[email] === undefined) {

        // meaning that the user does not have an account
        document.getElementById("login_failure").innerHTML = "Are you sure that you have an account?";

        document.getElementById("login_email").style.backgroundColor = "#ff6e6c";
        return validated;

    } else {
        //  The user has an account
        let user_login = JSON.parse(localStorage[email]); //Convert to JS



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

// recognise if it is a guest or a visitor
function user() {

    let email = sessionStorage.logged_in_user;
    if(email === "admin"){

        document.getElementById("user_mode").innerHTML = "<div class='btn-group'> <button type='button' class='btn btn-dark dropdown-toggle dropdown-toggle-split' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <span class='sr-only'>Toggle Dropdown</span></button><div class='dropdown-menu'><a class='dropdown-item' href='#'>Account</a><div class='dropdown-divider'></div><a class='dropdown-item' onclick='sign_out()'>Sign Out</a> </div></div>";
        document.getElementById("check_login").innerHTML = "Hello <br> admin!";
    }
   else if (email != null) {

        var name = JSON.parse(localStorage[email]).full_name;
        var nickname = name.substr(0, name.indexOf(" "));
        document.getElementById("user_mode").innerHTML = "<div class='btn-group'> <button type='button' class='btn btn-dark dropdown-toggle dropdown-toggle-split' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'> <span class='sr-only'>Toggle Dropdown</span></button><div class='dropdown-menu'><a class='dropdown-item' href='#'>Account</a><a class='dropdown-item' href='#'>My Orders</a><div class='dropdown-divider'></div><a class='dropdown-item' onclick='sign_out()'>Sign Out</a> </div></div>";
        document.getElementById("check_login").innerHTML = "Hello <br> " + nickname + "!";

    } else {

        document.getElementById("check_login").innerHTML = "Hello <br> Visitor!";
    }

}

function sign_out() {

    sessionStorage.clear();
    location.replace("index.php");
}
