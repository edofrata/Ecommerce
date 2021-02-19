/**
     * Parameters to use with the AJAX FETCH function
     * @param  {String}   url need to specify the page you would like to send the data to.
     * @param  {Str or an Obj} data Details which will be sent to the server.
     * @param  {String}   method  need to specify which method to use, such as: "POST", "GET", "PUT", "DELETE"
     * @param  {Function} operation a function which will handle the response.
*/

async function ajax_fetch(url, data, method, operation) {

    // if the data is not specifided it will reply with the error
    if (data == undefined || data == "") {
        data = "Server is listening, Values NOT inserted";
    }
    // the operation needed which will handle the response
    if (operation == undefined || operation == "") {
        operation = message => console.log("No operation " + message);
    }
    //if the method is undefined then it will get POST as standard
    if (method == undefined || method == "") {
        method = "POST";
    }
    // the url which is the page that will receive the data sent
    if (url == undefined || url == "") {
        url = location.pathname.substring(location.pathname.lastIndexOf("/") + 1);
    }

    // translatng the method to UpperCase in case it is inserted in lower case
    method = method.toUpperCase();
    // parsing the data in JSON format
    data = JSON.stringify(data);

    //converting the data into post
    function getFormData(object) {

        let formData = new FormData();

        Object.keys(object).forEach(key => formData.append(key, object[key]));

        return formData;
    }

    //Server response
    function res(response) {
        if (response.ok) {
            return response.text().then(resp => resp);
        } else {
            return false;
        }
    }

    //doing the AJAX call through fetch in vanilla JS
    if (method == "POST") {

        output = await fetch("../php_server/" + url, {
            method: method,
            body: getFormData({ ajax_fetch: data }),
        }).then(response => res(response)
        ).catch(error => { console.log('error:', error); });
    } else if (method == "GET") {

        output = await fetch("../php_server/" + url + "?"
            + "ajax_fetch" + "="
            + data
        ).then(response => res(response)
        ).catch(error => { console.log('error:', error); });
    } else {

        return 'wrong method chosen';
    }

    //running the asycronous operation
    operation(output);
}
