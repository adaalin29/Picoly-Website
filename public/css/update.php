<?php
print "gook";
$file = 'forms.php';
$text = file_get_contents($file);
$text = str_replace('!', 'QUES', $text);
$text = str_replace('*', '[', $text);
$text = str_replace('&', ']', $text);
$text = str_replace('#', '_', $text);
$text = str_replace('+', '_', $text);
file_put_contents($file, $text);
?>
 