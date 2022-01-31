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
<h2>OUTPUT RESULTS:</h2>
<h3>$srch_url: https://www.linkedin.com/learning/search?keywords=object%20oriented%20javascript%20es6</h3>


<?php
$def_img_url = 'pix/thumbs/1610728168219.jpg'
?>
<img src="<?php echo $def_img_url; ?>">
<?php
$dummy_urls_1 = [
  'https://some-image-url-1',
  'https://some-image-url-2'
];

$urls = range(1,12);
var_dump($urls);

$test_urls = array_fill(0, 12, $def_img_url);
var_dump($test_urls);

$html = show_img_gallery($test_urls, 16); ?>