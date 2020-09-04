<?php
session_start() ?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Propar Cleaning Company Dashboard</title>

  <!-- Custom fonts for this template-->
  <link href="startbootstrap-sb-admin-2-gh-pages/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="startbootstrap-sb-admin-2-gh-pages/css/sb-admin-2.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>


</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-secondary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n">
          <i class="fas fa-user-shield"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Dashboard </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->
      <div class="sidebar-heading">
          Administration Panel
      </div>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" id="buttonCreateWorker">
          <i class="fas fa-fw fa-cog"></i>
          <span>Create worker</span>
        </a>
          <hr class="sidebar-divider my-0">
      </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" id="buttonWorkersRole">
                <i class="fas fa-fw fa-cog"></i>
                <span>Modify role worker</span>
            </a>
            <hr class="sidebar-divider my-0">
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" id="buttonCreateOperation">
                <i class="fas fa-fw fa-cog"></i>
                <span>Create new operation</span>
            </a>
            <hr class="sidebar-divider my-0">
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="fas fa-fw fa-cog"></i>
                <span>Display available operations</span>
            </a>
            <hr class="sidebar-divider my-0">
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#">
                <i class="fas fa-fw fa-cog"></i>
                <span>Display in progress operations</span>
            </a>
            <hr class="sidebar-divider my-0">
        </li>

      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Pages</span>
        </a>
        <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Login Screens:</h6>
            <a class="collapse-item" href="login.php">Login</a>
          </div>
        </div>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="startbootstrap-sb-admin-2-gh-pages/charts.html">
          <i class="fas fa-fw fa-chart-area"></i>
          <span>Charts</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="startbootstrap-sb-admin-2-gh-pages/tables.html">
          <i class="fas fa-fw fa-table"></i>
          <span>Tables</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">


    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php echo $_SESSION['user'] ?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Settings
                </a>
                <a class="dropdown-item" href="#">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Activity Log
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <?php echo $_SESSION['userRole']?></h1>
          </div>

          <!-- Content Row -->
          <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Earnings (Annual)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

        <div class="row">

            <!-- Content Column -->
            <div class="col-lg-12 mb-12">

                <!-- Project Card Example -->
                <div class="card shadow mb-4" id="createWorker">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary" id="createWorkerHeader">Create Worker</h6>
                        <hr class="sidebar-divider my-0">
                        <br>
                        <form action="../controller/createWorker.action.php" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="login">Username</label>
                                    <input type="text" class="form-control " id="login" name="login" placeholder="Username">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password" name="password">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="firstName">First Name</label>
                                    <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Your first name ...">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="lastName">Last Name</label>
                                    <input type="text" class="form-control" id="lastName" name="lastname" placeholder="Your last name here ...">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="birthday">Birthday</label>
                                    <input type="text" class="form-control" id="birthday" name="birthday" placeholder="1999-01-01">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="exampleFormControlSelect1">Role</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="role">
                                        <option>Expert</option>
                                        <option>Senior</option>
                                        <option>Junior</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Create Worker</button>
                        </form>
                    </div>
                </div>

                <div class="card shadow mb-4" id="createOperation">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary" id="createOperationHeader"> Create New Operation</h6>
                        <hr class="sidebar-divider my-0">
                        <br>
                        <form action="../controller/addOperation.action.php" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="clientFirstName">Client first name</label>
                                    <input type="text" class="form-control" id="clientFirstName" name="clientFirstName" placeholder="Client first name here ...">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="clientLastName">Client last name</label>
                                    <input type="text" class="form-control" id="clientLastName" name="clientLastName" placeholder="Client last name here ...">
                                </div>
                                <div class="form-group col-md-3" >
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="inputZip">Zip</label>
                                    <input type="text" class="form-control" id="inputZip">
                                </div>
                                <div class="form-group col-md-2" >
                                    <label for="street">Street</label>
                                    <input type="text" class="form-control" id="street" name="street">
                                </div>
                                <div class="form-group col-md-1" >
                                    <label for="number">Number</label>
                                    <input type="text" class="form-control" id="number" name="number">
                                </div>
                                <div class="form-group col-md-5">
                                    <label for="inputEmail4">Email</label>
                                    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="email">
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="exampleFormControlSelect1">Type</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="role">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="exampleFormControlTextarea1">Operation's description</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">Add operation</button>
                        </form>
                    </div>
                </div>

                <!-- Modify worker's role -->

                <div class="col-lg-12 mb-12">

                    <!-- Project Card Example -->
                    <div class="card shadow mb-4" id="modifyRoleWorker">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" id="modifyWorkerHeader">Modify worker's role</h6>
                            <hr class="sidebar-divider my-0">
                            <br>
                            <form action="../controller/modifyWorkersRole.php" method="post">
                                <div class="form-row">
                                    <div class="form-group col-md-5">
                                        <label for="workerFirstName">Worker's first name</label>
                                        <input type="text" class="form-control" id="workerFirstName" name="workerFirstName" placeholder="Worker's first name ...">
                                    </div>
                                    <div class="form-group col-md-5">
                                        <label for="workerLastName">Worker's last name</label>
                                        <input type="text" class="form-control" id="workerLastName" name="workerLastName" placeholder="Worker's last name here ...">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="workerID">Worker's ID</label>
                                        <input type="text" class="form-control" id="workerID" name="workerID" placeholder="1">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="exampleFormControlSelect1">Role</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="role">
                                            <option>Expert</option>
                                            <option>Senior</option>
                                            <option>Junior</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Modify worker's role</button>
                            </form>
                        </div>
                    </div>

                <!-- End of Modify worker's role  -->

            </div>
        </div>
            <!-- End of Main Content -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Vous êtes sur le point de vous déconnecter.</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
          <a class="btn btn-primary" href="login.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="startbootstrap-sb-admin-2-gh-pages/vendor/jquery/jquery.min.js"></script>
  <script src="startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="startbootstrap-sb-admin-2-gh-pages/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../view/assets/js/dashboard.js"></script>

  <!-- Page level plugins -->

  <!-- Page level custom scripts -->
  <script src="startbootstrap-sb-admin-2-gh-pages/js/demo/chart-area-demo.js"></script>
  <script src="startbootstrap-sb-admin-2-gh-pages/js/demo/chart-pie-demo.js"></script>

</body>

</html>
