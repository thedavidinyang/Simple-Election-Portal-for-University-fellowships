  <body class="nav-md  " >
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col menu_fixed">
          <div class="left_col scroll-view">

               <div class="navbar nav_title" style="border: 0;">
              <a href="#" class="site_title">
                  <img src="<?php echo $dcon->base_url ; ?>/images/logo.JPG" width="45px">
                  <span  style="color:#042563"><?php echo($sitename) ; ?></span>
                   </a>
            </div>




            <div class="clearfix"></div>




            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">


                <ul class="nav side-menu">

                <li><a href="#home" class="dashboard"> <i class="fa fa-tachometer"></i> Dashboard  </a>

                  </li>



           <li><a href="#My_Account" class="usm-prof"><i class="fa fa-user"></i> My Account</a>

                 </li>





                  </ul>
                    </div>

             <?php if(empty($me['type'])){ ?>
                <div class="menu_section">
               
                <ul class="nav side-menu">
           
                  <li><a href="#votes" class="votes"><i class="fa fa-check-circle"></i>Votes</a>

                  </li>



                
                  <li><a href="#Manage_Users" class="musers"><i class="fa fa-users"></i> Manage Members</a>

                 </li>
          <li><a href="#settings" class="settings"><i class="fa fa-cogs"></i> Setinngs</a>
                  </li>
				   </ul>
               
				</div>
          
          <?php } ?>
           
         <div class="menu_section">
               
                <ul class="nav side-menu">
                
                 
          <li><a href="#out" class="lout"><i class="fa fa-sign-out"></i> Log Out</a>
                  </li>
				   </ul>
               
				</div> 

            </div>
            <!-- /sidebar menu -->


          </div>


        </div>
