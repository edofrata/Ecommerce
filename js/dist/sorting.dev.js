"use strict";

function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance"); }

function _iterableToArrayLimit(arr, i) { if (!(Symbol.iterator in Object(arr) || Object.prototype.toString.call(arr) === "[object Arguments]")) { return; } var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

//stores the first click which has been made and then evaluates the following action
var stored_action = ["", true]; // as the onfocusout has been used in HTML, as soon as I clicked the function would go, this prevents it

var first_click = true;

function sorting_products(item) {
  var sorting; //function which will have the result of the sorting

  var cards_box; //it will store the HTML value

  var cards; //it will store the children of the value taken from HTML

  if (!first_click) {
    first_click = true; // retrivieng the value from HTML thanks to the "this" keyword

    item = item.value;
    cards_box = document.getElementById("cards_box");
    cards = cards_box.children; // assigning the values to the counter

    counter = stored_action[0] == item && stored_action[1]; // setting the value inside the array

    stored_action = [item, counter ? false : true]; // setting all to lower case for not making wistakes with the conditions

    item = item.toLowerCase(); // if the "A-Z" is selected then it will enter here

    if (item == "a-z") {
      sorting = function sorting(_ref, _ref2, check) {
        var _ref3 = _slicedToArray(_ref, 2),
            second_one = _ref3[1];

        var _ref4 = _slicedToArray(_ref2, 2),
            second_two = _ref4[1];

        second_one = second_one.getAttribute(item);
        second_two = second_two.getAttribute(item);
        console.log(check);

        if (check) {
          if (second_one > second_two) {
            return 1;
          } else {
            return -1;
          }
        } else {
          if (second_one < second_two) {
            return 1;
          } else {
            return -1;
          }
        }
      }; // if the "High-Low" is selected it will enter in here

    } else if (item == "high-low") {
      sorting = function sorting(_ref5, _ref6, check) {
        var _ref7 = _slicedToArray(_ref5, 2),
            second_one = _ref7[1];

        var _ref8 = _slicedToArray(_ref6, 2),
            second_two = _ref8[1];

        second_one = second_one.getAttribute(item);
        second_two = second_two.getAttribute(item);
        console.log(check);

        if (check) {
          return second_one - second_two;
        } else {
          return second_two - second_one;
        }
      };
    } //this line below will sorte the array


    var item_sorting = Object.entries(cards).sort(function (second_one, second_two) {
      return sorting(second_one, second_two, counter);
    });
    cards_box.innerHTML = "";
    var _iteratorNormalCompletion = true;
    var _didIteratorError = false;
    var _iteratorError = undefined;

    try {
      for (var _iterator = item_sorting[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
        card = _step.value;
        cards_box.appendChild(card[1]);
      }
    } catch (err) {
      _didIteratorError = true;
      _iteratorError = err;
    } finally {
      try {
        if (!_iteratorNormalCompletion && _iterator["return"] != null) {
          _iterator["return"]();
        }
      } finally {
        if (_didIteratorError) {
          throw _iteratorError;
        }
      }
    }
  } else {
    first_click = false;
  }
}