<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가

include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once(G5_LIB_PATH.'/latest.lib.php');

function gnb_active($d1,$d2,$d3,$d4){
	global $_dep;
	$depth_re = array();
	if($d1=='all'){ $depth_re[0] = 'all'; }else{ $depth_re[0] = $_dep[0]; }
	if($d2=='all'){ $depth_re[1] = 'all'; }else{ $depth_re[1] = $_dep[1]; }
	if($d3=='all'){ $depth_re[2] = 'all'; }else{ $depth_re[2] = $_dep[2]; }
	if($d4=='all'){ $depth_re[3] = 'all'; }else{ $depth_re[3] = $_dep[3]; }
	$depth2 = $depth_re[0]."|".$depth_re[1]."|".$depth_re[2]."|".$depth_re[3];
	$d = $d1."|".$d2."|".$d3."|".$d4;
	if($d1!=0 && $depth2==$d){
		return 'active';
	}else if($d1==$_dep[0] && $depth2==$d){
		return 'active';
	}
}
?>

	
<div id="wrap">
	<div id="contentWrap">

		<!-- s:slide menu -->
		<section id="slideMenu">
			<a href="#" id="slideClose">X</a>
			<ul id="gnb">
				<li class="<?=gnb_active(1,'all','all','all')?>">
					<a href="<?=DIR?>/sub01/sub01.php">메뉴</a>
					<ul>
						<li class="<?=gnb_active(1,1,'all','all')?>"><a href="<?=DIR?>/sub01/sub01.php">카테고리</a></li>
						<li class="<?=gnb_active(1,2,'all','all')?>"><a href="<?=DIR?>/sub01/sub02.php">카테고리</a></li>
						<li class="<?=gnb_active(1,3,'all','all')?>"><a href="<?=DIR?>/sub01/sub03.php">카테고리</a></li>
						<li class="<?=gnb_active(1,4,'all','all')?>"><a href="<?=DIR?>/sub01/sub04.php">카테고리</a></li>
						<li class="<?=gnb_active(1,5,'all','all')?>"><a href="<?=DIR?>/sub01/sub05.php">카테고리</a></li>
						<li class="<?=gnb_active(1,6,'all','all')?>"><a href="<?=DIR?>/sub01/sub06.php">카테고리</a></li>
					</ul>
				</li>
				<li class="<?=gnb_active(2,'all','all','all')?>">
					<a href="<?=DIR?>/sub02/sub01.php">메뉴</a>
					<ul>
						<li class="<?=gnb_active(2,1,'all','all')?>"><a href="<?=DIR?>/sub02/sub01.php">카테고리</a></li>
						<li class="<?=gnb_active(2,2,'all','all')?>"><a href="<?=DIR?>/sub02/sub02.php">카테고리</a></li>
						<li class="<?=gnb_active(2,3,'all','all')?>"><a href="<?=DIR?>/sub02/sub03.php">카테고리</a></li>
						<li class="<?=gnb_active(2,4,'all','all')?>"><a href="<?=DIR?>/sub02/sub04.php">카테고리</a></li>
						<li class="<?=gnb_active(2,5,'all','all')?>"><a href="<?=DIR?>/sub02/sub05.php">카테고리</a></li>
						<li class="<?=gnb_active(2,6,'all','all')?>"><a href="<?=DIR?>/sub02/sub06.php">카테고리</a></li>
					</ul>
				</li>
				<li class="<?=gnb_active(3,'all','all','all')?>">
					<a href="<?=DIR?>/sub03/sub01.php">메뉴</a>
					<ul>
						<li class="<?=gnb_active(3,1,'all','all')?>"><a href="<?=DIR?>/sub03/sub01.php">카테고리</a></li>
						<li class="<?=gnb_active(3,2,'all','all')?>"><a href="<?=DIR?>/sub03/sub02.php">카테고리</a></li>
						<li class="<?=gnb_active(3,3,'all','all')?>"><a href="<?=DIR?>/sub03/sub03.php">카테고리</a></li>
						<li class="<?=gnb_active(3,4,'all','all')?>"><a href="<?=DIR?>/sub03/sub04.php">카테고리</a></li>
						<li class="<?=gnb_active(3,5,'all','all')?>"><a href="<?=DIR?>/sub03/sub05.php">카테고리</a></li>
						<li class="<?=gnb_active(3,6,'all','all')?>"><a href="<?=DIR?>/sub03/sub06.php">카테고리</a></li>
					</ul>
				</li>
				<li class="<?=gnb_active(4,'all','all','all')?>">
					<a href="<?=DIR?>/sub04/sub01.php">메뉴</a>
					<ul>
						<li class="<?=gnb_active(4,1,'all','all')?>"><a href="<?=DIR?>/sub04/sub01.php">카테고리</a></li>
						<li class="<?=gnb_active(4,2,'all','all')?>"><a href="<?=DIR?>/sub04/sub02.php">카테고리</a></li>
						<li class="<?=gnb_active(4,3,'all','all')?>"><a href="<?=DIR?>/sub04/sub03.php">카테고리</a></li>
						<li class="<?=gnb_active(4,4,'all','all')?>"><a href="<?=DIR?>/sub04/sub04.php">카테고리</a></li>
						<li class="<?=gnb_active(4,5,'all','all')?>"><a href="<?=DIR?>/sub04/sub05.php">카테고리</a></li>
						<li class="<?=gnb_active(4,6,'all','all')?>"><a href="<?=DIR?>/sub04/sub06.php">카테고리</a></li>
					</ul>
				</li>
				<li class="<?=gnb_active(5,'all','all','all')?>">
					<a href="<?=DIR?>/sub05/sub01.php">메뉴</a>
					<ul>
						<li class="<?=gnb_active(5,1,'all','all')?>"><a href="<?=DIR?>/sub05/sub01.php">카테고리</a></li>
						<li class="<?=gnb_active(5,2,'all','all')?>"><a href="<?=DIR?>/sub05/sub02.php">카테고리</a></li>
						<li class="<?=gnb_active(5,3,'all','all')?>"><a href="<?=DIR?>/sub05/sub03.php">카테고리</a></li>
						<li class="<?=gnb_active(5,4,'all','all')?>"><a href="<?=DIR?>/sub05/sub04.php">카테고리</a></li>
						<li class="<?=gnb_active(5,5,'all','all')?>"><a href="<?=DIR?>/sub05/sub05.php">카테고리</a></li>
						<li class="<?=gnb_active(5,6,'all','all')?>"><a href="<?=DIR?>/sub05/sub06.php">카테고리</a></li>
					</ul>
				</li>
			</ul>
		</section>
		<!-- e:slide menu -->

		<div id="secWrap">
			<div id="slideMenuBg"></div>
			
			<!-- s:header -->
			<header id="header">
	
					Header
					<br />
					<a href="#" id="slideBtn">메뉴열기</a>

			</header>
			<!-- e:header -->
			
			<?php if(defined('_INDEX_')) {?>
			<section id="main">
			<?php }else{ ?>
			<section id="sub">
			<?php } ?>
				<div id="content">
