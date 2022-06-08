
  // To make Pace works on Ajax calls
  $(document).ajaxStart(function () {
    Pace.restart();
  });


 $(window).load(function () {
    $.ajax({
      url: strl+pathzi+usrdx+'/dash'+follower, 
    success: function (result) {
		
		new PNotify({
                                  title: 'Login Successful',
                                  text: 'Welcome to your '+stname+' dashboard!',
                                  type: 'success',
								  nonblock: {
                                      nonblock: true
                                  },
                                  styling: 'bootstrap3'
                              });
		
		
        $('.diex-page-now').html(result);
      },
	error:function (){
		
		new PNotify({
                                  title: 'Login Successful',
                                  text: 'Welcome to your '+stname+' dashboard!',
                                  type: 'success',
								  nonblock: {
                                      nonblock: true
                                  },
                                  styling: 'bootstrap3'
                              });
		
		
		
	new PNotify({
                                  title: 'Load Error',
                                  text: 'OOpse! Something went wrong, please check your internet connection and reload the page',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
	}
    });
  });

    
  $('.dashboard').click(function () {
    $.ajax({
      url: strl+pathzi+usrdx+'/dash'+follower, 
    success: function (result) {
        $('.diex-page-now').html(result);
      },
	error:function (){
	new PNotify({
                                  title: 'Load Error',
                                  text: 'OOpse! Something went wrong, please check your internet connection and reload the page',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
	}
    });
  });
    
 

 




 



 

    
  $('.usm-prof').click(function () {
    $.ajax({
      url: strl+pathzi+usrdx+'/usm-prof'+follower, 
    success: function (result) {
        $('.diex-page-now').html(result);
      },
	error:function (){
	new PNotify({
                                  title: 'Load Error',
                                  text: 'OOpse! Something went wrong, please check your internet connection and reload the page',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
	}
    });
  });
    







    
 

    
     $('.lout').click(function () {
    $.ajax({
      url: strl+pathzi+usrdx+'/lout'+follower,  
    success: function (result) {
        $('.diex-page-now').html(result);
      },
	error:function (){
	new PNotify({
                                  title: 'Load Error',
                                  text: 'OOpse! Something went wrong, please check your internet connection and reload the page',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
	}
    });
  }); 



 
