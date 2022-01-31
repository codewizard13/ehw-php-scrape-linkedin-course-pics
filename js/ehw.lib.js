/*
Project Name:   EHW PHP Demo: Scrape LinkedIn Course List Images
Main Prj File:  controller.php

This Filename:  ehw.lib.js
Date Created:   01/19/22
Date Updated:   01/28/22
Programmer:     Eric L. Hepperle

File Version:    1.00.00

File Purpose:
  This JavaScript file is a LIBRARY of helper functions.
  It is the MAIN library file.

TAGS:   JavaScript, ES6, DOM Manipulation, App, Eric L. Hepperle, Eric Hepperle

Usage:
  Use with controller.php

Sample results: 
--

Requires:
  * controller.php
  * Browser
    
Demonstrates:
  * Vanilla JavaScript
  * JavaScript ES6/ECMAScript2015
  * ES6 Date/Time object
  * padStart() for leading zeroes

Future:
  * Use fetch API or CURL to grab webpage content with controller.php
*/

function getCurrentDateTime() {
  var currentdate = new Date();
  var datetime = "Last Sync: " + currentdate.getDate() + "/"
      + (currentdate.getMonth()+1)+ "/"
      + currentdate.getFullYear() + "@"
      + currentdate.getHours() + ":"
      + currentdate.getMinutes() + ":"
      + currentdate.getSeconds();
  return datetime;
}

function getDateTime(dt_fmt='US-12') {

  var out_obj = {};
  var date_obj = {};
  var time_obj = {};
  var cur_dt = new Date();

  // Date
  var yr2 = cur_dt.getFullYear().toString().substring(2);
  var mo2 = String(cur_dt.getMonth() + 1).padStart(2, 0);
  var dy2 = String(cur_dt.getDate()).padStart(2, 0);
  var date_mmddyy = `${mo2}/${dy2}/${yr2}`;
  var dow_name = Intl.DateTimeFormat('en-US', { weekday: 'long'}).format(cur_dt);
  var mo_long = cur_dt.toLocaleString('default', { month: 'long' });
  var date_full = `${dow_name}, ${mo_long} ${dy2}, ${cur_dt.getFullYear()}`;

  date_obj = {
    yr2, mo2, dy2, date_mmddyy, dow_name, mo_long, date_full
  }

  // Time
  var hrs = cur_dt.getHours(); // gets 24 hr val
  var AmOrPm = hrs >= 12 ? 'PM' : 'AM';
  
  hrs = (hrs % 12) || 12;
  var hrs_pad = hrs.toString().padStart(2, 0);

  var mins = cur_dt.getMinutes();
  var fmt_12hr = `${hrs}:${mins} ${AmOrPm}`;
  var fmt_12hr_pad = `${hrs}:${mins} ${AmOrPm}`;

  time_obj = {
    hrs, AmOrPm, mins, fmt_12hr, fmt_12hr_pad
  }

  
  out_obj.dt = cur_dt;
  out_obj['EN-12'] = {};
  out_obj['EN-12'].date = date_obj;
  out_obj['EN-12'].time = time_obj;

  return out_obj;
}
// const today = getDateTime()['EN-12'];
const today = getDateTime();

function create_results_box() {
    // create new element
    eh_div = document.createElement('div');

    // give class to element
    eh_div.id = "ehw-content";

    // define content to display
    var placeholder_cont = "This is PLACEHOLDER TEXT";

    // create a text node
    var text_node = document.createTextNode(placeholder_cont);

    // add text node to div
    eh_div.appendChild(text_node);

    // eh_div.innerHtml = "Hello!";

    // add div to body
    document.body.prepend(eh_div);
}
create_results_box();

function update_results(res) {
    
    if (res !== '' && res !== undefined) {
        res = res;
    } else {
        res = "You must pass a 'res' value to the update_results() function";
    }

    // define our content element handle
    const cont_el = document.querySelector('#ehw-content');

    // change content text
    cont_el.innerHTML = "<h4>Stringified JSON data</h4>";
    cont_el.innerHTML += res;    
}
update_results("Hello DOLLY!");
update_results("")
update_results("***")
update_results("Current Date/Time: " + getCurrentDateTime()
 + '<br>' + today['EN-12'].date_mmddyy)
//alert('press enter to change the message');
//update_results('Apples are AWESOME')


/*
function process_data(data){

    // create new element
    eh_div = document.createElement('div');

    // give class to element
    eh_div.id = "ehw-content";

    // define content to display
    var content =`${JSON.stringify(data)}`;
    content += `<br><br>${org}`;

    // create a text node
    var text_node = document.createTextNode("hello");

    // add text node to div
    eh_div.appendChild(text_node);

    // eh_div.innerHtml = "Hello!";

    // add div to body
    document.body.prepend(eh_div);

    // ----- Change Div Contents ---

    // define our content element handle
    const cont_el = document.querySelector('#ehw-content');

    // change content text
    cont_el.innerHTML = "<h4>Stringified JSON data</h4>";
    cont_el.innerHTML += content;

}
process_data(org);
*/





// loop through and print out json data
/*
function appendData(data) {
  var mainContainer = document.getElementById("myData");
  for (var i = 0; i < data.length; i++) {
    var div = document.createElement("div");
    div.innerHTML = 'Name: ' + data[i].firstName + ' ' + data[i].lastName;
    mainContainer.appendChild(div);
  }
}
*/


// not working with foreach yet ...
function formatJSONAutos_01(obj) {
    
    let keys = Object.keys(obj);
    console.log(`keys: ${keys}`);
    
    for (let i=0; i < keys.length; i++) {
        let p = document.createElement('p');
        console.log(obj[i]);
    }
}
// formatJSONAutos_01(data);

