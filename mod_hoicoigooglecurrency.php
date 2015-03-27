<?php
/**
 * @package    HoicoiGoogleCurrency
 * @author     Jibon Costa {@link http://extensions.hoicoimasti.com/}
 * @author     Created on 26-Mar-2015
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') || die('=;)');
if (!function_exists('file_get_html') && !class_exists('simple_html_dom')){
	require_once dirname(__FILE__).'/simple_html_dom.php';
}
//-- Include the template for display
require JModuleHelper::getLayoutPath('mod_hoicoigooglecurrency');
