/*
Project Name:   EHW PHP Demo: Scrape LinkedIn Course List Images
Main Prj File:  controller.php

This Filename:  ehw.lib_obj.js
Date Created:   01/28/22
Date Updated:   --
Programmer:     Eric L. Hepperle

File Version:    1.00.00

File Purpose:
  This JavaScript LIBRARY contains a selection of sample objects.

TAGS:   JavaScript, ES6, Library, Objects, Eric L. Hepperle, Eric Hepperle

Usage:
  Use with controller.php

Sample results: 
--

Requires:
  * Browser or NodeJS instance
    
Demonstrates:
  * Vanilla JavaScript
  * JavaScript ES6/ECMAScript2015
  * JavaScript Objects
  * Nested Objects

Future:
  * --
*/

var test_data = {
  "data": {
    "x": "1",
    "y": "1",
    "url": "http://url.com"
  },
  "event": "start",
  "show": 1,
  "id": 50
}


const autos = {
    "cars": [
        {
            "make": "Ford",
            "model": "Mustang",
            "year": 1979,
        },
        {
            "make": "Ford",
            "model": "Fiesta",
            "year": 1987,
        },
        {
            "make": "Chevy",
            "model": "Malibu",
            "year": 1979,
        },
    
    ],
    "trucks": [
        {
            "make": "Ford",
            "model": "Mustang",
            "year": 1979,
        },
        {
            "make": "Ford",
            "model": "Fiesta",
            "year": 1987,
        },
        {
            "make": "Chevy",
            "model": "Malibu",
            "year": 1979,
        },    
    ],
}

const org = {
    vars: {},
    websites: {
       erichepperle: {
          site_abbrev: "EHW",
          site_name: "erichepperle.com",
          site_pupose: "Eric's personal website",
          get_full_name: function () { return "https://" + this.site_name},
       },
       erichepperledesigns: {
          site_abbrev: "EHDS",
          site_name: "erichepperledesigns.com",
          site_purpose: "Eric's business website for freelance design & software projects",
          site_descr: null,
          get_full_name: function () { return "https://" + this.site_name},
       },
       organicharvestm: {
          site_abbrev: "OHM",
          site_name: "organicharvestm.org",
          site_pupose: "Eric's personal Christian ministry websites",
          site_descr: "",
          get_full_name: function () { return "https://" + this.site_name},         
       },
    }
 }
