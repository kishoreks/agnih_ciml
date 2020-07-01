<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

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


 function math($fee,$commission)
 {
 	  $math_call = $fee * $commission / 100;

 	  return $math_call;
 }