<?php 

$maxRows = 10;
$pageNum = 0;

if (isset($_POST['pg'])) {
  $pageNum = $_POST['pg'];
}
$startRow = $pageNum * $maxRows;
if(isset($_POST['search'])){
	
	$search = check_input($_POST['search']);
	
	$query = "SELECT * FROM diex_user WHERE fname LIKE '%{$search}%' OR uname LIKE '%{$search}%' AND type !=0 ORDER BY id DESC";
$query_limit = sprintf("%s LIMIT %d, %d ", $query, $startRow, $maxRows);
	
	
} else{
	
	


$query = "SELECT * FROM diex_user WHERE type !=0 ORDER BY id DESC";
$query_limit = sprintf("%s LIMIT %d, %d ", $query, $startRow, $maxRows);
}

$stmt = $db_con->prepare($query_limit);
			$stmt->execute();
			$row = $stmt->fetch();

			//$count = $stmt->rowCount();

$stmtz = $db_con->prepare($query);

$stmtz->execute();
$count = $stmtz->rowCount();

$totalPages = ceil($count/$maxRows)-1;	




?>
       <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><i class="fa fa-users"></i> Manage Users<small> <?php if(isset($_POST['search'])){ 
					
	echo(' - <i class="fa fa-search"></i> Search for:'.$_POST['search']); 
				
				
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
							   <input type="text" id="dxsc" class="form-control col-md-7 col-xs-12"placeholder="Search name, username " name="search" autocomplete="off" >
								
                          
                          <span class="input-group-btn">
                          <button type="button"  class="btn btn-primary" id="sebtn" onClick="searchc()"  data-placement="right" ><i class="fa fa-search"></i>  Search </button>
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
	data = {u:'musers', search: document.getElementById('dxsc').value};
	
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
                  
                  <div id="diexloader">
                  <div class="x_content">
                      <div class="clearfix"></div> 
                      
                         <?php if($count == 0){ ?>
               
            
              <div class=" col-lg-12 ">
              
              <h1 align="center"> No records available</h1>
              
				 </div>
	
	
<?php } else { ?> 
                     
                      
                      <table class="table table-striped jambo_table bulk_action">
                          <thead>
                              <tr class="headings">
                                  <th class="column-title">Full name (username)</th>
                                  <th class="column-title">Units</th>
                                  <th class="column-title">Action</th>
                               
                              </tr>
                          </thead>
                          <tbody>
                              <?php do { ?>
                              <tr class="even pointer">
 

                            <td><?php echo($row['fname']) ; ?> (<?php echo($row['uname']) ; ?> )</td> 
                            <td><?php
			$munits = explode(",", $row['unit']);
			foreach($munits as $unity){
				
				echo('<p>'.getunitname($unity).'</p>');
			}
								?></td> 
                     
                        <td><button type="button" class="btn btn-sm btn-primary" onClick="vew(this.value)"  value="<?php echo($krypton->encrypt($row['id']) ); ?>"><i class="fa fa-search"></i> View</button>
                        	<button type="button" class="btn btn-sm btn-danger" onClick="del(this.value)"value="<?php echo($krypton->encrypt($row['id']) ); ?>"><i class="fa fa-close"></i> Delete</button></td>
                         
                              </tr>
<?php } while ($row = $stmt->fetch()); ?>
                          </tbody>

                      </table>
                 
                    
                      
              <div class="clearfix"> </div>
            
              <div class=" col-lg-12 ">
              <ul class="pagination pagination-sm">
               <?php if ($pageNum > 0) { // Show if not first page ?>
           <li> <button onClick="previ()" id="prev"  class="btn btn-primary btn-sm"><i class="fa fa-angle-left"></i> Previous Page</button>
             <?php } // Show if not first page ?>
             </li>
        
			
			<?php if ($pageNum < $totalPages) { // Show if not last page ?>
            <li><button type="button" class="btn btn-primary btn-sm" id="next" onClick="nex()">Next Page <i class="fa fa-angle-right"></i></button></li>
            <?php } // Show if not last page ?>
            
				  </ul>
				  
				  
				  
				             
<script>
//load prev page
function previ() {
	<?php if ($pageNum < $totalPages) { // Show if not last page ?>
	document.getElementById("next").disabled="disabled";
	    <?php } // Show if not last page ?>
	document.getElementById("prev").disabled="disabled";
	

	$("#prev").html('<i class="fa fa-circle-o-notch fa-spin"></i>');
	
	
	jQuery.ajax({
	url: "../loader.php",
	data:{u:'musers', pg:'<?php echo( max(0, $pageNum - 1));?>'},
	type: "POST",
	success:function(data){
		$('.diex-page-now').html(data);
	},
		error:function (){

	<?php if ($pageNum < $totalPages) { // Show if not last page ?>
	document.getElementById("next").disabled="disabled";
	    <?php } // Show if not last page ?>
	document.getElementById("prev").disabled="disabled";
	
			
	$("#prev").html('<i class="fa fa-angle-left"></i> Previous Page');
		
	new PNotify({
                                  title: 'System Error',
                                  text: 'Please  try again',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
		
		
	}
	});
}
	
	
	
//load next page
function nex() {
	document.getElementById("next").disabled="disabled";
	<?php if ($pageNum > 0) { // Show if not first page ?>
	document.getElementById("prev").disabled="disabled";
	<?php } // Show if not first page ?>

	$("#next").html('<i class="fa fa-circle-o-notch fa-spin"></i>');
	
	
	jQuery.ajax({
	url: "../loader.php",
	data:{u:'musers', pg:'<?php echo(min($totalPages, $pageNum + 1));?>'},
	type: "POST",
	success:function(data){
		$('.diex-page-now').html(data);
		
	},
	error:function (){

	document.getElementById("next").disabled="disabled";
	<?php if ($pageNum > 0) { // Show if not first page ?>
	document.getElementById("prev").disabled="disabled";
	<?php } // Show if not first page ?>
			
	$("#next").html('Next Page <i class="fa fa-angle-right"></i>');
		
	new PNotify({
                                  title: 'System Error',
                                  text: 'Please  try again',
                                  type: 'error',
                                  styling: 'bootstrap3'
                              });
		
		
	}
	});
}
	
	
	function del(value){
		var dx = value;
		var data = {j: dx, u:'m_user', a:'<?php echo($krypton->encrypt('delete'))?>'};
			jQuery.ajax({
			url: '1261622387512781028128758912875128712581258',
			data:data,
			type: "POST",
			success:function(data){
				
					
				if(data == 1){
					
						new PNotify({
					title: 'Operation successful',
					text: 'User deleted',
					type: 'success',
					//nonblock: {
					// },
					styling: 'bootstrap3'
				});
					
					    $.ajax({
      url: "1261622387512781028128758912875128712581258",
		data: {u:'musers'},
		type: "POST",
    success: function (result) {
		top.document.title='Manage Members';
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
					
				} else {
					
					new PNotify({
					title: 'Oops! Something went wrong',
					text: data,
					type: 'error',
					//nonblock: {
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
					// },
					styling: 'bootstrap3'
				});
			}
		});
		
		
		
	}	
	function vew(value){
		var dx = value;
		var data = {j: dx, u:'m_user', a:'<?php echo($krypton->encrypt('view'))?>'};
			jQuery.ajax({
			url: '1261622387512781028128758912875128712581258',
			data:data,
			type: "POST",
			success:function(data){
				
					$("#diexloader").html(data);

			},
			error:function (){
				
				new PNotify({
					title: 'Network Error!',
					text: 'Please check your network connection and try again',
					type: 'error',
					//nonblock: {
					// },
					styling: 'bootstrap3'
				});
			}
		});
		
		
		
	}
	
</script>
     	
				  
				 </div>
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

       