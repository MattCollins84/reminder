#!/usr/bin/php -q
<?php
function minify( $css ) {
	$css = preg_replace( '#\s+#', ' ', $css );
	$css = preg_replace( '#/\*.*?\*/#s', '', $css );
	$css = str_replace( '; ', ';', $css );
	$css = str_replace( ': ', ':', $css );
	$css = str_replace( ' {', '{', $css );
	$css = str_replace( '{ ', '{', $css );
	$css = str_replace( ', ', ',', $css );
	$css = str_replace( '} ', '}', $css );
	$css = str_replace( ';}', '}', $css );

	return trim( $css );
}

 $argc = $_SERVER["argc"];
 $argv = $_SERVER["argv"];
 if($argc==1) {
    die("minify_css.php <css1> <..> <..> ..\n");
  }
  
  for($i=1;$i<$argc;$i++) {
    $filename = $argv[$i];
    $css = file_get_contents($filename);
    print(minify($css));
  }

?>
