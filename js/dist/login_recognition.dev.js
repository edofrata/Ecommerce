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

function login_real(element) {
  var form, element_tag, element_name, form_data, formEntries, change, get_email, get_password;
  return regeneratorRuntime.async(function login_real$(_context) {
    while (1) {
      switch (_context.prev = _context.next) {
        case 0:
          form = element.form;
          element_tag = element.tagName;
          element_name = element.getAttribute('name');
          validated = true;
          formEntries = new FormData(form).entries();
          form_data = Object.assign.apply(Object, _toConsumableArray(Array.from(formEntries, function (_ref) {
            var _ref2 = _slicedToArray(_ref, 2),
                name = _ref2[0],
                value = _ref2[1];

            return _defineProperty({}, name, value);
          }))); // giving the email value from the form

          email = form_data.email;
          password = form_data.password; // changing the message if the user is not recognised

          change = document.getElementById("login_failure");
          document.getElementById("login_email").style.backgroundColor = "#ffff";
          document.getElementById("login_password").style.backgroundColor = "#ffff";
          change.innerHTML = "";

          get_email = function get_email(response) {
            console.log(response); // checking if the response outcome is admin for staff login

            if (response === 'admin') {
              validated = true;
            } else if (response == 'null') {
              change.innerHTML = "Are you sure that you have an account?";
              document.getElementById("login_email").style.backgroundColor = "#ff6e6c";
              validated = false;
            }
          };

          get_password = function get_password(response) {
            console.log(response); // checking if the response outcome is admin for staff login

            if (response === 'admin') {
              sessionStorage.user = response;
              form.submit();
            } else if (!response) {
              validated = false;
            } else {
              // if response is not null and neither admin then it means that it is a customer
              var pass_reply = JSON.parse(response);
              pass_reply = pass_reply ? pass_reply.password : "";

              if (pass_reply === password) {
                validated = true;
              } else {
                document.getElementById("login_password").style.backgroundColor = "#ff6e6c";
                change.innerHTML = "Password Not Recognized. Please try again.";
                validated = false;
              }
            }
          };

          _context.next = 16;
          return regeneratorRuntime.awrap(ajax_fetch("find_customer.php", {
            email: email
          }, "post", get_email));

        case 16:
          if (!(element_name == "password" || element_tag == 'BUTTON')) {
            _context.next = 22;
            break;
          }

          if (!validated) {
            _context.next = 21;
            break;
          }

          if (!form_data.email) {
            _context.next = 21;
            break;
          }

          _context.next = 21;
          return regeneratorRuntime.awrap(ajax_fetch("find_customer.php", {
            email: email
          }, "post", get_password));

        case 21:
          if (element.tagName == 'BUTTON' && validated) {
            sessionStorage.user = email;
            form.submit();
          }

        case 22:
        case "end":
          return _context.stop();
      }
    }
  });
} // function for sign out 


function sign_out() {
  document.cookie = "PHPSESSID=; expires=Thu, 01 Jan 1970 00:00:00 UTC; path=/;";
  sessionStorage.clear();
  location.replace("index.php");
}