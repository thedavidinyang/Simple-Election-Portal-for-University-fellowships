
         <!-- page content -->
        <div class="right_col" role="main">
          <!-- top tiles -->
          <div class="">
            <div class="page-title" >
              <div class="title_left">
              <h3><i class="fa fa-user"></i> Hello <?php echo(ucwords($me['name'])) ; ?>  <small> <?php
										if(empty($me['type'])){
											
											echo('<span class="label label-primary">Admin Dashboard</span>');
										} else{
											
											echo('<span class="label label-primary">Member Dashboard</span>');
										}
										
										?>  </small></h3>
              </div>


            </div>
         </div>

            <div class="clearfix"></div>
          <hr>
<?php if(empty($me['type'])){ ?>
          <!-- start profile dashboard -->
           <div class="row">



            <div class="row top_tiles">
              <div class="animated flipInX col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats shadz"  style="background: linear-gradient(60deg, #ffa726, #fb8c00); color: #fff; ">
                <div class="icon" style="color: #fff"><i class="fa fa-check-circle"></i></div>
                  <div class="count"><?php echo(countvotes()) ; ?></div>
                  <h3 style="color: #fff">Total votes </h3>

                </div>
              </div>

              <div class="animated flipInX col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats shadz"  style="background: linear-gradient(60deg, #66bb6a, #43a047); color: #fff; ">
                  <div class="icon" style="color: #fff"><i class="fa fa-briefcase"></i></div>
                  <div class="count"> <?php echo(tunits()) ; ?></div>
                  <h3 style="color: #fff">Total units</h3>

                </div>
              </div>

              
              
            
             
                  
              <!-- admin total user-->
                 <div class="animated flipInX col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="tile-stats shadz"  style="background: linear-gradient(60deg, #10b7cc, #2a51c4); color: #fff; ">
                  <div class="icon" style="color: #fff"><i class="fa fa-users"></i></div>
                  <div class="count"> <?php echo(tmemb()) ; ?></div>
                  <h3 style="color: #fff">Total users</h3>

                </div>
              </div>
              
            </div>


            </div>
                  <?php } ?>

             <div class="row">

            
                    
                    
           
          

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><i class="fa fa-user"></i> Account Summary </h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content" >

                    <div class="dashboard-widget-content">


                        <div class="block">
                          <div class="block_content">
                            <h2 class="title">
								<p>Full Name: <?php echo ucwords($me["name"]) ?></p>
                                          </h2>
							  <p class="excerpt">Phone number: <?php echo $me["phone"] ; ?> </p>
                                 <p class="excerpt">Level: <?php echo $me['lev'] ; ?> </p>




                          </div>
                        </div>

                      </div>
                </div>
              </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2><i class="fa fa-bank"></i> Voting Instructions </h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content" >

                    <div class="dashboard-widget-content">
					
					<ol> 
					
					<li> Click the link of the unit you want to vote in.</li>
					<li> Enter your vote in the following format: <b>Position: Individuals name. </b> <br>
	<i>eg: Cordinator: David Inyang </i> </li>
					<li> Seperate each vote with a <b> comma (,)</b> <br>
<i>eg: Cordinator: David Udo, Assitant Cordinator: David Inyang </i></li>
					
					</ol>


                        <div class="block">
                          <div class="block_content" >



							              </div>
                        </div>

                      </div>
                </div>
              </div>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2> <span id="summ"><i class="fa fa-check-circle"></i></span>  Vote Now </h2>

                  <div class="clearfix"></div>
                </div>
                <div class="x_content" >

                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                      <ul  class="nav nav-pills " role="tablist">


                        <li role="presentation" class="active"><button class="btn btn-primary"><a href="#tab_content1" id="home-tab" class="gen" role="tab" data-toggle="tab" aria-expanded="true"  style="color: #FFFFFF"><i class="fa fa-cogs"></i> Summary </a> </button>
                        </li>

 <?php foreach ($unit as $uniz){
					 ?>
					 
					  <li role="presentation" class=""><button type="button" class="btn btn-primary" onClick="vote(this.value)" value="<?php echo($krypton->encrypt($uniz))?>"><i class="fa fa-bank"></i> <?php echo(getunitname($uniz)); ?></button>
					  
					
						
					
					 
				 <?php } ?>
                       
                     


                      </ul>

                             <br>
                             
                             
                             <br>
                           
                      <div id="myTabContent" class="tab-content">
                        <div role="tabpanel" class="tab-pane fade active in" id="tab_content1" aria-labelledby="home-tab">
                           <div class="sum">
                            
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
                 
                
                           
       
                          
						  </div>

                        </div>






                   
                           <!-- /page content -->
<script>
	
	function vote (value) {
		$("#summ").html('<i class="fa fa-circle-o-notch fa-spin"></i> ');
		$.ajax({
			url: "1261622387512781028128758912875128712581258",
			data: {u:'vote', a:value},
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
	}; 
	
	
	$('.gen').click(function () {
		$("#summ").html('<i class="fa fa-circle-o-notch fa-spin"></i> ');
		$.ajax({
			url: "1261622387512781028128758912875128712581258",
			data: {u:'gen', a:'<?php echo($krypton->encrypt('gen'))?>'},
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
	}); 
	
	
	

</script>
               
                       
                        
                       


                      </div>
                    </div>
                             
                      <div class="clearfix"></div>
                </div>
              </div>
            </div>
          
               
          
          



              


          <!-- news box end start message box -->



            </div>


            </div>


           </div>


<!-- end profile dashboard div -->


            <!-- profile box end and news start -->






 <div class="clearfix"></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /page content -->
