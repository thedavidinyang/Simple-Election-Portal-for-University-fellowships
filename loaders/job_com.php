<?php 
	
if(isset($_POST['filter'])){
	
	$filter = check_input($_POST['filter']);
}
if(empty($filter)){
	
	$stmt = $db_con->prepare("SELECT * FROM diex_vote ORDER BY id DESC");
			$stmt->execute();
	
} else {
	$stmt = $db_con->prepare("SELECT * FROM diex_vote WHERE unit=:user ORDER BY id DESC");
			$stmt->execute(['user' => $filter]);
}



	$count = $stmt->rowCount();
			$row = $stmt->fetch();

$unit = $db_con->prepare("SELECT * FROM diex_unit");
$unit->execute();
	$unirow = $unit->fetch();

?>
       <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-briefcase"></i> Votes <small> <?php if(isset($_POST['filter'])){ 
					
	echo(' -  Filter: '.getunitname($_POST['filter'])); 
				
				
					} 
					?></small></h3> 
              </div>

             
            </div>

            <div class="clearfix"></div>
<hr>
            <div class="row">
              


              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                      
                          <div class="form-group">
							   <label class="control-label col-md-3 col-sm-3 col-xs-12" for="pname"> <span class="required"></span>
                        </label>
							   <div class="col-md-6 col-sm-6 col-xs-12 input-group">
							    <select class="form-control col-md-7 col-xs-12" name="filter" id="dxsc">
                         
                          	<option value="" > Select Unit</option>
                          		<?php do{ ?>
                          	<option value="<?php echo($unirow['id']) ?>"> <?php echo($unirow['name']) ?></option>
                          	<?php } while($unirow = $unit->fetch()); ?>
                          </select>
								
                          
                          <span class="input-group-btn">
                        
                          <button type="button"  class="btn btn-primary" id="sebtn" onClick="searchc()"  data-placement="right" ><i class="fa fa-search"></i>  Filter Votes </button>
								   </span>
							  </div>
						  </div>
                      
                      <script>
//load prev page
						  
						  
						  
						  function searchc() {
							if (typeof document.getElementById('dxsc').value != "undefined" && document.getElementById('dxsc').value == ""){  
								new PNotify({
									title: 'Oopse...! Looks like you missed something',
									text: 'Are you kidding me?',
									type: 'error',
									//nonblock: {
									// },
									styling: 'bootstrap3'
								});  
							}  else {
								
								dxsearch();
							}
						}
						  
function dxsearch() {
	document.getElementById("sebtn").disabled="disabled";
	

	$("#sebtn").html('<i class="fa fa-circle-o-notch fa-spin"></i>');
	var data;
	data = {u:'job_com', filter: document.getElementById('dxsc').value};
	
	jQuery.ajax({
	url: "1261622387512781028128758912875128712581258",
	data:data,
	type: "POST",
	success:function(data){
		$('.diex-page-now').html(data);
		
	},
	error:function (){

	document.getElementById("sebtn").disabled="";
	
			
	$("#sebtn").html('<i class="fa fa-search"></i>  Search');
		
	new PNotify({
                                  title: 'System Error',
                                  text: 'Please  try again',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
		
		
	}
	});
}
	
	
				  </script>
                     
                       </div>
                   
                      <button class="btn btn-warning pull-right" onclick="window.print();"><i class="fa fa-print"></i> Print Page</button>
                  <div id="diexloader">
                  <div class="x_content">
                      <div class="clearfix"></div>
                      
                         <?php if($count == 0){ ?>
               
            <br> <br> <br> <br> <br>
            <br> <br> <br> <br> <br>
              <div class=" col-lg-12 ">
              
              <h1 align="center"> No records available</h1>
              
				 </div>
	
	
<?php } else { ?> 
                     
                      
                      <table class="table table-striped jambo_table bulk_action" id="printTable">
                          <thead>
                              <tr class="headings">
                                  <th class="column-title">S/N</th>
                                  <th class="column-title">Date Voted</th>
                                  <th class="column-title">Voter</th> 
                                     <th class="column-title">Unit</th>  
                                     
                                  <th class="column-title">Vote</th> 
                                                                 
                              
                                  
                                  <th class="column-title">Action</th>
                                  
                               
                              </tr>
                          </thead>
                          <tbody>
                              <?php
			  
			  $sn = 0;
			  do { 
							  $sn +=1 ; ?>
                              <tr class="even pointer">
                              <td> <?php echo($sn) ; ?></td>

                            <td><?php echo(date('d M Y g:i a', strtotime($row['date']))) ; ?></td>  
                            <td><?php echo(getfname($row['uid'])) ; ?></td> 
                            <td><?php echo(getunitname($row['unit'])) ; ?></td>
                            <td><?php 
										$vot = explode(',', $row['vote']);
										foreach($vot as $vot){
											echo($vot."<br>");
										}
										; ?></td>
                          

                            
                            
                              
                            <td> 
                              <button class="btn btn-xs btn-danger" onClick="job_del(this.value)" value="<?php echo($krypton->encrypt($row['id'])) ; ?>"><i class="fa fa-trash"></i> Delete</button>
                              
                         
                            </td>
                          
                         
                              </tr>
<?php } while ($row = $stmt->fetch()); ?>
                          </tbody>

                      </table>
                 
                    
                 
                    <?php } ?>
                   
                  </div>
                  
                  
                  <!-- xcontent ends -->
                  </div>
                </div>
              </div>



                     
            </div>
          </div>
        </div>
        <!-- /page content -->
        
<script>

					function job_del(v) {
						var vid = v;
						var data = {j: vid, u:'job', a:'<?php echo $krypton->encrypt("delete_user") ; ?>'};
						jQuery.ajax({
							url: "<?php echo(loader); ?>",
							data:data,
							type: "POST",
							success:function(data){
								if(data==1){
									new PNotify({
										title: 'Operation Successful',
										text: 'Item deleted',
										type: 'success',
										nonblock: {
											nonblock: true
										},
										styling: 'bootstrap3'
									});
									$.ajax({
										url: "1261622387512781028128758912875128712581258",
										data: {u:'job_com'},
										type: "POST",
										success: function (result) {
											top.document.title='Completed Jobs';
											$('.diex-page-now').html(result);
										},
									})
								} else {
									new PNotify({
										title: 'Oopse...! Looks like you missed something',
										text: data,
										type: 'error',
										//nonblock: {
										//     nonblock: true
										// },
										styling: 'bootstrap3'
									});
								}
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
							}
						});
					}

					
				</script>
      
       