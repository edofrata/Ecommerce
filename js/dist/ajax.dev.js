"use strict";

/**
     * Parameters to use with the AJAX FETCH function
     * @param  {String}   url need to specify the page you would like to send the data to.
     * @param  {Str or an Obj} data Details which will be sent to the server.
     * @param  {String}   method  need to specify which method to use, such as: "POST", "GET", "PUT", "DELETE"
     * @param  {Function} operation a function which will handle the response.
*/
function ajax_fetch(url, data, method, operation) {
  var getFormData, res;
  return regeneratorRuntime.async(function ajax_fetch$(_context) {
    while (1) {
      switch (_context.prev = _context.next) {
        case 0:
          res = function _ref2(response) {
            if (response.ok) {
              return response.text().then(function (resp) {
                return resp;
              });
            } else {
              return false;
            }
          };

          getFormData = function _ref(object) {
            var formData = new FormData();
            Object.keys(object).forEach(function (key) {
              return formData.append(key, object[key]);
            });
            return formData;
          };

          // if the data is not specifided it will reply with the error
          if (data == undefined || data == "") {
            data = "Server is listening, Values NOT inserted";
          } // the operation needed which will handle the response


          if (operation == undefined || operation == "") {
            operation = function operation(message) {
              return console.log("No operation " + message);
            };
          } //if the method is undefined then it will get POST as standard


          if (method == undefined || method == "") {
            method = "POST";
          } // the url which is the page that will receive the data sent


          if (url == undefined || url == "") {
            url = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
          } // translatng the method to UpperCase in case it is inserted in lower case


          method = method.toUpperCase(); // parsing the data in JSON format

          data = JSON.stringify(data); //converting the data into post

          if (!(method == "POST")) {
            _context.next = 14;
            break;
          }

          _context.next = 11;
          return regeneratorRuntime.awrap(fetch("../php_server/" + url, {
            method: method,
            body: getFormData({
              ajax_fetch: data
            })
          }).then(function (response) {
            return res(response);
          })["catch"](function (error) {
            console.log('error:', error);
          }));

        case 11:
          output = _context.sent;
          _context.next = 21;
          break;

        case 14:
          if (!(method == "GET")) {
            _context.next = 20;
            break;
          }

          _context.next = 17;
          return regeneratorRuntime.awrap(fetch("../php_server/" + url + "?" + "ajax_fetch" + "=" + data).then(function (response) {
            return res(response);
          })["catch"](function (error) {
            console.log('error:', error);
          }));

        case 17:
          output = _context.sent;
          _context.next = 21;
          break;

        case 20:
          return _context.abrupt("return", 'wrong method chosen');

        case 21:
          //running the asycronous operation
          operation(output);

        case 22:
        case "end":
          return _context.stop();
      }
    }
  });
}