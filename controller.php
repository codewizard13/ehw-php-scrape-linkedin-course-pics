<!--
Project Name:   EHW PHP Demo: Scrape LinkedIn Course List Images
Main Prj File:  controller.php

This Filename:  controller.php
Date Created:   01/19/22
Date Updated:   01/31/22
Programmer:     Eric L. Hepperle

File Version:    1.00.02

Prj Purpose: 
Web Scraper demo for testing slurping / web scraping
with PHP cURL module. The demo grabs all images from
a given search url for LinkedIn Learning courses. It
then formats and displays all the images in a grid.

File Purpose:
PHP Controller file for project.

Usage:
Navigate to any video of a LinkedIn Learning course page and paste the
code from App.js into the browser developer console and hit enter to run.

Requires:
* Browser navigated to a LinkedIn Learning course page page
* Web server supporting PHP 7.4
* The project folder must live on a web server, local or remote.
* Be logged into LinkedIn Learning

Demonstrates:
* PHP cURL
* PHP Heredoc
* Web Scraping/Scrapers/Slurp
* PHP Regex
* preg_match_all()

Tags:
ES6, arrow functions, PHP variables, Heredoc

Future:
* Use curl or fetch API to grab course page and parse info from there

-->

<?php
/* INCLUDES */
require_once('inc/ehw_lib.php');
require_once('inc/curl_slurp_page.php');

/* VARIABLE */
$page_title = "EHW PHP Demo: Scrape LinkedIn Course List Images";
$prj_shortname = "PHP Demo: Scrape LinkedIn Images";
$purpose = <<<PURP
Web Scraper demo for testing slurping / web scraping
with PHP cURL module. The demo grabs all images from
a given search url for LinkedIn Learning courses. It
then formats and displays all the images in a grid.
PURP;
$date_created = "01/28/22"
?>

<!DOCTYPE html>
<html lang="en">

<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="description" content="<?php echo $page_title; ?>">
	<meta name="author" content="Eric L. Hepperle">

	<title><?php echo $page_title; ?></title>


	<link rel="stylesheet" href="style/main.css">

	<!--<style></style>-->

</head>

<body>

	<div id="wrapper" class="container-fluid">



		<div id="ehw-top-head">
			<div id="header-img"></div>
			<h2><?php echo $page_title; ?></h2>
			<p>This Filename: <span class="property"><?php echo basename(__FILE__); ?></span></p>
			<p>Date Created: <span class="property"><?php echo $date_created ?></span>
			<p class="ehw-date-time">Today's Date/Time: <span class="property date"></span><span class="property time"></span>
		</div><!-- /ehw-top-head div -->

		<main>
			<div>
				<h3>PURPOSE:</h3>

				<p>This <strong>App</strong> is a <?php echo $purpose; ?></p>

				<!--
<h3>STEPS:</h3>

<p>These are the steps to prepend a div to the body. Note that prepending adds to top of page, whereas appending adds to bottom of page.</p>

<ol>
	<li>Define JSON object</li>
	<li>Create new DIV element</li>
	<li>Add id "ehw-content" to div</li>
	<li>Create text node</li>
	<li>Add text node to div (appendChild)</li>
	<li>Prepend div to body</li>
</ol>
-->

				<!-- FORM -->

				<form onsubmit="return false;" id="search-form" name="search-form" method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
					<p class="search-box">
						<input type="text" name="name" placeholder="Enter a string to search" autofocus /><br />
					</p>

					<p class="num-sel">
						<label for="desired_num">How Many?</label>
						<input type="number" id="desired_num" name="desired_num" min="1" max="100" value="10" />
					</p>

					<p class="btn-search">
						<input type="submit" name="search" value="Search" />
					</p>

				</form>

				<!-- /FORM -->


				<?php

				/**
				 * Validate and sanitize search string
				 */
				function clean_input($data)
				{
					$data = trim($data);
					$data = stripslashes($data);
					$data = htmlspecialchars($data);
					return $data;
				}

				function get_results_html()
				{
					// If we submitted the page
					if ($_SERVER["REQUEST_METHOD"] == "POST") {

						$def_srch_keywords = "object oriented javascript es6";

						// set $srch_keywords to value of $_POST['name']
						$srch_keywords = $_POST["name"] ? clean_input($_POST["name"]) : $def_srch_keywords;

						$srch_url = ll_search_string($srch_keywords);

						$page = get_web_content($srch_url);

						// Define regex for image urls
						$regex_img = '!https://media-exp1.licdn.com/dms/image/[^\s"]*!';

						$desired_num = $_POST["desired_num"] ? clean_input($_POST["desired_num"]) : 5;
						echo "Desired Num: $desired_num";

						$img_urls = get_img_urls($page, $regex_img);

						$html = "<h2>OUTPUT RESULTS:</h2>";
						$html .= '<h3>$srch_url: ' . $srch_url . '</h3>';
						$html .= show_img_gallery($img_urls, $desired_num);
					} else {
						$html = "<h3>No search results available. Try again.</h3>";
					}

					return $html;
				}

				$html = get_results_html();
				// $html = file_get_contents('inc/tmplt__results.htm');
				require_once('inc/tmplt__dyn_res.php');

				// Temporarily disable image display
				// $html = '<h3>Image display temorarily disabled by Eric.</h3>';

				?>

				<!-- SEARCH RESULTS -->

				<section class='ehw-curl-results'>
					<?php echo $html; ?>
				</section>

				<!-- /SEARCH RESULTS -->


				<div id="hidden-div"></div>



				<!-- Code Section Template
<section class="ehw-code">
<h3>Let, Arrow Functions, ForEach</h3>
<pre>
// add code here
</pre>
</section><!-- /ehw-code -->

		</main>

	</div><!-- /wrappper -->

	<!-- JavaScript -->
	<script src="js/ehw.lib.js"></script>
	<!--<script src="js/Demo.js"></script>-->
	<script>
		var date_el = document.querySelector('.ehw-date-time .date');
		var time_el = document.querySelector('.ehw-date-time .time');

		var now_date = today["EN-12"].date.date_full;
		var now_time = '[' + today["EN-12"].time.fmt_12hr_pad + ']';

		date_el.innerText = now_date;
		time_el.innerText = now_time;
	</script>

</body>

</html>



<!--- --- ---

Notes:
- N/A-->