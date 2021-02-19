"use strict";

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance"); }

function _iterableToArrayLimit(arr, i) { if (!(Symbol.iterator in Object(arr) || Object.prototype.toString.call(arr) === "[object Arguments]")) { return; } var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance"); }

function _iterableToArray(iter) { if (Symbol.iterator in Object(iter) || Object.prototype.toString.call(iter) === "[object Arguments]") return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) { for (var i = 0, arr2 = new Array(arr.length); i < arr.length; i++) { arr2[i] = arr[i]; } return arr2; } }

// function for the account settings
function update_user(element) {
  var email, password, send_form, parsing, form_element, user_email, button, object_details, formEntries, email_check, new_email, replace_user;
  return regeneratorRuntime.async(function update_user$(_context) {
    while (1) {
      switch (_context.prev = _context.next) {
        case 0:
          // variable to send the form and needs to return true
          send_form = true; // the parsed data received

          // variable that takes the name for the form 
          form_element = element.form; // the value of the email

          user_email = document.getElementById('eMail'); // check if it is a button or not

          button = false; // details for the user made in objects

          object_details = {}; // if the tagname is a button it will enter and register all the details

          if (element.tagName == 'BUTTON') {
            formEntries = new FormData(form_element).entries();
            object_details = Object.assign.apply(Object, _toConsumableArray(Array.from(formEntries, function (_ref) {
              var _ref2 = _slicedToArray(_ref, 2),
                  name = _ref2[0],
                  value = _ref2[1];

              return _defineProperty({}, name, value);
            })));
            button = true;
            console.log(JSON.stringify(object_details));
          } // the passwords must match if not it won't enter 


          if (!(document.getElementById("password").value !== document.getElementById("password_confirm").value)) {
            _context.next = 10;
            break;
          }

          alert("The new passwords do not match!");
          _context.next = 24;
          break;

        case 10:
          // function that retrives if the email user exists.
          email_check = function email_check(response) {
            console.log(response);
            send_form = response ? true : false;
            console.log('submit is: ' + send_form);

            if (send_form) {
              parsing = JSON.parse(response);
              email = parsing.email;
              password = parsing.password;
              console.log(email + " " + password);
            }
          }; // checking if the email inserted from the user is already taken


          new_email = function new_email(response) {
            console.log(response);
            send_form = response == 'null' ? true : false;

            if (!send_form) {
              alert("Email already taken!");
            }
          }; // replace of the user


          replace_user = function replace_user(response) {
            console.log(response);
            send_form = response ? true : false;

            if (!send_form) {
              alert("There has been an error!");
            } else {
              sessionStorage.user = object_details.new_email;
              form_element.submit();
            }
          }; // checking if the user exists


          _context.next = 15;
          return regeneratorRuntime.awrap(ajax_fetch("find_customer.php", {
            email: sessionStorage.getItem("user")
          }, "post", email_check));

        case 15:
          if (!(user_email.value !== sessionStorage.getItem("user"))) {
            _context.next = 18;
            break;
          }

          _context.next = 18;
          return regeneratorRuntime.awrap(ajax_fetch("find_customer.php", {
            email: user_email.value
          }, "post", new_email));

        case 18:
          // if the user does not want to update is password just live it blanck
          if (object_details.new_password != "") {
            if (password === object_details.new_password) {
              // if password is equal to the old one, the user cannot update it;
              send_form = false;
              alert("You can't use the same password");
            } // needs to check the length of the password which must be longer than 6 characters
            else if (object_details.new_password) {
                if (object_details.new_password.length <= 6) {
                  // if the password is less than 6 characters the form won't send the details
                  send_form = false;
                  alert("Password must be longer than 6 characters");
                }
              }
          } else {
            //  if empty the password will be set as the old one;
            object_details.new_password = password;
            document.getElementById('password').value = password;
          } //  if the button and the send form are true then it will send the datasfor replacing the user details


          if (!(button && send_form)) {
            _context.next = 24;
            break;
          }

          delete object_details.confirm_password;
          console.log(JSON.stringify(object_details));
          _context.next = 24;
          return regeneratorRuntime.awrap(ajax_fetch("replace_customer.php", object_details, "post", replace_user));

        case 24:
        case "end":
          return _context.stop();
      }
    }
  });
}