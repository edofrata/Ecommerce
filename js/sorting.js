//stores the first click which has been made and then evaluates the following action
let stored_action = ["", true];
// as the onfocusout has been used in HTML, as soon as I clicked the function would go, this prevents it
let first_click = true;

function sorting_products(item) {
    let sorting; //function which will have the result of the sorting
    let cards_box; //it will store the HTML value
    let cards; //it will store the children of the value taken from HTML

    if (!first_click) {

        first_click = true;
        // retrivieng the value from HTML thanks to the "this" keyword
        item = item.value;
        cards_box = document.getElementById("cards_box");
        cards = cards_box.children;
        // assigning the values to the counter
        counter = stored_action[0] == item && stored_action[1];
        // setting the value inside the array
        stored_action = [item, counter ? false : true];
        // setting all to lower case for not making wistakes with the conditions
        item = item.toLowerCase();
        // if the "A-Z" is selected then it will enter here
        if (item == "a-z") {
            sorting = function ([, second_one], [, second_two], check) {
                second_one = second_one.getAttribute(item);
                second_two = second_two.getAttribute(item);
                console.log(check);
                if (check) {
                    if (second_one > second_two) {
                        return 1;
                    } else { return -1 }

                } else {
                    if (second_one < second_two) {
                        return 1;
                    } else {
                        return -1;
                    }
                }
            };
            // if the "High-Low" is selected it will enter in here
        } else if (item == "high-low") {
            sorting = function ([, second_one], [, second_two], check) {
                second_one = second_one.getAttribute(item);
                second_two = second_two.getAttribute(item);
                console.log(check);
                if (check) {
                    return second_one - second_two;
                } else { return second_two - second_one; }
            }
        }

        //this line below will sorte the array
        let item_sorting =

            Object.entries(cards).sort(

                (second_one, second_two) => sorting(second_one, second_two, counter)

            );

        cards_box.innerHTML = "";
        for (card of item_sorting) {
            cards_box.appendChild(card[1]);
        }
    } else {

        first_click = false;
    }
}