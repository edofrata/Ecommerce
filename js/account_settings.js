

// needs to retrieve information from the user
let email = sessionStorage.logged_in_user;
// for the left user
document.getElementById("name_account").innerHTML = JSON.parse(localStorage[email]).full_name;
document.getElementById("email_account").innerHTML = JSON.parse(localStorage[email]).email;

// for the form
document.getElementById("fullName").value = JSON.parse(localStorage[email]).full_name;
document.getElementById("DoB").value = JSON.parse(localStorage[email]).birth;
document.getElementById("phone_account").value = JSON.parse(localStorage[email]).number;
document.getElementById("Street").value = JSON.parse(localStorage[email]).address;
document.getElementById("postcode").value = JSON.parse(localStorage[email]).postcode;

function update() {


    if (document.getElementById("password").value !== document.getElementById("password_confirm").value) {


        alert("The new passwords do not match!");

    } else {

        var parsing = JSON.parse(localStorage[email]);

        console.log(parsing.full_name = document.getElementById("fullName").value);
        console.log(parsing.email = document.getElementById("eMail").value);
        console.log(parsing.birth = document.getElementById("DoB").value);
        console.log(parsing.number = document.getElementById("phone_account").value);
        console.log(parsing.address = document.getElementById("Street").value);
        console.log(parsing.postcode = document.getElementById("postcode").value);
        console.log(parsing.password = document.getElementById("password").value);


        if (parsing.email === JSON.parse(localStorage[email]).email) { alert("You can't update the email with the same one"); }

        else if (parsing.password === JSON.parse(localStorage[email]).password) { alert("You can't update the same password"); }

        else if (parsing.password == "" || document.getElementById("password_confirm").value == "") {

            parsing.password = JSON.parse(localStorage[email]).password;
            console.log("the password remains the same");
        }

        if (parsing.email == "" && JSON.parse(localStorage[email]).password == parsing.password) { refresh(); }

        else { to_index(); }


        // if the password or the email changed the page will prompt the user to the index page and make them login again
        function to_index() {

            if (validation(parsing) == true) {

                if (document.getElementById("eMail").value == "") {
                    parsing.email = JSON.parse(localStorage[email]).email;
                }

                localStorage.removeItem(email);
                sessionStorage.clear();
                localStorage[parsing.email] = JSON.stringify(parsing);
                console.log("Everything has been updated");
                location.replace("index.php");

            }

        }
        // if email and password haven't changed then it will just refresh the page
        function refresh() {
            parsing.email = JSON.parse(localStorage[email]).email;
            localStorage[parsing.email] = JSON.stringify(parsing);
            console.log("Everything has been updated");
            location.replace("account.php");
        }
    }
}