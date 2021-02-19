"use strict";

// retrieving user cart
function user_cart() {
  var array, ope2;
  return regeneratorRuntime.async(function user_cart$(_context) {
    while (1) {
      switch (_context.prev = _context.next) {
        case 0:
          array = [];

          ope2 = function ope2(response) {
            console.log("operazione");
            console.log(response);
            console.log(array);
          };

          _context.next = 4;
          return regeneratorRuntime.awrap(ajax_fetch("add_cart.php", 1, "get"));

        case 4:
        case "end":
          return _context.stop();
      }
    }
  });
}

user_cart();