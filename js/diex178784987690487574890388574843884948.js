//start pagemanager loader



//load slide manager
function slidemanager() {
	$("#diexpageloader").show();
	jQuery.ajax({
	url: follow+"slidemanager"+follower,
	data:'dx='+$("#slider").val(),
	type: "POST",
	success:function(data){$("#backbutton").show();
		$("#diexloader").html(data);
		$("#diexpageloader").hide();
				document.getElementById("pagetable").style.display = "none";

		
	},
	error:function (){}
	});
}

//slide uploader
function sloader() {
	$("#diexpageloader").show();
	jQuery.ajax({
	url: follow+"sloader"+follower,
	data:'dx='+$("#slider").val(),
	type: "POST",
	success:function(data){
		$("#slides").hide();
		$("#diexloader").html(data);
		$("#diexpageloader").hide();
				document.getElementById("pagetable").style.display = "none";

		
	},
	error:function (){}
	});
}


//load change dp
function changedp() {
	$("#diexpageloader").show();
	jQuery.ajax({
	url: follow+"dpmanager"+follower,
	data:'dx='+$("#dp").val(),
	type: "POST",
	success:function(data){$("#backbutton").show();
		$("#diexloader").html(data);
		$("#diexpageloader").hide();
				document.getElementById("pagetable").style.display = "none";

		
	},
	error:function (){}
	});
}







//load page manager services




//load page manager services updater
function loadmsupdater() {
	$("#diexpageloader").show();
	mse = $("#mserve")
	jQuery.ajax({
	url: follow+"mservicesupdate"+follower,
	data:'dx='+$("#mserve").val(),
	type: "POST",
	success:function(data){$("#backbutton").show();
		$("#diexloader").html(data);
		$("#diexpageloader").hide();
				document.getElementById("pagetable").style.display = "none";

		
	},
	error:function (){}
	});
}









//load page single messages services
function smessage() {
	$("#diexpageloader").show();
	jQuery.ajax({
	url: follow+"singlemessage"+follower,
	data:'dx='+$("#dp").val(),
	data:'dx='+$("#dp").val(),
	type: "POST",
	success:function(data){$("#backbutton").show();
		$("#diexloader").html(data);
		$("#diexpageloader").hide();
				document.getElementById("pagetable").style.display = "none";

		
	},
	error:function (){}
	});
}





//load page verify




//page verify resend code


//page verify 





//service update 



//load backbutton
function backbutton() {
	$("#diexpageloader").show();
	jQuery.ajax({
	url: follow+"loadpagemanager"+follower,
	data:'dx='+$("#slider").val(),
	type: "POST",
	success:function(data){
		$("#diexloader").html(data);
		$("#diexpageloader").hide();
		$("#pagetable").show();
		$("#backbutton").fadeOut(1000);
	},
	error:function (){}
	});
}


//page manager loader ends here 


//page maker starts
function diexuba(){
	document.getElementById("diexsub").disabled="";
	}

function showhint(str) {
	if (str.lenght == 0) {
		document.getElementById("txtHint").innerHTML = "";
		return;
	} else {
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status ==200) {
			document.getElementById("txtHint").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", reqUrl+"getsubcat.php?q="+str, true);
	xmlhttp.send();
}
}


function ccd(pcat) {
	if (pcat.lenght == "") {
		document.getElementById("txtHint").innerHTML = "";
		return;
	} else {
		
		if (window.XMLHttpRequest) {
			xmlhttp = new XMLHttpRequest();
		} else{
			xmlhttp = new ActiveXOject("Microsoft.XMLHTTP");
		}
		
		
		xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status ==200) {
			document.getElementById("scati").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET", reqUrl+"getsubcat.php?q="+pcat, true);
	xmlhttp.send();
}
}


//page maker starts


//create page 

function relocatepage() {
	document.getElementById("diexsub").disabled="disabled";
	document.getElementById("diexreset").disabled="disabled";
	document.getElementById("diexcancel").disabled="disabled";
	 $("#diexsub").html('<span class="fa fa-circle-o-notch fa-spin"></span> &nbsp; Saving...');
	var data = $("#pagemaker").serialize();
	jQuery.ajax({
	url: follow+"relocate"+follower,
	data : data,
	type: "POST",
	success:function(data){
		$("#diexpageloader").hide();
		
		if(data==1){
		setTimeout(' window.location.href = "./pagemanager.php"; ',4000);
		} else{
			
		$("#connecterror").show().fadeOut(15000);
		document.getElementById("diexsub").disabled="";
		 $("#diexsub").html('Submit');
		 document.getElementById("diexreset").disabled="";
	document.getElementById("diexcancel").disabled="";
		};

		
	},
	error:function (){
		
		}
	
	});
	return false;
}



//check page username
function checkuname() {
	$("#unicon").show();
	jQuery.ajax({
	url: follow+"checkpageusername"+follower,
	data:'dx='+$("#uname").val(),
	type: "POST",
	success:function(data){
		$("#unicon").hide();
		
		
		
		if(data==1){
			$("#dxno").hide()
			$("#dxyes").show()
		} else if( data==2){
			
				 $("#dxno").show().html('Username can contain only lower case alphabets and numbers');
				 $("#dxyes").hide()

			}else if( data==3){
			
				 $("#dxno").show().html('Username minimum characters is 3');
				 $("#dxyes").hide()

			}
		 else{

			$("#dxno").show()
			$("#dxyes").hide()
		
		};
	},
	error:function (){}
	});
}

