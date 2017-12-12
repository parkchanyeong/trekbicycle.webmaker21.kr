/**************************************************
	
	Global
	
**************************************************/
pgc = function(page){
	if($('#'+page).length>0){
		return true;
	}else{
		return false;
	}
}
//check device for js
getdevice = function(){
	if($('#_device_pc').css('display')=='block'){
		return 'pc';
	}else if($('#_device_ta').css('display')=='block'){
		return 'ta';
	}else if($('#_device_mo').css('display')=='block'){
		return 'mo';
	}else{
		return null;
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

//slide button
slideBtn = {
	'init' : function(){
		this.action();
	},
	'action' : function(){
		var $ele = {
			'slideBtn' : $('#slideBtn button'),
		}
		$ele.slideBtn.on({
			'click' : function(){
				var vis = $ele.slideBtn.parent().hasClass('active');
				if(!vis){
					$ele.slideBtn.parent().addClass('active');
				}else{
					$ele.slideBtn.parent().removeClass('active');
				}
			}
		})
	}
}

//실행
$(document).ready(function(){
	
	popupAction.init();
	gotop.init();
	slideBtn.init();
	
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







