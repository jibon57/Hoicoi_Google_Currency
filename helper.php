<?php
/**
 * @package    HoicoiGoogleCurrency
 * @subpackage Helper
 * @author     Jibon Costa {@link http://extensions.hoicoimasti.com/}
 * @author     Created on 26-Mar-2015
 * @license    GNU/GPL
 */
require_once dirname(__FILE__).'/simple_html_dom.php';
if ($_GET['convert'] == "yes"){
	$html = file_get_html('https://www.google.com/finance/converter?a='.$_GET['amount'].'&from='.$_GET['from'].'&to='.$_GET['to']);
	foreach($html->find('div#currency_converter_result .bld') as $e) {
		echo iconv("ISO-8859-1", "UTF-8",$e->innertext);
	}
}

