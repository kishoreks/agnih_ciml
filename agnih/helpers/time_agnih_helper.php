<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Agnih Software
 *
 * An open source application development framework for PHP 5.1.6 or newer
 *
 * @package		Agnih
 * @author		ExpressionEngine Dev Team
 * @copyright	Copyright (c) 2008 - 2014, Agnih, Inc.
 * @license		http://agnih.com/license.html
 * @link		http://agnih.com
 * @since		Version 2.0
 * @filesource
 */

 function time_Ago($time) { 
  
    // Calculate difference between current 
    // time and given timestamp in seconds 
    $diff     = time() - $time; 
      
    // Time difference in seconds 
    $sec     = $diff; 
      
    // Convert time difference in minutes 
    $min     = round($diff / 60 ); 
      
    // Convert time difference in hours 
    $hrs     = round($diff / 3600); 
      
    // Convert time difference in days 
    $days     = round($diff / 86400 ); 
      
    // Convert time difference in weeks 
    $weeks     = round($diff / 604800); 
      
    // Convert time difference in months 
    $mnths     = round($diff / 2600640 ); 
      
    // Convert time difference in years 
    $yrs     = round($diff / 31207680 ); 
      
    // Check for seconds 
    if($sec <= 60) { 
        return "$sec seconds ago"; 
    } 
      
    // Check for minutes 
    else if($min <= 60) { 
        if($min==1) { 
            return "one minute ago"; 
        } 
        else { 
            return "$min minutes ago"; 
        } 
    } 
      
    // Check for hours 
    else if($hrs <= 24) { 
        if($hrs == 1) {  
            return "an hour ago"; 
        } 
        else { 
            return "$hrs hours ago"; 
        } 
    } 
      
    // Check for days 
    else if($days <= 7) { 
        if($days == 1) { 
            return "Yesterday"; 
        } 
        else { 
            return "$days days ago"; 
        } 
    } 
      
    // Check for weeks 
    else if($weeks <= 4.3) { 
        if($weeks == 1) { 
            return "a week ago"; 
        } 
        else { 
            return "$weeks weeks ago"; 
        } 
    } 
      
    // Check for months 
    else if($mnths <= 12) { 
        if($mnths == 1) { 
            return "a month ago"; 
        } 
        else { 
            return "$mnths months ago"; 
        } 
    } 
      
    // Check for years 
    else { 
        if($yrs == 1) { 
            return "one year ago"; 
        } 
        else { 
            return "$yrs years ago"; 
        } 
    } 
} 
  
// Initialize current time 
$curr_time = "2013-07-10 09:09:09"; 
  
// The strtotime() function converts 
// English textual date-time 
// description to a UNIX timestamp. 
$time_ago = strtotime($curr_time); 
  
// Display the time ago 
return time_Ago($time_ago) . "\n"; 
  
  
// Initialize current time 
$curr_time="2019-01-05 09:09:09"; 
  
// The strtotime() function converts 
// English textual date-time 
// description to a UNIX timestamp. 
$time_ago =strtotime($curr_time); 
  
// Display the time ago 
return time_Ago($time_ago); 
 