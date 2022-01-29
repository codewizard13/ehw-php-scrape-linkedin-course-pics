<?php
/*
Project Name:   EHW PHP Demo: Scrape LinkedIn Course List Images
Main Prj File:  controller.php

This Filename:  ehw.lib.php
Date Created:   01/26/22
Date Updated:   01/29/22
Programmer:     Eric L. Hepperle

File Version:    1.00.01

File Purpose:
Library of my portable functions that can be used in
any PHP project. Similar to WordPress functions.php.
*/

/**
 * Build search string
 */
function ll_search_string($srch_str='', $base_url='', $param_srch='') {

    $def_base_url = 'https://www.linkedin.com/learning';
    $def_param_srch = '/search?keywords=';
    $def_srch_str = "object oriented javascript es6";

    $base_url = $base_url ? $base_url : $def_base_url;
    $param_srch = $param_srch ? $param_srch : $def_param_srch;
    $srch_str = $srch_str ? $srch_str : $def_srch_str;
    
    /* Sample search url:
    https://www.linkedin.com/learning/search?keywords=object%20oriented%20javascript%20es6
    */
    $srch_url = $base_url . $param_srch . rawurlencode($srch_str);

    return $srch_url;
}

/**
 * Slurp web page content with cURL and return html
 */
function get_web_content($srch_url='') {
    
    $def_src_url = 'https://www.linkedin.com/learning/search?keywords=object%20oriented%20javascript%20es6';
    $srch_url = $srch_url ? $srch_url : $def_src_url; 
    
    // Slurp page code with cURL
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $srch_url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

    return curl_exec($curl);
}

/**
 * Get and return array of image urls from web content.
 * 
 * LinkedIn Learning image regex:
 * '!https://media-exp1.licdn.com/dms/image/[^\s"]*!';
 */
function get_img_urls($html, $reg) {
    // Find and return array of all image urls
    preg_match_all($reg, $html, $matches);

    // Get unique urls only
    $images = array_values(array_unique($matches[0]));
    return $images;
}

/**
 * Get and return array of urls from web content.
 * 
 * @input:
 *   $html: string, chunk of html
 *   $reg: string, PCRE compatible regex
 */
function get_urls($html, $reg) {
    // Find and return array of all image urls
    preg_match_all($reg, $html, $matches);

    // Get unique urls only
    $urls = array_values(array_unique($matches[0]));
    return $urls;
}