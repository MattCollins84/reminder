<form action="https://<?=$data['paypal_host'];?>/cgi-bin/webscr" method="post" target="_top">
<input type="hidden" name="cmd" value="_s-xclick">
<input type="hidden" name="hosted_button_id" value="<?=$plan['paypal_id'];?>">
<input type="image" src="https://<?=$data['paypal_host'];?>/en_GB/i/btn/btn_buynow_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
<img alt="" border="0" src="https://<?=$data['paypal_host'];?>/en_US/i/scr/pixel.gif" width="1" height="1">
</form>
