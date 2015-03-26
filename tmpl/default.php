<?php
/**
 * @package    HoicoiGoogleCurrency
 * @subpackage G:
 * @author     Jibon Costa {@link http://extensions.hoicoimasti.com/}
 * @author     Created on 26-Mar-2015
 * @license    GNU/GPL
 */

//-- No direct access
defined('_JEXEC') || die('=;)');
JHtml::_('jquery.framework');
$html = file_get_html('https://www.google.com/finance/converter');
?>
<script type="text/javascript">
	jQuery("document").ready(function(){
		jQuery("#google_currency #convert").click(function() {
			var amount = jQuery('#google_currency input[name= amount]').val();
			var from = jQuery('#google_currency select[name= from]').val();
			var to = jQuery('#google_currency select[name= to]').val();
			jQuery('#google_currency p#result').html("loading....");
			jQuery.ajax({
					method: "GET",
					url: "<?php echo Juri::base(); ?>modules/mod_hoicoigooglecurrency/helper.php?convert=yes&amount="+amount+"&from="+from+"&to="+to					
				})
				.done(function( result ) {
					if (!result == "") {
						var result = amount + " "+from+" = " +result;
						jQuery('#google_currency p#result').html(result);
					}
					else {
						jQuery('#google_currency p#result').html("Could not convert");
					}
				});
		});
	});
</script>

<div id ="google_currency">
  <div class="form-group">
  <label for="Amount">Amount: </label>
    <input type="text" size="5" maxlength="12" class="form-control" value="1" id="amount" placeholder="Amount" name="amount">
  </div>
  <div class="form-group">
 	<select class="form-control" name="from">
		<?php
			foreach($html->find('select[name=from]') as $e) {
				echo iconv("ISO-8859-1", "UTF-8",$e->innertext);
			}
		?>
	</select>
  </div>
  <p style="text-align: center;">TO</p>
  <div class="form-group">
	<select class="form-control" name="to">
		<?php
			foreach($html->find('select[name=to]') as $e) {
				echo iconv("ISO-8859-1", "UTF-8",$e->innertext);
			}
		?>
	</select>
  </div>
  <p id="result" style="color: red;text-align: center"></p>
    <div class="form-group">
       <button id='convert' class="btn btn-default">Convert</button>
  </div>
</div>
