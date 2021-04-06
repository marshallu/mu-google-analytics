<?php
/**
 * The embed code in the head tag.
 *
 * @package MU Google Analytics
 */

?>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo esc_attr( get_option( 'google_tracking_id' ) ); ?>"></script>
<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', '<?php echo esc_attr( get_option( 'google_tracking_id' ) ); ?>');
</script>
