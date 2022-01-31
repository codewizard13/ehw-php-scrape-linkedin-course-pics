<!--
Project Name:   EHW PHP Demo: Scrape LinkedIn Course List Images
Main Prj File:  controller.php

This Filename:  tmplt__dyn_res.php
Date Created:   01/31/22
Date Updated:   --
Programmer:     Eric L. Hepperle

File Version:    1.00.00

File Purpose:
  Dynamic PHP View Page template for what output should look like.
  This
-->

<style>
input#srch_url{
    width: 100%;
    border-color: blueviolet;
    height: 1.8rem;
    outline: none; /* remove focus border */
    border-radius: .3rem;
    padding-left: .3rem;
}

.ehw-curl-results h2 {
    background-color: aquamarine;
    padding: .3rem;
    font-size: 1.4rem;
    padding: .5rem 1rem;

    background-image: linear-gradient(
      to right, 
      #513268, 
      #3b204d, 
      rgb(221 196 229), 
      #9c5b8e
    );
    color: antiquewhite;
}



</style>

<!--<section class="ehw-curl-results">-->
<?php
/* VARIABLES */

// Set dummy urls
$def_img_url = 'pix/thumbs/1610728168219.jpg';
$dummy_urls = array_fill(0, 12, $def_img_url);
$dummy_srch_url = 'https://www.linkedin.com/learning/search?keywords=object%20oriented%20javascript%20es6';

$head = <<<HTM
<h2>OUTPUT RESULTS:</h2>
<h3>URL Searched:</h3>
<input type=text name='srch_url' id='srch_url' value=$dummy_srch_url readonly>
HTM;

$html = $head . show_img_gallery($dummy_urls, 16);

?>