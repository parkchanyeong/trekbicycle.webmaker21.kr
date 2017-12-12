<?php
preg_match('#\/theme/(.+)$#', G5_THEME_PATH, $match);
if(G5_IS_MOBILE) $mopath = '/mobile/';
define('DIR',$match['0'].$mopath);
define('PATH',$_SERVER['DOCUMENT_ROOT'].DIR);
//메뉴Active처리
function pubGnb($str){
	global $_dep;
	$exp = explode(',',$str);
	$exp_count = count($exp);
	$act = 0;
	for($i=0;$i<count($exp);$i++){
		if($_dep[$i] == $exp[$i]){
			$act ++;
		}
	}
	if($act==$exp_count){
		echo 'active';
	}
}
?>