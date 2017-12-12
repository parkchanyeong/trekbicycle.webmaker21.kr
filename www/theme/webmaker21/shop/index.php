<?php
include_once('./_common.php');
if (G5_IS_MOBILE) {
	include_once(G5_THEME_MSHOP_PATH.'/index.php');
	return;
}
define("_INDEX_", TRUE);
include_once(G5_THEME_SHOP_PATH.'/shop.head.php');
?>




	내용



<?php
include_once(G5_THEME_SHOP_PATH.'/shop.tail.php');
?>