//get sub categories
function subcat() {
	$("#catcon").show();
	jQuery.ajax({
	url: follow+"getsubcat"+follower,
	data:'dx='+$("#pcat").val(),
	type: "POST",
	success:function(data){
		$("#scatiti").html(data);
		$("#catcon").hide();
		
		

   
  
	},
	error:function (){}
	});
}








//get states from country
function country() {
	$("#conicon").show();
	jQuery.ajax({
	url: follow+"loadpagestate"+follower,
	data:'dx='+$("#pcountry").val(),
	type: "POST",
	success:function(data){
		$("#statico").html(data);
		$("#conicon").hide();
	},
	error:function (){}
	});
}

//get city from state
function state() {
	$("#stateicon").show();
	jQuery.ajax({
	url: follow+"loadpagecity"+follower,
	data:'dx='+$("#pstate").val(),
	type: "POST",
	success:function(data){
		$("#citico").html(data);
		$("#stateicon").hide();
	},
	error:function (){}
	});
}
//load address bar
function city() {
	$("#cityicon").show();
	jQuery.ajax({
	url: follow+"loadpageaddress"+follower,
	data:'dx='+$("#pcity").val(),
	type: "POST",
	success:function(data){
		$("#addrico").html(data);
		$("#cityicon").hide();
		document.getElementById("diexsub").style.display = "";
	},
	error:function (){}
	});
}

function pagemaker() {
	
	var data = $("#pagemaker").serialize();
	$("#cityicon").show();
	jQuery.ajax({
	url: follow+"loadpageaddress"+follower,
	data:'dx='+$("#pcity").val(),
	type: "POST",
	success:function(data){
		$("#addrico").html(data);
		$("#cityicon").hide();
		document.getElementById("diexsub").style.display = "";
	},
	error:function (){}
	});
}



function dxrstno()
{
   document.getElementById("diexsub").style.display = "none"; 

; 
   return true;
}
var FirstLoading = true;







//pagemanker submit button
function diexpageClicked()
{
   document.getElementById("diexsub").style.display = "none"; 
    document.getElementById("diexreset").style.display = "none"; 
	 document.getElementById("diexcancel").style.display = "none"; 
   document.getElementById("diexsrs").style.display = ""; 
   document.getElementById("diexrcancel").style.display = ""; 
   document.getElementById("diexrreset").style.display = ""; 
   return true;
}
var FirstLoading = true;



function RestoreSubmitButton()
{
   if( FirstLoading )
   {
      FirstLoading = false;
      return;
   }
   document.getElementById("diexb").style.display = ""; 
       document.getElementById("diexreset").style.display = ""; 
	 document.getElementById("diexcancel").style.display = ""; 
   
   document.getElementById("diexsrs").style.display = "none"; 
      document.getElementById("diexrcancel").style.display = "none"; 
   document.getElementById("diexrreset").style.display = "none";
}
// To disable restoring submit button, disable or delete next line.
document.onfocus = RestoreSubmitButton;
// end page maker submit button

//page maker ends





//slide manager
function viewimage() {
	
	var sid = data;
	$("#load"+sid).show();
	jQuery.ajax({
	url: follow+"loadpagemanager"+follower,
	data:'dx='+$("#slider").val(),
	type: "POST",
	success:function(data){
		$("#diexloader").html(data);
		$("#diexpageloader").hide();
		$("#pagetable").show();
		$("#backbutton").fadeOut(1000);
	},
	error:function (){}
	});
}

//edit profile 

function saveprofile() {

	 $("#savep").html('<span class="fa fa-circle-o-notch fa-spin"></span> &nbsp; Saving...');
	var data = $("#profilee").serialize();
	jQuery.ajax({
	url: follow+"relocate"+follower,
	data : data,
	type: "POST",
	success:function(data){
		$("#diexpageloader").hide();
		
		if(data==1){
	 $("#savep").html('<span class="fa fa-check"></span> &nbsp; Saved.!');
		} else{
			
		$("#error").show().fadeOut(15000).html('<i class="fa fa-warning"></i>'+data);
			 $("#savep").html('<span class="fa fa-upload"></span> &nbsp; Update profile');

		
		};

		
	},
	error:function (){
				$("#error").show().fadeOut(15000).html('<i class="fa fa-warning"></i> Oppse...! Something went wrong, please check your network and try again');
							 $("#savep").html('<span class="fa fa-upload"></span> &nbsp; Update profile');


		}
	
	});
	return false;
}



//edit password 

function npassword() {

	 $("#change").html('<span class="fa fa-circle-o-notch fa-spin"></span> &nbsp; Saving...');
	var data = $("#changepassword").serialize();
	jQuery.ajax({
	url: follow+"relocate"+follower,
	data : data,
	type: "POST",
	success:function(data){
		$("#diexpageloader").hide();
		
		if(data==1){
	 $("#change").html('<span class="fa fa-check"></span> &nbsp; Saved.!');
		} else{
			
		$("#passerror").show().fadeOut(15000).html('<i class="fa fa-warning"></i>'+data);
			 $("#change").html('<span class="fa fa-lock"></span> &nbsp; Update profile');

		
		};

		
	},
	error:function (){
				$("#passerror").show().fadeOut(15000).html('<i class="fa fa-warning"></i> Oppse...! Something went wrong, please check your network and try again');

		}
	
	});
	return false;
}