"use strict";

// retrieving user cart
function user_cart() {
  var array, ope2, app;
  return regeneratorRuntime.async(function user_cart$(_context) {
    while (1) {
      switch (_context.prev = _context.next) {
        case 0:
          array = [];

          ope2 = function ope2(response) {
            console.log(response);
            array = JSON.parse(response);
            console.log(array);
          };

          _context.next = 4;
          return regeneratorRuntime.awrap(ajax_fetch("add_cart.php", 1, "get", ope2));

        case 4:
          /* jslint browser: true*/

          /*global $*/
          (function () {
            function c(a) {
              this.t = a;
            }

            function l(a, b) {
              for (var e = b.split("."); e.length;) {
                if (!(e[0] in a)) return !1;
                a = a[e.shift()];
              }

              return a;
            }

            function d(a, b) {
              return a.replace(h, function (e, a, i, f, c, h, k, m) {
                var f = l(b, f),
                    j = "",
                    g;
                if (!f) return "!" == i ? d(c, b) : k ? d(m, b) : "";
                if (!i) return d(h, b);

                if ("@" == i) {
                  e = b._key;
                  a = b._val;

                  for (g in f) {
                    f.hasOwnProperty(g) && (b._key = g, b._val = f[g], j += d(c, b));
                  }

                  b._key = e;
                  b._val = a;
                  return j;
                }
              }).replace(k, function (a, c, d) {
                return (a = l(b, d)) || 0 === a ? "%" == c ? new Option(a).innerHTML.replace(/"/g, "&quot;") : a : "";
              });
            }

            var h = /\{\{(([@!]?)(.+?))\}\}(([\s\S]+?)(\{\{:\1\}\}([\s\S]+?))?)\{\{\/\1\}\}/g,
                k = /\{\{([=%])(.+?)\}\}/g;

            c.prototype.render = function (a) {
              return d(this.t, a);
            };

            window.t = c;
          })(); // end of 't';


          Number.prototype.to_$ = function () {
            return "£" + parseFloat(this).toFixed(2);
          };

          String.prototype.strip$ = function () {
            return this.split("£")[1];
          };

          app = {
            shipping: 5.00,
            products: array,
            removeProduct: function removeProduct() {
              "use strict";

              var item = $(this).closest(".shopping-cart--list-item");
              item.addClass("closing");
              window.setTimeout(function () {
                item.remove();
                app.updateTotals();
              }, 500); // Timeout for css animation
            },
            addProduct: function addProduct() {
              "use strict";

              var qtyCtr = $(this).prev(".product-qty"),
                  quantity = parseInt(qtyCtr.html(), 10) + 1;
              app.updateProductSubtotal(this, quantity);
            },
            subtractProduct: function subtractProduct() {
              "use strict";

              var qtyCtr = $(this).next(".product-qty"),
                  num = parseInt(qtyCtr.html(), 10) - 1,
                  quantity = num <= 0 ? 0 : num;
              app.updateProductSubtotal(this, quantity);
            },
            updateProductSubtotal: function updateProductSubtotal(context, quantity) {
              "use strict";

              var ctr = $(context).closest(".product-modifiers"),
                  productQtyCtr = ctr.find(".product-qty"),
                  productPrice = parseFloat(ctr.data("product-price")),
                  subtotalCtr = ctr.find(".product-total-price"),
                  subtotalPrice = quantity * productPrice;
              productQtyCtr.html(quantity);
              subtotalCtr.html(subtotalPrice.to_$());
              app.updateTotals();
            },
            updateTotals: function updateTotals() {
              "use strict";

              var products = $(".shopping-cart--list-item"),
                  subtotal = 0,
                  shipping;

              for (var i = 0; i < products.length; i += 1) {
                subtotal += parseFloat($(products[i]).find(".product-total-price").html().strip$());
              }

              shipping = subtotal > 0 && subtotal < 100 / 1.06 ? app.shipping : 0;
              $("#subtotalCtr").find(".cart-totals-value").html(subtotal.to_$());
              $("#taxesCtr").find(".cart-totals-value").html((subtotal * 0.06).to_$());
              $("#totalCtr").find(".cart-totals-value").html((subtotal * 1.06 + shipping).to_$());
              $("#shippingCtr").find(".cart-totals-value").html(shipping.to_$());
            },
            attachEvents: function attachEvents() {
              "use strict";

              $(".product-remove").on("click", app.removeProduct);
              $(".product-plus").on("click", app.addProduct);
              $(".product-subtract").on("click", app.subtractProduct);
            },
            setProductImages: function setProductImages() {
              "use strict";

              var images = $(".product-image"),
                  ctr,
                  img;

              for (var i = 0; i < images.length; i += 1) {
                ctr = $(images[i]), img = ctr.find(".product-image--img");
                ctr.css("background-image", "url(" + img.attr("src") + ")");
                img.remove();
              }
            },
            renderTemplates: function renderTemplates() {
              "use strict";

              var products = app.products,
                  content = [],
                  template = new t($("#shopping-cart--list-item-template").html());

              for (var i = 0; i < products.length; i += 1) {
                content[i] = template.render(products[i]);
              }

              $("#shopping-cart--list").html(content.join(""));
            }
          };
          app.renderTemplates();
          app.setProductImages();
          app.attachEvents();

        case 11:
        case "end":
          return _context.stop();
      }
    }
  });
} // -------------------------------- ADD TO THE BASKET FUNCTION --------------------------------------


function add_basket(element) {
  var productID, userId, getUserId, addToCart;
  return regeneratorRuntime.async(function add_basket$(_context2) {
    while (1) {
      switch (_context2.prev = _context2.next) {
        case 0:
          productID = element.getAttribute("name");
          userId = "";

          getUserId = function getUserId(id) {
            userId = id;
          };

          addToCart = function addToCart(response) {
            if (response) {
              if (response == 'null') {
                alert("NOT LOGGED");
              } else {
                message = response == 2 ? "The Item is already in your cart" : "Item Added!";
                console.log(response);
                alert(message);
                console.log("modal alert called");
              }
            } else {
              alert("Error, not added");
            }
          };

          _context2.next = 6;
          return regeneratorRuntime.awrap(ajax_fetch("add_cart.php", "id", "get", getUserId));

        case 6:
          if (!userId) {
            _context2.next = 9;
            break;
          }

          _context2.next = 9;
          return regeneratorRuntime.awrap(ajax_fetch("add_cart.php", {
            id: productID
          }, "post", addToCart));

        case 9:
        case "end":
          return _context2.stop();
      }
    }
  });
}