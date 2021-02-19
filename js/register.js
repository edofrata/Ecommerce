
async function validation(control) {

    let button = false;
    // let form_name = control.form.getAttribute('name');
    let form_element = control.form;

// checks if the input comes from a button or not
    if(control.tagName == 'BUTTON' ){
        
        button = true;
        console.log('button' + button);
        control = form_element;

    }

    check = true;

// array which stores the user details.
    array = [];
    console.log(array);
// it check the response from the AJAX call and checks it.
    let existing_email = function (response) {

        console.log(response);
        check = response == 'null' ? true : false;   
    
        check ? null : alert("The email is already taken!");
        
        }
    
// checks if it finds a form or not
    if (control.getAttribute("name") == 'form') {

        const formEntries = new FormData(control).entries();
              array = Array.from(formEntries, ([name, value]) => ({[name]: value}));

    } else{
        obj = new Object;
        obj[control.getAttribute("name")] = control.value;
        array.push(obj);
    }
// checks all the user details
    for(elem of array){
        switch(Object.keys(elem)[0]){
            case "email":
 // calling the AJAX function with await as the browser needs to wait for the response from the server
            await ajax_fetch("find_customer.php",elem, "post",existing_email);
                break;
            case "password":
// if check is already false means that something is already wrong 
                if(check === false){
                    check = false;
                }
// if not it checks if the password is fine 
                else{check = Object.values(elem)[0].length <= 6 ? false : true ;
                if (!check) {
                    alert("The password must be longer than 6 characters");
                }
            }
                break;
            default:
                console.log(Object.keys(elem)[0] + " " + Object.values(elem)[0]) ;
                break;
        }
    }
    

// here it checks whether the boolean button is false and also the check if false.
    button && check ? form_element.submit() : null;
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

// checking email path
const email_path = /\S+@\S+\.\S+/;
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
