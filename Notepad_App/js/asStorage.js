// JavaScript File for Local Notepad Application
// Clinton Garwood
// January 2022
// /js/storage.js

// Check page that the app is running on.
// Web Form has variables for Title and Content

// API of functions in this document:
// edit_note() - helper function using SessionStorage - carries localStorage Key to edit_note.html
// go_home() - redirects the application to index.html page
// load_note() - called by edit_note.html page to populate variables into web form
// read_keys() - reads all localStorage keys, and displays each note found in a table
// remove_note(key_string) - removes a note from localStorage
// set_key() - Save function which creates a new note in localStorage and redirects to index.html

// Local and Session Storage functions used in this application
// namespace for Local Storage: window.localStorage or localStorage
// Save local: localStorage.setItem(key, value);
// Read local: localStorage.getItem(key);
// Remove local item: localStorage.removeItem(key);
// Clear local (all): localStorage.clear();
// Save Session item: sessionStorage.setItem(key,value)
// Read Session item: sessionStorage.getItem()
// Remove Session item: sessionStorage.removeItem(key);
// Clear Session (all) sessionStorage.clear();

// Editor Notes:
// index.html - main page which lists all saved notes (edit and remove buttons)
// new_note.html - Web form to create a new note
// edit_note.html - Not reachable by the navigation menu (update existing notes only)
// about.html - Description and Details Page for the application

// On load of edit page; save the existing note's title as variable
// old_title = key
// The old_title is populated into the Title text field and
// the value of the key is populated into the Content text field.
// On submit button click, check old_title against new_title (text field)
// if the title does not change just update Content from text box.
// if old_title == new_title {value = 'content_from_form' }
// else if old_title != new_title
//  remove old key -- this will also remove the old value
//  save new_title=key, value = 'content_from_form'
// redirect the user to index.html

// New Note Page
// This page is empty by default. If the user accidentialy presses Submit
// with the text fields empty, the form should reject the submission.
// As long as some text is included in 'title' field, the new note should save
//  save new_title=key, value = 'content_from_form'

// Titles Page
// This page shows a list of titles which can be deleted or 'clicked' to
// edit. Two buttons can be offered to the user a Delete and Edit. If the
// delete button is selected a  call to Remove: localStorage.removeItem(key);
// will remove the item and the value. Otherwise clicking the edit button
// can redirect the user to the 'edit note' page.

function go_home(){
    window.location.href = "./index.html";
}

// Test the concept
function set_key() {
    // pull key name and content from the web form
    ls_key = document.getElementById("title").value;
    ls_value = document.getElementById("content").value;

    // set the values to local storage
    //alert(ls_value);
    localStorage.setItem(ls_key, ls_value, b);
    window.location.href = "./index.html";
}

function myGasRate()
{
   var a, b, result;
   a = document.getElementById("box1").value;
   b = 58.5;
   result = a * b;
   document.getElementById("r").innerHTML = a + " * " + b + " = " + result;








function clear_all(){
    // this function removes all items from local storage (keys and values)
    localStorage.clear();
    window.location.href = "./index.html";
}

function show_key(this_key){
    alert(this_key);
}

function edit_note(key_string){
    this_key = key_string.toString().trim();
    title_text = this_key;
    content_text = localStorage.getItem(this_key).valueOf();
    //alert(content_text);
    sessionStorage.setItem("local_temp", title_text)
    window.location.href = "./edit_note.html";
}

function load_note(){
    // retrieve the session storage variable named 'local_temp'
    // the value of this variable is the key of the localStorage variable
    var localStoreKey = sessionStorage.getItem("local_temp");
    document.getElementById("title").value = localStoreKey;
    document.getElementById("content").value = localStorage.getItem(localStoreKey);
    sessionStorage.removeItem(localStoreKey);
    sessionStorage.clear();
    set_date();
}

function remove_note(key_string){
    // the key that is sent in through the function has a leading and trailing 'space' with it
    // to account for this the variable is called .toString() and then trim() eliminates white space
    this_key = key_string.toString().trim();
    localStorage.removeItem(this_key);
    window.location.href = "./index.html";
}
////this originally read_keys() is now replaced by myRate()
function read_keys() {
    // get key names from local storage, determine how many and display to page
    var key_len = localStorage.length;
    // alert(key_len);
    if (key_len != 0) {
        if (key_len == 1){
            var key_len_string = "You have " + key_len + " note saved.";
            document.getElementById("key_length").innerHTML = key_len_string;
        }
        else {
            var key_len_string = "You have " + key_len + " notes saved.";
            document.getElementById("key_length").innerHTML = key_len_string;    }
        // iterate through each value and display to screen
        for ( var i = 0, len = key_len; i < len; ++i ) {
            // get values of each item in localStorage
            var k_string = window.localStorage.key(i);
            var v_string = window.localStorage.getItem(k_string);
            // testing code for manual placement
            //alert(k_string);
            //alert(v_string);
            //document.getElementById("item_string").innerHTML = k_string;
            //document.getElementById("item_value").innerHTML = v_string;

            // create a new table row (element)
            new_row = document.createElement("tr");

            // create a column for the title (elements)
            title_column = document.createElement("td");
            // Create text for the title column
            column_title_text = document.createTextNode(k_string);
            // append the text to the title column(s)
            title_column.appendChild(column_title_text);
            // Append the Row to the table
            new_row.appendChild(title_column);

            // create a column for the value (elements)
            value_column = document.createElement("td");
            // Create text for the value column
            column_value_text = document.createTextNode(v_string);
            // append the text to the value column(s)
            value_column.appendChild(column_value_text);
            // Append the Row to the table
            new_row.appendChild(value_column);

            // create a column for the edit (button)
            edit_column = document.createElement("td");
            // Create button for the edit/show column
            edit_button = document.createElement("button");
            edit_text = document.createTextNode("View/Edit");
            // Set styling for the button
            edit_button.className="btn btn-warning";
            // Set the function handler for the button
            edit_button.setAttribute('onclick','edit_note( " '+k_string+' " )');
            // append the button to the edit column(s)
            edit_button.appendChild(edit_text);
            edit_column.appendChild(edit_button);
            // Append the Row to the table
            new_row.appendChild(edit_column);

            // // create a column for the remove (button)
            // create a column for the remove (button)
            remove_column = document.createElement("td");
            // Create button for the delete column
            remove_button = document.createElement("button");
            remove_text = document.createTextNode("Delete/Remove");
            // Set styling for the button
            remove_button.className="btn btn-outline-danger";
            // Set the function handler for the button
            var remove_string = toString(k_string);
            // try lambda function
            //(k_string) => {localStorage.removeItem(k_string)}
            remove_button.setAttribute('onclick','remove_note( " '+k_string+' " )');
            // append the button to the remove column(s)
            remove_button.appendChild(remove_text);
            remove_column.appendChild(remove_button);
            // Append the Row to the table
            new_row.appendChild(remove_column);

            //append the rows to the table
            document.querySelector("#saved_notes").appendChild(new_row);
         }
    }
    set_date();
}

function set_date(){
    let now = new Date();
    this_year = now.getFullYear();
    footer_text = "Alena Sokoloski &#169;2022 - " + this_year;
    document.getElementById("footer_here").innerHTML = footer_text;
}
