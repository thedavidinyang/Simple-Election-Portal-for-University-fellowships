<?php
if(isset($_POST['a']) ){
	

	$uniz = $_POST['a'] ;
	$unit = $krypton->decrypt($_POST['a']) ;
	
	if(!empty($unit)){
		
			$stmt = $db_con->prepare("SELECT * FROM diex_unit WHERE id=:user");
$stmt->execute(['user' => $unit]);
$count = $stmt->rowCount();
$row = $stmt->fetch();
	
	
	$voted = checkvote($me['dxid'], $unit);
		
		if(empty($voted) && !empty($count)){
			
			$its = explode(',', $row['itb']);
			$offices = explode(',', $row['ofice'])
		

	?>
	

<h4><i class="fa fa-bank"></i> <?php echo($row['name']); ?></h4>
            
                                   <div class="col-sm-6">
                        <div class="list-group">
                            <span class="list-group-item active">
                                <h4 class="list-group-item-heading"><i class="fa fa-exclamation-circle"></i> Info</h4>
                                
                                
                                
                                 	<ol> 
					
					<li> Enter your vote in the following format: <b>Position: Individuals name. </b> <br>
	<i>eg: Cordinator: David Udo </i> </li>
					<li> Seperate each vote with a <b> comma (,)</b> <br>
<i>eg: Cordinator: David Udo, Assitant Cordinator: David Inyang</i></li>
					
					</ol>
							    <div class="divider-dashed"></div>
								 
								 <h4>Members on Industrial Attatchment (IT)</h4>
								<?php foreach ($its as $its){	 ?>
								<p> <?php 	echo(ucwords($its)); }?> </p>
								
							    <div class="divider-dashed"></div>
								 
								 <h4>Positions in <?php echo($row['name']); ?> Unit</h4>
								<?php foreach ($offices as $offices){	 ?>
								<p> <?php 	echo(ucwords($offices)); }?> </p>
								
									 
                           
                           
                           </strong> </p>
                            </span>
                            
                        </div>
                    </div>
                    
             
                    <div class="col-sm-6">
                        <div class="list-group">
                            <span class="list-group-item ">
                                <h4 class="list-group-item-heading"><i class="fa fa-check-circle"></i> Ballot Box</h4>
                              
                              
                                      <form class="form-horizontal" id="dmessages">
                                      
                                         <div class="ln_solid"></div>

                  <div class="form-group">
                    
                    <div class="col-md-12 col-sm-12 col-xs-12">
                     
                     
                  
                      <textarea name="ballot" id="ball" class="resizable_textarea form-control editor-wrapper" placeholder="
                      	* Enter your vote in the following format: Position: Individuals name. eg: 
                      	Cordinator: David inyang
                      		
                      	
                      *Enter each vote on a new line, eg: 
                      	Cordinator: David Udo
                      	Assitant Cordinator: David Inyang"></textarea>
                    </div>
                  </div>
                      

                 <input type="hidden" value="<?php echo($krypton->encrypt($unit))?>" name="unit" >
                    <input type="hidden" name="u" value="cast" >
                     
                      <div class="divider-dashed"></div>

                      <div class="form-group" align="center">
                            <button  type="button" class="btn btn-success btn-lg" id="senddx" onclick="dxmessages()" > <i class="fa fa-check-circle"></i> Cast Vote</button>
                            </div>
                     
                    </form>
                            </span>
                            
                        
                            
                        </div>
                    </div>            
                             
                                <script>
									
									$('#ball').on('change, keyup', function() {
    var currentInput = $(this).val();
    var fixedInput = currentInput.replace(/[^A-Za-z ,:]/g, '');
    $(this).val(fixedInput);
    //console.log(fixedInput);
});
//load page messages services
function dxmessages() {
	document.getElementById("senddx").disabled="disabled";
	$("#senddx").html('<span class="fa fa-circle-o-notch fa-spin"></span> &nbsp; Sending..');
		var data = $("#dmessages").serialize();
	jQuery.ajax({
	url: "1261622387512781028128758912875128712581258",
	data:data,
	type: "POST",
	success:function(data){
	
	
	if(data==1){
		
		new PNotify({
											title: 'Vote Successful',
											text: '',
											type: 'success',
											nonblock: {
												nonblock: true
											},
											styling: 'bootstrap3'
										});
	
		
			$.ajax({
			url: "1261622387512781028128758912875128712581258",
			data: {u:'voted'},
			type: "POST",
			success: function (result) {
				
		$("#summ").html('<i class="fa fa-check-circle"></i> ');
				$('.sum').html(result);
			},
			error:function (){
				
		$("#summ").html('<i class="fa fa-check-circle"></i> ');
				new PNotify({
					title: 'Load Error',
					text: 'OOpse! Something went wrong, please check your internet connection and reload the page',
					type: 'error',
					styling: 'bootstrap3'
				});
			}
		});
			


		} else{
				new PNotify({
											title: 'Oopse...! Looks like you missed something',
											text: data,
											type: 'error',
											//nonblock: {
											//     nonblock: true
											// },
											styling: 'bootstrap3'
										});
					document.getElementById("senddx").disabled="";
	$("#senddx").html('<i class="fa fa-check-circle"></i> Cast Vote');
		
		};

	
	
	
	
	
;

		
	},
	error:function (){
		
			new PNotify({
                                  title: 'Network Error!',
                                  text: 'Please check your network connection and try again',
                                  type: 'error',
								  //nonblock: {
                                 //     nonblock: true
                                 // },
                                  styling: 'bootstrap3'
                              });
					document.getElementById("senddx").disabled="";
	$("#senddx").html('<i class="fa fa-check-circle"></i> Cast Vote');
		}
	});
}
</script>
                      
                    
                   
                  <?php
			
		} else{
			
			
			?>
			
			 
              <div class=" col-lg-12 ">
              
              <h1 align="center"> <i class="fa fa-check-circle"></i></h1>
              <br>
              <h1 align="center"> You have voted in this unit already</h1>
               <br> <br> <br>  <br> <br> <br> 
              
				 </div>
				 
				 
           
			
			<?php
			
		}
		
			} else{
		
		
		include('404.php');
	}
	

	
} else{
		
		
		include('404.php');
}

?>