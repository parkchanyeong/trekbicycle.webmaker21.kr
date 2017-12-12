/**************************************************
	
	Global
	
**************************************************/
function pgc(page){
	if($('#'+page).length>0){
		return true;
	}else{
		return false;
	}
}
//전역변수 초기화
$ELE = {
	'win' : $(window),
	'doc' : $(document),
	'html' : $('html,body')
}
VARS = {
	'ani' : {
		'speed' : 400,
		'easing' : 'easeInOutExpo'
	}
}
//전역변수 추가 함수
_addvar = {
	'ele' : function(arr){
		for(key in arr){
			$ELE[key] = arr[key];			
		}
	},
	'vars' : function(arr){
		for(key in arr){
			VARS[key] = arr[key];			
		}
	}
}

/**************************************************
	layout
**************************************************/
//ajax popup
popupAction = {
	'init' : function(){
		this.action();
	},
	'action' : function(){
		var $ele = {
			'bg' : $('#popBG'),
			'pop' : $('#popup'),
			'tit' : $('#popup .popTit strong'),
			'cont' : $('#popup .popCont'),
			'close' : '#popup ._popClose'
		}
		var vars = {
			'css' : {
				'margin' : {
					'top' : $ele.pop.css('margin-top'),
					'left' : $ele.pop.css('margin-left')
				},
				'pos' : {
					'left' :'50%',
					'top' :'50%'
				},
				'width' : $ele.pop.css('width'),
				'height' : $ele.pop.css('height')
			}
		}

		//윈도우 사이즈 체크하여 값 구함
		var anivar = {};
		var getpos = function(){
			anivar = {
				'ml' : vars.css.margin.left,
				'mt' : vars.css.margin.top,
				'left' : vars.css.pos.left,
				'top' : vars.css.pos.top,
				'width' : vars.css.width,
				'height' : vars.css.height
			}
			ww = $ELE.win.width();
			wh = $ELE.win.height();

			if(parseInt(ww)<=parseInt(vars.css.width)+100){
				anivar.ml = '0';
				anivar.left = '0';
				anivar.width = '100%';
			}
			if(parseInt(wh)<=parseInt(vars.css.height)+100){
				anivar.mt = '0';
				anivar.top = '0';
				anivar.height = '100%';
			}
		}

		//팝업창 열기
		var showpop = function(e,$this){
			e.preventDefault();

			var tit = $this.attr('title');
			var url = $this.attr('href');
			var now = new Date();
			var date = now.getTime(); //캐시 영향 받지 않도록 Date를 get 변수로 함께 Call

			$ele.bg.fadeIn(VARS.ani);
			$ele.pop.hide().fadeIn(VARS.ani);

			$ele.tit.text(tit);
			$ele.cont.load(url+'?date='+date);

			$ELE.html.css({
				'overflow' : 'hidden'
			})
		}
		$ELE.doc.on('click','*._ajaxBtn',function(e){
			showpop(e,$(this));
		})

		//팝업창 닫기
		var closepop = function(e){
			e.preventDefault();
			$ele.bg.fadeOut(vars.ani);
			$ele.pop.fadeOut(vars.ani);
			$ele.cont.empty();

			$ELE.html.css({
				'overflow' : 'auto'
			})
		}
		$ELE.doc.on('click',$ele.close,function(e){
			closepop(e);
		})
		$ele.bg.on({
			 'click' : function(e){
				 closepop(e);
			 }
		 })

		//팝업창 리사이징
		var resizing = function(){
			var ww = $ELE.win.width();
			var wh = $ELE.win.height();
			getpos();
			$ele.pop.stop().animate({
				'margin-top' : anivar.mt,
				'margin-left' : anivar.ml,
				'top' : anivar.top,
				'left' : anivar.left,
				'width' : anivar.width,
				'height' : anivar.height
			},VARS.ani);
		}
		$ELE.win.on({
			'load resize' : function(){
				resizing();
			}
		})
	}
}

