// checking email path
const email_path = /\S+@\S+\.\S+/;

// creating a storage to store the users
var users_storage = {};


function store_user() {

    validated = false;
    // Storing the actual value in the storage
    users_storage.full_name = document.getElementById("inputName").value;
    users_storage.email = document.getElementById("inputEmail").value;
    users_storage.birth = document.getElementById("inputBirth").value;
    users_storage.address = document.getElementById("inputAddress").value;
    users_storage.postcode = document.getElementById("inputPostcode").value;
    users_storage.number = document.getElementById("inputPhone").value;
    users_storage.password = document.getElementById("inputPassword").value;
    // users_storage.psw_repeat = document.getElementById("password_repeat_input").value;

    if (validation(users_storage) == true) {

        // here if everything went through will direct you to the page og login
        console.log(users_storage); //testing if it actually prints out and stores the parameters

        validated = true;
        localStorage[users_storage.email] = JSON.stringify(users_storage);//Stores the details in the licalstorage
    }

    else {

        return validated;
    }
    return validated;
}

function validation(name) {

    check = false;

    if (name.full_name == "") {

        // document.getElementById("name_input").style.backgroundColor = "#ff6e6c";

        alert("Need to insert your Name");
        return check;
    }

    // else if (!name.email.match(email_path)) {

    //     // document.getElementById("email_input").style.backgroundColor = "#ff6e6c";
    //     alert("Need to insert the Email or check if it is valid");
    //     return check;
    // }


    else if (name.number == "" || name.number.length > 11) {

        // document.getElementById("ph_number_input").style.backgroundColor = "#ff6e6c";
        alert("Need to insert the Phone Number or it may be not valid");
        return check;
    }


    else if (name.address == "") {

        // document.getElementById("address_input").style.backgroundColor = "#ff6e6c";
        alert("Need to insert the Address");
        return check;
    }

    else if (name.postcode == "" || name.postcode.length >= 8) {

        // document.getElementById("postcode_input").style.backgroundColor = "#ff6e6c";
        alert("Need to insert the Postcode");
        return check;
    }

    else if (name.email in localStorage) {

        // document.getElementById("username_input").style.backgroundColor = "#ff6e6c";
        alert("The username is already taken");
        return check;
    }
    
    else if (name.password.length <= 6) {

        // document.getElementById("password_input").style.backgroundColor = "#ff6e6c";
        alert("The password must be longer than 6 characters");

        return check;
    }

    else {
        check = true;

        return check;
    }
}

// this function checks the name validation
function check_name(name) {

    var letters = /[^a-z\\" "]/gi;
    name.value = name.value.replace(letters, "");
}

// this function check the phone number validation
function check_phone(phone) {

    var digits = /[^0-9]/gi;
    phone.value = phone.value.replace(digits, "");
}

// check that the postcode does not have special characters
function check_postcode(postcode) {

    var check = /[^0-9\\a-z\\" "]/gi;
    postcode.value = postcode.value.replace(check, "");

    var upper_case = document.getElementById("inputPostcode");
    // transforms the letters in uppercase
    upper_case.value = upper_case.value.toUpperCase();


}

function check_email(email) {

    var check = /[^0-9\\a-z\\.\\_\\-\\@]/gi;
    email.value = email.value.replace(check, "");
}
// check that the address does not have special characters
function check_address(address) {

    var check = /[^0-9\\a-z\\" "]/gi;
    address.value = address.value.replace(check, "");


}
// gives validation to the username with only certain characters
function check_username(username) {

    var check = /[^0-9\\a-z\\-\\.\\_]/gi;
    username.value = username.value.replace(check, "");


}

