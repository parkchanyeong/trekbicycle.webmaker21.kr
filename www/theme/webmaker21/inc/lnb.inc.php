<script type="text/javascript">
//GNB에서 해당 LNB 메뉴를 가져옴
lnbno = '<?=$_dep[0]?>';
$(document).ready(function(){
	var html = $('#gnb > li').eq(lnbno-1).html();
	html = '<li>' + html;
	html = html + '</li>';
	$('#lnb').html(html);
})
</script>
<ul id="lnb"></ul>