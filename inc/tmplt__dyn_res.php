<!--
Project Name:   EHW PHP Demo: Scrape LinkedIn Course List Images
Main Prj File:  controller.php

This Filename:  tmplt__dyn_res.php
Date Created:   01/30/22
Date Updated:   --
Programmer:     Eric L. Hepperle

File Version:    1.00.00

File Purpose:
  Dynamic PHP View Page template for what output should look like.
  This
-->



<!--<section class="ehw-curl-results">-->
<?php
$html = <<<HTM
<h2>OUTPUT RESULTS:</h2>
<h3>\$srch_url: https://www.linkedin.com/learning/search?keywords=object%20oriented%20javascript%20es6</h3>
HTM;

// Set dummy urls
$def_img_url = 'pix/thumbs/1610728168219.jpg';
$dummy_urls = array_fill(0, 12, $def_img_url);
$html .= show_img_gallery($dummy_urls, 16);

?>