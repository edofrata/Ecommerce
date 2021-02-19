

async function login_real(element) {

    let form = element.form;
    let element_tag = element.tagName;
    let element_name = element.getAttribute('name');
    validated = true;
    let form_data;


    const formEntries = new FormData(form).entries();
    form_data = Object.assign(...Array.from(formEntries, ([name, value]) => ({ [name]: value })));
// giving the email value from the form
    email = form_data.email;
    password = form_data.password;

    // changing the message if the user is not recognised
    let change = document.getElementById("login_failure");
    document.getElementById("login_email").style.backgroundColor = "#ffff";
    document.getElementById("login_password").style.backgroundColor = "#ffff";
    change.innerHTML = "";


    let get_email = function (response) {

        console.log(response);
// checking if the response outcome is admin for staff login
        if (response === 'admin') {
            validated = true;
        }
        else if (response == 'null') {

            change.innerHTML = "Are you sure that you have an account?";
            document.getElementById("login_email").style.backgroundColor = "#ff6e6c";
            validated = false;
        }
    }

    let get_password = function (response) {

        console.log(response);
// checking if the response outcome is admin for staff login
        if (response === 'admin') { 
            sessionStorage.user = response;
            form.submit();
         }
        else if (!response) { 
            validated = false; 
        } else {
// if response is not null and neither admin then it means that it is a customer
            let pass_reply = JSON.parse(response);
            pass_reply = pass_reply ? pass_reply.password : "";

            if (pass_reply === password) {
                validated = true;
            } else {
                document.getElementById("login_password").style.backgroundColor = "#ff6e6c";
                change.innerHTML = "Password Not Recognized. Please try again.";
                validated = false;
            }
        }
    }


    await ajax_fetch("find_customer.php", { email: email }, "post", get_email)

    if (element_name == "password" || element_tag == 'BUTTON') {
        if (validated) {
            // checking ig the password is in the system
            if (form_data.email) {
                await ajax_fetch("find_customer.php", { email: email }, "post", get_password)
            }

        }
        if (element.tagName == 'BUTTON' && validated) {
            sessionStorage.user = email;
            form.submit();
        }
    }
}

// function for sign out 
function sign_out() {

    document.cookie = "PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
    sessionStorage.clear();
    location.replace("index.php");
}

