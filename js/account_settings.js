
// function for the account settings
async function update_user(element) {

    let email;
    let password;
    // variable to send the form and needs to return true
    let send_form = true;
    // the parsed data received
    let parsing;
    // variable that takes the name for the form 
    let form_element = element.form;
    // the value of the email
    let user_email = document.getElementById('eMail');
// check if it is a button or not
    let button = false;

// details for the user made in objects
    let object_details = {};

// if the tagname is a button it will enter and register all the details
    if (element.tagName == 'BUTTON') {

        const formEntries = new FormData(form_element).entries();
        object_details = Object.assign(...Array.from(formEntries, ([name, value]) => ({ [name]: value })));
        button = true;
        console.log(JSON.stringify(object_details));
    }

// the passwords must match if not it won't enter 
    if (document.getElementById("password").value !== document.getElementById("password_confirm").value) { alert("The new passwords do not match!") }

    else {
        // function that retrives if the email user exists.
        let email_check = function (response) {
   
            console.log(response);
            send_form = response ? true : false;
            console.log('submit is: ' + send_form)

            if (send_form) {
                parsing = JSON.parse(response);
                email = parsing.email;
                password = parsing.password;
                console.log(email + " " + password)
            }
        }

        // checking if the email inserted from the user is already taken
        let new_email = function (response) {

            console.log(response);
            send_form = response == 'null' ? true : false;

            if (!send_form) { alert("Email already taken!"); }

        }

        // replace of the user
        let replace_user = function (response) {

            console.log(response);
            send_form = response ? true : false;

            if (!send_form) {

                alert("There has been an error!");
            }

            else {
                sessionStorage.user = object_details.new_email;
                form_element.submit();
            }
        }

        // checking if the user exists
        await ajax_fetch("find_customer.php", { email: sessionStorage.getItem("user")}, "post", email_check);
        if (user_email.value !== sessionStorage.getItem("user")) {
            // calling for setting the new datas
            await ajax_fetch("find_customer.php", { email: user_email.value}, "post", new_email);
        }
        // if the user does not want to update is password just live it blanck
        if (object_details.new_password != "") {
            if (password === object_details.new_password) {
                // if password is equal to the old one, the user cannot update it;
                send_form = false;
                alert("You can't use the same password");
            }
            // needs to check the length of the password which must be longer than 6 characters
            else if(object_details.new_password){
             if(object_details.new_password.length <= 6){
// if the password is less than 6 characters the form won't send the details
                send_form = false;
                alert("Password must be longer than 6 characters");
            }
        }
        } else {
            //  if empty the password will be set as the old one;
            object_details.new_password = password;
            document.getElementById('password').value = password;
            
        }

        
    //  if the button and the send form are true then it will send the datasfor replacing the user details
        if (button && send_form){
            delete object_details.confirm_password;
            console.log(JSON.stringify(object_details));
        await ajax_fetch("replace_customer.php", object_details, "post", replace_user);
        }
    }
}

