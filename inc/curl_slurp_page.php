<!--
Project Name:   EHW PHP Demo: Scrape LinkedIn Course List Images
Main Prj File:  controller.php

This Filename:  curl_slurp_page.php
Date Created:   01/26/22
Date Updated:   01/28/22
Programmer:     Eric L. Hepperle

File Version:    1.00.00

File Purpose:
  Single page demo for testing slurping / web scraping
  with PHP cURL module. The demo grabs all images from
  a given search url for LinkedIn Learning courses. It
  then formats and displays all the images in a grid.
-->

<?php
/* INCLUDES */
include('ehw_lib.php');

/* VARIABLES */
$base_url = 'https://www.linkedin.com/learning';
$target_url = $base_url . '/search?keywords=API';

$search_str = "object oriented javascript es6";
$search_str = "object oriented php";

/* Sample search url:
   https://www.linkedin.com/learning/search?keywords=object%20oriented%20javascript%20es6
*/
$search_url = $base_url . '/search?keywords=' . rawurlencode($search_str);
echo '<h3>$search_url: ' . $search_url . '</h3>';

$html = get_web_content($search_url);

// Define regex for image urls
$regex_img = '!https://media-exp1.licdn.com/dms/image/[^\s"]*!';

$img_urls = get_img_urls($html, $regex_img);

function show_img_gallery($urls) {
    $li_items = '';

    for ($i=0; $i<count($urls); $i++) {
        $li = "<li class='res-img-cont'>";
        $li .= "<img src='$urls[$i]' style='width: 100%'>";
        $li .= '</li>';
        $li_items .= $li;
    }

    $out = <<<OUT
    <ul>
      $li_items
    </ul>
    OUT;
    
    return $out;
}
$html = show_img_gallery($img_urls);

?>

