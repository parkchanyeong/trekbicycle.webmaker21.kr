<?php
preg_match('#\/theme/(.+)$#', G5_THEME_PATH, $match);
if(G5_IS_MOBILE) $mopath = '/mobile/';
define('DIR',$match['0'].$mopath);
define('PATH',$_SERVER['DOCUMENT_ROOT'].DIR);
?>