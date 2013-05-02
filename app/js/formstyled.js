// mail me for comment rudy@7dz.com.br

(function( $ ){
  $.fn.formPersona = function(options) {
	  
	  //default options
	  var defaults = {
//		inputsize: 'width:200px; height:50px',
//		inputwidth: '300px',
//		inputheight: '30px',
//		inputbg: 'white',
//		inputfontsize: '14px',
//		inputcolor: '#5c5c5c',
//		inputborder: '1px solid #5c5c5c',
//		inputpadding: '0 10px 0 10px',
//		inputline: '30px',
//		inputvalign: 'middle',
//		inputmargin: '0',
//		  
//		selectwidth: '300px',
//		selectheight: '30px',
//		selectbg: 'white',
//		selectfontsize: '14px',
//		selectcolor: '#5c5c5c',
//		selectborder: '1px solid #5c5c5c',
//		selectpadding: '0 10px 0 10px',
//		selectline: '30px',
//		selectvalign: 'middle',
//		selectmargin: '0',
		  
		radiowidth: 'auto',
		radioheight: 'auto',
		radiocolor: '',
		radiovalign: 'middle',
		radiobg: '',
		radiomleft: '5px',
		radiomright: '30px',
		radiomtop: '10px',
		
		checkwidth: '13px',
		checkheight: '13px',
		checkvalign: 'middle',
		checkbg: 'none',
		checkmleft: '30px',
		checkmright: '5px',
		checkmbottom: '0',
		
//		areawidth: '300px',
//		areaheight: '30px',
//		areabg: 'white',
//		areafontsize: '14px',
//		areacolor: '#5c5c5c',
//		areaborder: '1px solid #5c5c5c',
//		areapadding: '0 10px 0 10px',
//		arealine: '30px',
//		areavalign: 'middle',
//		areamargin: '0',
	  };
	  
	  var options = $.extend(defaults, options);
	  
	  return this.each(function() {
		var obj = $(this);
		
// -------->>>>> setting input text styles
		obj.find('input[type="text"]').css({'width': options.inputwidth, 'height': options.inputheight, 'background': options.inputbg, 'font-size': options.inputfontsize, 'color': options.inputcolor, 'border': options.inputborder, 'padding': options.inputpadding, 'line-height': options.inputline, 'vertical-align': options.inputvalign, 'margin': options.inputmargin});
		
// -------->>>>> setting textarea styles
		obj.find('textarea').css({'width': options.areawidth, 'height': options.areaheight, 'background': options.areabg, 'font-size': options.areafontsize, 'color': options.areacolor, 'border': options.areaborder, 'padding': options.areapadding, 'line-height': options.arealine, 'vertical-align': options.areavalign, 'margin': options.areamargin});
		
// -------->>>>> Select code
		// create spans to behave like select
//		var newSelect = '<span>Click to Select</span>'
//		$(newSelect).insertAfter(obj.find('select'));
//		// css style select
//		var getSizeH = options.selectpadding.split(' ');
//		var getSizeH = parseInt(getSizeH[1].replace('px','')*2)+parseInt(options.selectwidth.replace('px',''));
//		var getSizeV = options.selectpadding.split(' ');
//		var getSizeV = parseInt(getSizeV[0].replace('px','')*2)+parseInt(options.selectheight.replace('px',''));
//		obj.find('select').css({'width': getSizeH+"px", 'height': getSizeV+"px", 'border': 'none', 'top':'0', 'filter': 'alpha(opacity=0)', '-moz-opacity': '0', '-khtml-opacity': '0', 'opacity': '0', 'z-index': '20', 'position': 'absolute', 'margin': options.selectmargin
// });
//		// css style span
//		obj.find('select').next().css({'width': options.selectwidth, 'height': options.selectheight, 'background': options.selectbg, 'font-size': options.selectsize, 'color': options.selectcolor, 'border': options.selectborder, 'padding': options.selectpadding, 'line-height': options.selectline, 'vertical-align': options.selectvalign, 'text-align': 'left', 'display': 'inline-block', 'margin': options.selectmargin});
//
//		// copy select vaule into the span
//		$(obj).find('select').bind('change keyup', function() {
//			var newSelectText = $(this).find(":selected").text();
//			$(this).next().text(newSelectText);
//		});
		
		
// -------->>>>> Radio button code
		// create new buttons
		var newRadio = '<span></span>'
		$(newRadio).insertAfter(obj.find('input[type="radio"]'))
		obj.find('input[type="radio"]').css({'width': options.radiowidth, 'height': options.radioheight, 'color': options.radiocolor, 'vertical-align': options.radiovalign, 'margin-left': options.radiomleft, 'filter': 'alpha(opacity=0)', '-moz-opacity': '0', '-khtml-opacity': '0', 'opacity': '0', 'z-index': '20', 'padding': '0', 'position': 'relative' });
		
		//var splitradiomleft = options.radiomleft.split('p');
		//var splitradiow = options.radiowidth.split('p');
		//var radionewmargin = parseInt(splitradiomleft[0])+parseInt(splitradiow[0]);
		//alert(radionewmargin);
		//alert('p'+splitmleft[1]);
		
// -------->>>>> style new radio buttons
		obj.find('input[type="radio"]').next().css({'width': options.radiowidth, 'height': options.radioheight, 'background-image': options.radiobg, 'vertical-align': options.radiovalign, 'display': 'inline-block', 'margin-left': "-"+options.radiowidth, 'margin-right': options.radiomright, 'margin-top': options.radiomtop, 'padding': '0', 'z-index': '10', 'position': 'relative'});
		
		
				//muda posiçao do novo radio button
		// #################################
		// #################################
		// ENXUGAR CÓDIGO
		// #################################
		// #################################
		var getRadioH = parseInt(options.radioheight.replace('px',''));
			$(obj).find('input[type="radio"]').mousedown(function(){
				if ($(this).attr('checked')==true){
				$(this).next().css({'background-position':"0 -"+getRadioH*3+"px"});
				//$(this).next().css({'background-position': '0 -54px'});
				}
				else if($(this).attr('checked')==false)  {
				$(this).next().css({'background-position':"0 -"+getRadioH*2+"px"});	
				//$(this).next().css({'background-position': '0 -36px'});	
				}
			});
			$(obj).find('input[type="radio"]').mouseup(function(){
				if ($(this).attr('checked')==true){
				$(this).next().css({'background-position': '0 0'});
				}
				else if($(this).attr('checked')==false)  {
				$(obj).find('input[type="radio"]').next().css({'background-position':'0 0'});
				$(this).next().css({'background-position':"0 -"+getRadioH+"px"});
				//$(this).next().css({'background-position': '0 -18px'});	
				}
			}).mouseout(function() {
			if ($(this).attr('checked')==false){
				$(this).next().css({'background-position': '0 0'});
				} else if($(this).attr('checked')==true) {
				$(this).next().css({'background-position':"0 -"+getRadioH+"px"});
				//$(this).next().css({'background-position': '0 -18px'});	
				}
			});
			
// -------->>>>> create span for checkboxes
		var newCheckbox = '<span></span>'
		$(newCheckbox).insertAfter(obj.find('input[type="checkbox"]'))
		
// -------->>>>> style and hide old checkbox
		obj.find('input[type="checkbox"]').css({'width': options.checkwidth, 'height': options.checkheight, 'vertical-align': options.checkvalign, 'margin-left': options.checkmleft, 'margin-bottom': options.checkmbottom, 'filter': 'alpha(opacity=0)', '-moz-opacity': '0', '-khtml-opacity': '0', 'opacity': '0', 'z-index': '20', 'padding': '0', 'position': 'relative', 'vertical-align': 'middle', 'margin-top': "-"+options.checkmbottom });	

// -------->>>>> style new checkbox
		obj.find('input[type="checkbox"]').next().css({'width': options.checkwidth, 'height': options.checkheight, 'border': 'none', 'display': 'inline-block', 'vertical-align': 'middle', 'background': options.checkbg, 'margin-left': "-"+options.checkwidth, 'margin-right': options.checkmright, 'margin-bottom': options.checkmbottom, 'margin-top': "-"+options.checkmbottom});
		var checkValue = options.checkheight.replace('px','');

		
// -------->>>>> actions new chebox
		$(obj).find('input[type="checkbox"]').mouseover(function(){
				if ($(this).attr('checked')==false){
				$(this).next().css({'background-position': "0 -"+checkValue+"px"});
					$(obj).find('input[type="checkbox"]').mousedown(function(){
					$(this).next().css({'background-position': "0 -"+checkValue*2+"px"});
					}).mouseup(function(){
						if ($(this).attr('checked')==false){
						$(this).next().css({'background-position': "0 -"+checkValue*4+"px"});
						} else {
						$(this).next().css({'background-position': "0 -"+checkValue+"px"});	
						};
						});
				} else {
				$(this).next().css({'background-position': "0 -"+checkValue*4+"px"});	
				$(obj).find('input[type="checkbox"]').mousedown(function(){
					$(this).next().css({'background-position': "0 -"+checkValue*5+"px"});
					}).mouseup(function(){
						if ($(this).attr('checked')==false){
						$(this).next().css({'background-position': "0 -"+checkValue*4+"px"});
						} else {
						$(this).next().css({'background-position': "0 -"+checkValue*2+"px"});	
						};
						});
				};
		}).mouseout(function() {
			if ($(this).attr('checked')==false){
			$(this).next().css({'background-position': '0 0'});
			} else {
			$(this).next().css({'background-position': "0 -"+checkValue*3+"px"});
			};
		});
		
		
		
		});

  };
})( jQuery );
