<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
if(G5_IS_MOBILE) {
	include_once(G5_THEME_MSHOP_PATH.'/shop.head.php');
	return;
}
include_once(G5_THEME_PATH.'/head.sub.php');
include_once(G5_LIB_PATH.'/outlogin.lib.php');
include_once(G5_LIB_PATH.'/poll.lib.php');
include_once(G5_LIB_PATH.'/visit.lib.php');
include_once(G5_LIB_PATH.'/connect.lib.php');
include_once(G5_LIB_PATH.'/popular.lib.php');
include_once(G5_LIB_PATH.'/latest.lib.php');
include_once PATH.'/ajax/popup.ajax.php';

if(isset($ca_id)){
	$sub_ca = substr($ca_id,0,2);
	switch($sub_ca){
		case '10' :
			$_dep = array(2,1,0);
			$_tit = array('인쇄물','','');
			$_txt = array('','','');
			break;
		case '20' : 
			$_dep = array(3,1,0);
			$_tit = array('SHOP','','');
			$_txt = array('','','');
			break;
		default :
			$_dep = array(1,1,0);
			$_tit = array('현수막','','');
			$_txt = array('','','');
			
	}

//게시판인 경우
}else if(isset($bo_table) && $bo_table!=''){
	switch($bo_table){
		case 'notice' :
			$_dep = array(5,1,0);
			$_tit = array('공지사항','','');
			$_txt = array('','','');
			break;
		case 'request' :
			$_dep = array(5,3,0);
			$_tit = array('주문의뢰','','');
			$_txt = array('','','');
			break;
	}

//일반 페이지인 경우
}else{
	$filename = basename($_SERVER['PHP_SELF']);
	switch($filename){
		case 'cart.php' : 
			$_dep = array(0,0,0);
			$_tit = array('장바구니','','');
			$_txt = array('','','');
			break;
		case 'orderform.php' : 
			$_dep = array(0,0,0);
			$_tit = array('주문/결제','','');
			$_txt = array('','','');
			break;
		case 'orderinquiryview.php' : 
			$_dep = array(0,0,0);
			$_tit = array('주문상세내역','','');
			$_txt = array('','','');
			break;
		case 'register.php' : 
			$_dep = array(0,0,0);
			$_tit = array('회원가입','약관동의','');
			$_txt = array('','','');
			break;
		case 'register_form.php' : 
			if($w==''){
				$_tit = array('회원가입','정보 입력','');
			}else{
				$_tit = array('정보수정','','');
			}
			$_dep = array(0,0,0);
			$_txt = array('','','');
			break;
		case 'register_result.php' : 
			$_dep = array(0,0,0);
			$_tit = array('회원가입','가입완료','');
			$_txt = array('','','');
			break;
		case 'register_email.php' : 
			$_dep = array(0,0,0);
			$_tit = array('이메일 인증','','');
			$_txt = array('','','');
			break;
		case 'mypage.php' : 
			$_dep = array(0,0,0);
			$_tit = array('MY PAGE','','');
			$_txt = array('','','');
			break;
		case 'orderinquiry.php' : 
			$_dep = array(0,0,0);
			$_tit = array('주문/배송조회','','');
			$_txt = array('','','');
			break;
		case 'faq.php' : 
			$_dep = array(5,2,0);
			$_tit = array('FAQ','','');
			$_txt = array('','','');
			break;
		case 'member_confirm.php' : 
			if($url=='register_form.php'){
				$_dep = array(0,0,0);
				$_tit = array('회원정보변경','','');
				$_txt = array('','','');
			}else if($url=='member_leave.php'){
				$_dep = array(0,0,0);
				$_tit = array('회원탈퇴','','');
				$_txt = array('','','');
				
			}
			break;
		case 'search.php' : 
			$_dep = array(0,0,0);
			$_tit = array('상품 검색','','');
			$_txt = array('','','');
			break;
		case 'itemuselist.php' : 
			$_dep = array(0,0,0);
			$_tit = array('상품후기','','');
			$_txt = array('','','');
			break;
		case 'itemqalist.php' : 
			$_dep = array(0,0,0);
			$_tit = array('상품Q&A','','');
			$_txt = array('','','');
			break;
	}
}

?>

<div id="_device_pc"></div>
<div id="_device_ta"></div>
<div id="_device_mo"></div>