//slideMenu
slideMenu = {
	'init' : function(){
		this.action();
	},
	'action' : function(){
		var $ele = {
			'win' : $(window),
			'doc' : $(document),
			'slide' : $('#slideMenu'),
			'slideBg' : $('#slideMenuBg'),
			'contentWrap' : $('#contentWrap'),
			'content' : $('#secWrap'),
			'btn' : $('#slideBtn'),
			'closeBtn' : $('#slideClose')
		}
		var vars = {
			'mar' : '85%'
		}
		var openSlide = function(e){
			e.preventDefault();
			var disp = parseInt($ele.slide.css('margin-left'));

			if(disp<0){
				$ele.slide.animate({
					'margin-left' : 0
				},VARS.ani);
				$ele.slideBg.fadeIn(VARS.ani);
				$ele.content.animate({
					'margin-left' : vars.mar
				},VARS.ani);
			}else{
				$ele.slide.animate({
					'margin-left' : '-'+vars.mar
				},VARS.ani);
				$ele.slideBg.fadeOut(VARS.ani);
				$ele.content.animate({
					'margin-left' : 0
				},VARS.ani);
			}
		}
		var resetSlide = function(){
			$ele.slide.css({
				'width' : vars.mar,
				'margin-left' : '-'+vars.mar
			});
		}
		var resizeSlide = function(){
			var visible = $ele.btn.is(':visible');

			if(!visible){
				$ele.slide.css({
					'margin-left' : '-'+vars.mar
				});
				$ele.slideBg.hide();
				$ele.content.css({
					'margin-left' : 0
				});
			}
		}
		$ELE.win.on({
			'resize' : function(){
				resizeSlide();
			}
		});
		$ele.btn.on({
			'click' : function(e){
				openSlide(e);
			}
		});
		$ele.closeBtn.on({
			'click' : function(e){
				openSlide(e);
			}
		});
		$ele.slideBg.on({
			'click' : function(e){
				openSlide(e);
			}
		});
		resetSlide();
	}
}

//gnb
gnb = {
	'init' : function(){
		this.action();
	},
	'action' : function(){
		var $ele = {
			'win' : $(window),
			'doc' : $(document),
			'gnb' : $('#gnb'),
			'd1' : $('#gnb > li > a')
		}
		var auto_open = function(){
			$('> li.active',$ele.gnb).find('a').click();
		}
		var d2_open = function(e,$this){
			var $ele2 = {
				'd2' : $this.parent().children('ul'),
				'd2_sib' : $this.parent().siblings().children('ul'),
			}
			var vars2 = {
				'disp' : $ele2.d2.is(':visible'),
				'd2_count' : $ele2.d2.children('li').length,
			}
			if(vars2.d2_count>0){
				e.preventDefault();
				if(vars2.disp){
					$ele2.d2.slideUp(VARS.ani);
					$this.parent('li').removeClass('active');
				}else{
					$ele2.d2.slideDown(VARS.ani);
					$ele2.d2_sib.slideUp(VARS.ani);
					$this.parent('li').addClass('active').siblings().removeClass('active');
				}
			}
		}
		$ELE.win.on({
			'load' : function(){
				auto_open();
			}
		})
		$ele.d1.on({
			'click' : function(e){
				d2_open(e,$(this));
			}
		});
	}
}

//Go Top
gotop = {
	'init' : function(){
		this.action();
	},
	'action' : function(){
		var $ele = {
			'btn' : $('#gotop'),
		}
		$ele.btn.on({
			'click' : function(e){
				e.preventDefault();
				$ELE.html.animate({
					'scrollTop' : 0
				},VARS.ani)
			}
		})
	}
}

//실행
$(document).ready(function(){
	
	popupAction.init();
	slideMenu.init();
	gnb.init();
	gotop.init();
	
	//Datepicker
	$('*[datepicker]').datepicker();
});



/**************************************************
	main
**************************************************/
//visual
visual = {
	'init' : function(){
		this.action();
	},
	'action' : function(){
		var $ele = {
			'roll' : $('.visual .roll'),
		}
		var rolling = function(){
			$ele.roll.bxSlider({
				'auto' : true,
				'pager' : false,
				'useCSS' : false,
				'easing' : VARS.ani.easing,
				'speed' : VARS.ani.speed
			});
		}
		rolling();
	}
}

//실행
$(document).ready(function(){
	if(pgc('main')){
		
		visual.init();
		
	}
});







