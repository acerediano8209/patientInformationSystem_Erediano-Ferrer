<body class="black-skin">

  <!--Double navigation-->
  <header>
    <!-- Sidebar navigation -->
    <div id="slide-out" class="side-nav black-skin fixed">
      <ul class="custom-scrollbar">

       <!-- Patients -->
    
        <li>
          <ul class="collapsible collapsible-accordion">
            <li><a class="collapsible-header waves-effect arrow-r " ><i class="fas fa-user"></i> Patients<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <?php if ($_SESSION['role'] != "admin") : ?>
                    <li><a href="../patients/addPatient.php" class="waves-effect">Add Patient</a>
                    </li>
                  <?php endif; ?>
                  <li><a href="../patients/viewPatients.php" class="waves-effect">View Patients List</a>
                  </li>
                </ul>
              </div>
            </li>

            <!-- Doctors -->
        <li>
          <ul class="collapsible collapsible-accordion">
            <li><a class="collapsible-header waves-effect arrow-r " ><i class="fas fa-user"></i> Doctors<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <?php if ($_SESSION['role'] != "user") : ?>
                    <li><a href="../doctors/addDoctor.php" class="waves-effect">Add Doctors</a>
                    </li>
                  <?php endif; ?>
                  <li><a href="../doctors/viewDoctors.php" class="waves-effect">View Available Doctors</a>
                  </li>
                </ul>
              </div>
            </li>

               <!-- Beds -->
        <li>
          <ul class="collapsible collapsible-accordion">
            <li><a class="collapsible-header waves-effect arrow-r " ><i class="fas fa-user"></i> Beds<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <?php if ($_SESSION['role'] != "user") : ?>
                    <li><a href="../beds/addBed.php" class="waves-effect">Add Beds</a>
                    </li>
                  <?php endif; ?>
                  <li><a href="../beds/viewBeds.php" class="waves-effect">View Available Beds</a>
                  </li>
                </ul>
              </div>
            </li>

                   <!-- Drugs -->

                  
              <li><a class="collapsible-header waves-effect arrow-r "><i class="fas fa-cross"></i>
                  Drug<i class="fas fa-angle-down rotate-icon"></i></a>
                <div class="collapsible-body">
                  <ul>
                  <?php if ($_SESSION['role'] != "user") : ?>
                    <li><a href="../presp/addPresp.php" class="waves-effect">Add Drug</a>
                    </li>
                    <?php endif; ?>
                   
                    <li><a href="../presp/viewPresp.php" class="waves-effect">View Drugs</a>
                    </li>
                  </ul>
                </div>
              </li>
         

            <?php if ($_SESSION['role'] == "admin") : ?>
            <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-plus">
                </i> Diagnosis<i class="fas fa-angle-down rotate-icon"></i></a>
              <div class="collapsible-body">
                <ul>
                  <li><a href="../diag/viewDiag.php" class="waves-effect">View Diagnosis</a>
                  </li>
                  <?php endif; ?>
                </ul>
              </div>
            </li>
            
           
            <?php if ($_SESSION['role'] == "admin") : ?>
              <li><a class="collapsible-header waves-effect arrow-r"><i class="fas fa-group"></i> Users<i class="fas fa-angle-down rotate-icon"></i></a>
                <div class="collapsible-body">
                  <ul>
                    <li><a href="../users/addUser.php" class="waves-effect">Add User</a>
                    </li>
                    <li><a href="../users/viewUsers.php" class="waves-effect">View Users</a>
                    </li>
                  </ul>
                </div>
              </li>
            <?php endif; ?>
                    <li><a href="../admin/admin.php" class="waves-effect">Home</a>  
              </li>


          
        <!--/. Side navigation links -->
      </ul>
      <div class="sidenav-bg mask-strong"></div>
    </div>
    <!--/. Sidebar navigation -->
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-toggleable-md navbar-expand-lg scrolling-navbar double-nav">
      <!-- SideNav slide-out button -->
      <div class="float-left">
        <a href="#" data-activates="slide-out" class="button-collapse"><i class="fas fa-bars"></i></a>
      </div>
      <!-- Breadcrumb-->
      <div class="breadcrumb-dn mr-auto" >
        <p>Erediano-Ferrer and Co. Hospital Infomation System</p>
      </div>
      <ul class="nav navbar-nav nav-flex-icons ml-auto">
    
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fas fa-user"></i> Account
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
            <a class="dropdown-item" href="../index/index.php">Log Out [<?= $_SESSION['email'] ?>]</a>
          </div>
        </li>
      </ul>
    </nav>
    <!-- /.Navbar -->
  </header>
</body>