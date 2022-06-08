<?php

if(isset($_POST['a']) ){

	$action = $krypton->decrypt($_POST['a']) ;

	switch($action){
		
			
		case "gen":
			
			?>
			              
                               
                 <h3>Units you belong to</h3>
                 <hr>
                 
                 <h4>You will be voting in these units</h4>
                 <hr>
				 <?php foreach ($unit as $un){
					 ?>
					 <p> <?php echo(getunitname($un)); 
						 
						 
	$voted = checkvote($me['dxid'], $un);
		
		if(!empty($voted)){
			echo('  <i class="fa fa-check-circle"></i> ');
						 
		}?> </p>
					 
				 <?php } ?>
                 
                           
			
			<?php
			
			break;
		
				
			
	}
	
}




?>
						   
						    
						   