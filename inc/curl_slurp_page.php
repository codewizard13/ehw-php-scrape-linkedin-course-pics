<!--
Project Name:   EHW PHP Demo: Scrape LinkedIn Course List Images
Main Prj File:  controller.php

This Filename:  curl_slurp_page.php
Date Created:   01/26/22
Date Updated:   01/29/22
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
require_once('ehw_lib.php');

$search_url = ll_search_string();

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
$html = '<h3>$search_url: ' . $search_url . '</h3>';
$html .= show_img_gallery($img_urls);

?>