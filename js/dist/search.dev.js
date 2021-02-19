"use strict";

function search_item(element) {
  var search;
  return regeneratorRuntime.async(function search_item$(_context) {
    while (1) {
      switch (_context.prev = _context.next) {
        case 0:
          // let form = element.form;
          array = [];
          validated = true;

          search = function search(response) {
            validated = response ? true : false;
            console.log(response);

            if (validated) {
              // pushing everything inside an array
              array.push(JSON.parse(response));
              console.log(array);
            }
          };

          item = document.getElementById('search_item');
          ajax_fetch("../php/products.php", {
            product: item.value
          }, "get", search); // if(validated){
          //     form.submit();
          // }

          return _context.abrupt("return", validated);

        case 6:
        case "end":
          return _context.stop();
      }
    }
  });
}