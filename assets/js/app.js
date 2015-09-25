
$(document).ready(function(){
 
	$('#loader').hide();
  
});
   
  	function show_div(div){
    	$(div).fadeTo(500,0.6);
  	}
  
  	function hide_div(div){
    	$(div).fadeOut(500);
  	}

  	// Alertes du bootstrap
	function show_alert(type,message){
    	$('#alerts').slideUp().empty().hide().append("<div class='alert alert-"+type+"'><button class='close' data-dismiss='alert'>×</button><p>" + message + "</p></div>").slideDown(500);
    	//$('.alert').slideDown(500);
    	$('.alert').find('.close').click(function(e){
      		e.preventDefault();
      		$('.alert').slideUp(); 
    	})
  	}
    
	// JGrowl notification
	function show_notification(type,message){
		if (type=='error') {
	    	$.growl.error({ message: message});  
	  	}
	  	if (type=='success') {
	  		$.growl.notice({ message: message});
	  	}
	}    

  