						 $(window).load(function() {
							$("#flexiselDemo3").flexisel({
								visibleItems:1,
								animationSpeed: 1000,
								autoPlay: true,
								autoPlaySpeed: 5000,    		
								pauseOnHover: true,
								enableResponsiveBreakpoints: true,
								responsiveBreakpoints: { 
									portrait: { 
										changePoint:480,
										visibleItems:1
									}, 
									landscape: { 
										changePoint:640,
										visibleItems:1
									},
									tablet: { 
										changePoint:768,
										visibleItems:1
									}
								}
							});
							
						});

	
	
	//get countries
function countryz() {
	$("#natcon").show();
	jQuery.ajax({
	url: following+"getstate"+follower,
	data:'dx='+$("#country").val(),
	type: "POST",
	success:function(data){
		$("#snatiti").html(data);
		$("#natcon").hide();
		
		

   
  
	},
	error:function (){
		
		$("#nerror").show().fadeOut(2500).html('Oppse.. Something went wrong, please check your network and try again');}
	});
}

	

	
    $(document).ready(function() {

        //Vertical Tab
        $('#parentVerticalTab').easyResponsiveTabs({
            type: 'vertical', //Types: default, vertical, accordion
            width: 'auto', //auto or any width like 600px
            fit: true, // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            tabidentify: 'hor_1', // The tab groups identifier
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#nested-tabInfo2');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
    });


//get sub categories
function subcat() {
	$("#catcon").show();
	jQuery.ajax({
	url: following+"getsubcat"+follower,
	data:'dx='+$("#pcat").val(),
	type: "POST",
	success:function(data){
		$("#scatiti").html(data);
		$("#catcon").hide();
		
		

   
  
	},
	error:function (){
		
		$("#error").show().fadeOut(2500).html('Oppse.. Something went wrong, please check your network and try again');}
	});
}



