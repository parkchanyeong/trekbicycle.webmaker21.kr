<?php
if (!defined("_GNUBOARD_")) exit; // 개별 페이지 접근 불가
if (G5_IS_MOBILE) {
	include_once(G5_THEME_MSHOP_PATH.'/shop.tail.php');
	return;
}
$admin = get_admin("super");
?>


		</div>
	</section>

	<!-- s:footer -->
	<footer id="footer">
		<a href="<?=DIR?>/ajax/agreement.php" class="_ajaxBtn" title="이용약관">이용약관</a><br />
		<a href="<?=DIR?>/ajax/agreement.php" class="_ajaxBtn" title="개인정보취급방침">개인정보취급방침</a><br />
		<a href="<?=DIR?>/ajax/agreement.php" class="_ajaxBtn" title="이메일무단수집거부">이메일무단수집거부</a>
	</footer>
	<!-- e:footer -->
		
</body>
</html>



<script src="<?php echo G5_JS_URL; ?>/sns.js"></script>
<?php
include_once(G5_THEME_PATH.'/tail.sub.php');
?>