<div id="wrap">
		
		<header id="header">
			
			<div id="slideBtn">
				<button><span></span></button>
				Open menu
			</div>
		
			<!-- s:gnb -->
			<ul id="gnb">
				<li class="<?pubGnb('1')?>">
					<a href="<?=DIR?>/sub1/sub1.php">메뉴</a>
					<ul>
						<li class="<?pubGnb('1,1')?>"><a href="<?=DIR?>/sub1/sub1.php">카테고리</a></li>
						<li class="<?pubGnb('1,2')?>"><a href="<?=DIR?>/sub1/sub2.php">카테고리</a></li>
						<li class="<?pubGnb('1,3')?>"><a href="<?=DIR?>/sub1/sub3.php">카테고리</a></li>
						<li class="<?pubGnb('1,4')?>"><a href="<?=DIR?>/sub1/sub4.php">카테고리</a></li>
						<li class="<?pubGnb('1,5')?>"><a href="<?=DIR?>/sub1/sub5.php">카테고리</a></li>
						<li class="<?pubGnb('1,6')?>"><a href="<?=DIR?>/sub1/sub6.php">카테고리</a></li>
					</ul>
				</li>
				<li class="<?pubGnb('2')?>">
					<a href="<?=DIR?>/sub2/sub1.php">메뉴</a>
					<ul>
						<li class="<?pubGnb('2,1')?>"><a href="<?=DIR?>/sub2/sub1.php">카테고리</a></li>
						<li class="<?pubGnb('2,2')?>"><a href="<?=DIR?>/sub2/sub2.php">카테고리</a></li>
						<li class="<?pubGnb('2,3')?>"><a href="<?=DIR?>/sub2/sub3.php">카테고리</a></li>
						<li class="<?pubGnb('2,4')?>"><a href="<?=DIR?>/sub2/sub4.php">카테고리</a></li>
						<li class="<?pubGnb('2,5')?>"><a href="<?=DIR?>/sub2/sub5.php">카테고리</a></li>
						<li class="<?pubGnb('2,6')?>"><a href="<?=DIR?>/sub2/sub6.php">카테고리</a></li>
					</ul>
				</li>
				<li class="<?pubGnb('3')?>">
					<a href="<?=DIR?>/sub3/sub1.php">메뉴</a>
					<ul>
						<li class="<?pubGnb('3,1')?>"><a href="<?=DIR?>/sub3/sub1.php">카테고리</a></li>
						<li class="<?pubGnb('3,2')?>"><a href="<?=DIR?>/sub3/sub2.php">카테고리</a></li>
						<li class="<?pubGnb('3,3')?>"><a href="<?=DIR?>/sub3/sub3.php">카테고리</a></li>
						<li class="<?pubGnb('3,4')?>"><a href="<?=DIR?>/sub3/sub4.php">카테고리</a></li>
						<li class="<?pubGnb('3,5')?>"><a href="<?=DIR?>/sub3/sub5.php">카테고리</a></li>
						<li class="<?pubGnb('3,6')?>"><a href="<?=DIR?>/sub3/sub6.php">카테고리</a></li>
					</ul>
				</li>
				<li class="<?pubGnb('4')?>">
					<a href="<?=DIR?>/sub4/sub1.php">메뉴</a>
					<ul>
						<li class="<?pubGnb('4,1')?>"><a href="<?=DIR?>/sub4/sub1.php">카테고리</a></li>
						<li class="<?pubGnb('4,2')?>"><a href="<?=DIR?>/sub4/sub2.php">카테고리</a></li>
						<li class="<?pubGnb('4,3')?>"><a href="<?=DIR?>/sub4/sub3.php">카테고리</a></li>
						<li class="<?pubGnb('4,4')?>"><a href="<?=DIR?>/sub4/sub4.php">카테고리</a></li>
						<li class="<?pubGnb('4,5')?>"><a href="<?=DIR?>/sub4/sub5.php">카테고리</a></li>
						<li class="<?pubGnb('4,6')?>"><a href="<?=DIR?>/sub4/sub6.php">카테고리</a></li>
					</ul>
				</li>
				<li class="<?pubGnb('5')?>">
					<a href="<?=DIR?>/sub5/sub1.php">메뉴</a>
					<ul>
						<li class="<?pubGnb('5,1')?>"><a href="<?=DIR?>/sub5/sub1.php">카테고리</a></li>
						<li class="<?pubGnb('5,2')?>"><a href="<?=DIR?>/sub5/sub2.php">카테고리</a></li>
						<li class="<?pubGnb('5,3')?>"><a href="<?=DIR?>/sub5/sub3.php">카테고리</a></li>
						<li class="<?pubGnb('5,4')?>"><a href="<?=DIR?>/sub5/sub4.php">카테고리</a></li>
						<li class="<?pubGnb('5,5')?>"><a href="<?=DIR?>/sub5/sub5.php">카테고리</a></li>
						<li class="<?pubGnb('5,6')?>"><a href="<?=DIR?>/sub5/sub6.php">카테고리</a></li>
					</ul>
				</li>
			</ul>
			<!-- e:gnb -->
			
		</header>
		
		<?php if(defined('_INDEX_')) {?>
		<section id="main">
		<?php }else{ ?>
		<section id="sub">
		<?php } ?>
			<div id="content">
				
