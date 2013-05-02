(function($){
 $.fn.extend({
 
 	customStyle : function(options) {
	  if(!$.browser.msie || ($.browser.msie&&$.browser.version>6)){
	  return this.each(function() {
	  
			var currentSelected = $(this).find(':selected');
			$(this).after('<span class="customStyleSelectBox"><span class="customStyleSelectBoxInner">'+currentSelected.text()+'</span></span>').css({position:'absolute', opacity:0,fontSize:$(this).next().css('font-size')});
			var selectBoxSpan = $(this).next();
			var selectBoxWidth = parseInt($(this).width()) - parseInt(selectBoxSpan.css('padding-left')) -parseInt(selectBoxSpan.css('padding-right'));			
			var selectBoxSpanInner = selectBoxSpan.find(':first-child');
			selectBoxSpan.css({display:'inline-block'});
			selectBoxSpanInner.css({width:301, display:'inline-block'});
			var selectBoxHeight = parseInt(selectBoxSpan.height()) + parseInt(selectBoxSpan.css('padding-top')) - parseInt(selectBoxSpan.css('padding-bottom'));
			$(this).height(selectBoxHeight).change(function(){
				// selectBoxSpanInner.text($(this).val()).parent().addClass('changed');   This was not ideal
			selectBoxSpanInner.text($(this).find(':selected').text()).parent().addClass('changed');
				// Thanks to Juarez Filho & PaddyMurphy
			});
			
	  });
	  }
	}
 });
})(jQuery);



//##############################
// jQuery Radio/Checkbox Image Styling
// By Tristan Smith
// Date of Release: 23th June 2010
// Version: 1.0

/*
 USAGE:
	$(document).ready(function(){
		$(selector).rciStyle();
	}
 pos-checked-status
	0 - false - off
	1 - false - over
	2 - false - down
	3 - true  - off
	4 - true  - over
	5 - true  - down
*/


// Extend JQuery Functionality For Custom Radio Button Functionality
jQuery.fn.extend({
rciStyle: function()
{
	// Initialize with initial load time control state
	$.each($(this), function(){
		if($(this).find('input').length>0){
		$(this).attr("spec",'rcihold');
		var elm	=	$(this).find('input').get(0);
		$(elm).bind('change.rci',function(){
  		var leml = $(this).get(0);
  		var div = $(this).closest('[spec=rcihold]').get(0);
      if($(div).data('type') == 'radio')
    	{
    		$(leml).rciCheck(div);
    		$.each($("input[name='"+$(leml).attr("name")+"']"),function()
    		{
    			if(leml!=this)
    				$(this).rciUncheck(-1);
    		});
    	}else{
      if($(div).data("checked") == true)
    		$(leml).rciUncheck(div);
    	else
    		$(leml).rciCheck(div);  
      }
    });
		var elmType = $(elm).attr("type");
		var elmHeight = $(elm).height();
		var elmChecked = ($(this).find('input:checked').length > 0);
		$(this).children().css('display','none');
		$(this).data('type',elmType);
		$(this).data('checked',elmChecked);
		$(this).data('height',elmHeight);
		$(this).data('over',false);
		$(this).rciClear();
		}
	});
	$(this).mousedown(function() { $(this).rciEffect(); });
	$(this).mouseup(function() { $(this).rciHandle(); });
  $(this).mouseover(function() {$(this).data('over',true);$(this).rciHover(); });
  $(this).mouseout(function() {$(this).data('over',false);$(this).rciClear(); });
},
rciClear: function()
{
	if($(this).data("checked") == true)
	{
		$(this).css({backgroundPosition:"center -"+($(this).data("height")*3)+"px"});
	}
	else
	{
		$(this).css({backgroundPosition:"center 0"});
	}	
},
rciEffect: function()
{
	if($(this).data("checked") == true){
		$(this).css({backgroundPosition:"center -"+($(this).data("height")*5)+"px"});
	}
	else{
		$(this).css({backgroundPosition:"center -"+($(this).data("height")*2)+"px"});
	}
},
rciHover: function()
{
	if($(this).data("checked") == true){
		$(this).css({backgroundPosition:"center -"+($(this).data("height")*4)+"px"});
	}
	else{
		$(this).css({backgroundPosition:"center -"+($(this).data("height")*1)+"px"});
	}
},
rciHandle: function()
{
	var elm	=	$(this).find('input').get(0);
	
	
	if($(this).data('type') == 'radio')
	{
		$(elm).rciCheck(this);
		$.each($("input[name='"+$(elm).attr("name")+"']"),function()
		{
			if(elm!=this)
				$(this).rciUncheck(-1);
		});
		$(elm).change();
	}else{
  if($(this).data("checked") == true)
		$(elm).rciUncheck(this);
	else
		$(elm).rciCheck(this);  
  }
},
rciCheck: function(div)
{
	$(this).attr("checked",true);
	if($(div).data('over')){
	  $(div).data('checked',true).css({backgroundPosition:"center -"+($(div).data("height")*4)+"px"});
  }else{
	  $(div).data('checked',true).css({backgroundPosition:"center -"+($(div).data("height")*3)+"px"});
  }
	
},
rciUncheck: function(div)
{
	$(this).attr("checked",false);
	if(div != -1){
		if($(div).data('over')){
		  $(div).data('checked',false).css({backgroundPosition:"center -"+($(div).data("height")*1)+"px"});
    }else{
		  $(div).data('checked',false).css({backgroundPosition:"center 0"});
    }
	}
	else
		$(this).closest('[spec=rcihold]').data("checked",false).css({backgroundPosition:"center 0"});
}
});