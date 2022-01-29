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

/**
 * @input: array of urls to image files
 * @returns: string, html chunk formatted as img gallery
 */
function show_img_gallery($urls, $desired_num=999) {
    $li_items = '';
    
    $desired_num = $desired_num < count($urls) ? $desired_num : count($urls);

    for ($i=0; $i < $desired_num; $i++) {
        $li = "<li class='res-img-cont'>";
        $li .= $i+1 . ": <img src='$urls[$i]' style='width: 100%'>";
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


?>