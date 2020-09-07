<?php
include_once '../model/Management.class.php';

session_start();
?>

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

  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.css">

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
        <?php if (!empty($_SESSION['userRole'])) {
        if ($_SESSION['userRole'] == "Expert") { ?>
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
        <?php }
        }?>


        <?php if (!empty($_SESSION['userRole'])) {
        if ($_SESSION['userRole'] == "Expert" || $_SESSION['userRole'] == "Senior" || $_SESSION['userRole'] == "Junior") { ?>?>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" id="buttonCreateOperation">
                <i class="fas fa-fw fa-cog"></i>
                <span>Create new operation</span>
            </a>
            <hr class="sidebar-divider my-0">
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" id="buttonUpdateOperation">
                <i class="fas fa-fw fa-cog"></i>
                <span>Update Operation</span>
            </a>
            <hr class="sidebar-divider my-0">
        </li>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" id="buttonDisplayInProgressOperation">
                <i class="fas fa-fw fa-cog"></i>
                <span>Display in progress operations</span>
            </a>
            <hr class="sidebar-divider my-0">
        </li>

        <?php }
        }?>

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" id="buttonDisplayAvailableOperation">
                <i class="fas fa-fw fa-cog"></i>
                <span>Display available operations</span>
            </a>
            <hr class="sidebar-divider my-0">
        </li>
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" id="buttonDisplayDoneOperation">
                <i class="fas fa-fw fa-cog"></i>
                <span>Display operation done</span>
            </a>
            <hr class="sidebar-divider my-0">
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
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"> <?php if (!empty($_SESSION['user'])) {
                        echo $_SESSION['user'];
                    } else{
                        echo "Dashboard";
                    }
                    ?></span>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <?php if (empty($_SESSION))  {?>
                      <a class="dropdown-item" href="login.php">
                          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Log-in
                      </a>
                  <?php } else {
                      ?>
                       <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                          <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                          Logout
                       </a>
                  <?php } ?>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard <?php if (!empty($_SESSION)) {
                    echo $_SESSION['userRole'];
                }
                ?></h1>
          </div>

          <!-- Content Row -->
          <div class="row">

              <?php if (!empty($_SESSION['userRole'])) {


              if ($_SESSION['userRole'] == "Expert") { ?>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-6 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Earnings (Monthly)</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if (!empty($_SESSION)) {
                            echo "<span id='incomesByMonth'></span>";
                          }
                          ?></div>
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
                      <div class="h5 mb-0 font-weight-bold text-gray-800"><?php if (!empty($_SESSION)) {
                              echo "<span id='incomesByYear'></span>";
                          }
                          ?></div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

              <?php }
              }?>
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
                        <form  method="post" id="createWorkerForm">
                            <!-- action="../controller/createWorker.action.php" -->
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="login">Username</label>
                                    <input type="text" class="form-control " id="login" name="login" placeholder="Username">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password">
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
                                    <label for="email">Email</label>
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="role">Role</label>
                                    <select class="form-control" id="role" name="role">
                                        <option>Expert</option>
                                        <option>Senior</option>
                                        <option>Junior</option>
                                    </select>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submitCreateWorker">Create Worker</button>
                        </form>
                    </div>
                </div>

                <div class="card shadow mb-4" id="createOperation">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary" id="createOperationHeader"> Create New Operation</h6>
                        <hr class="sidebar-divider my-0">
                        <br>
                        <form id="addOperationForm" method="post">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="clientFirstName">Client first name</label>
                                    <input type="text" class="form-control" id="clientFirstName" name="firstName" placeholder="Client first name here ...">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="clientLastName">Client last name</label>
                                    <input type="text" class="form-control" id="clientLastName" name="lastName" placeholder="Client last name here ...">
                                </div>
                                <div class="form-group col-md-3" >
                                    <label for="city">City</label>
                                    <input type="text" class="form-control" id="city" name="city">
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="inputZip">Zip</label>
                                    <input type="text" class="form-control" id="inputZip" name="zipCode">
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
                                    <label for="clientEmail">Email</label>
                                    <input type="email" class="form-control" id="clientEmail" placeholder="Email" name="email">
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="type">Type</label>
                                    <select class="form-control" id="type" name="type">
                                        <option>Petite</option>
                                        <option>Moyenne</option>
                                        <option>Grande</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="description">Operation's description</label>
                                    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submitNewOperation">Add operation</button>
                        </form>
                    </div>
                </div>

                <!-- Update operation -->

                <div class="card shadow mb-4" id="updateOperation">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary" id="updateOperationHeader">Update operation</h6>
                        <hr class="sidebar-divider my-0">
                        <br>
                        <form id="updateForm"  method="post">
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="clientFirstNameUpdate">Client first name</label>
                                    <input type="text" class="form-control" id="clientFirstNameUpdate" name="firstName" placeholder="Client first name here ...">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="clientLastNameUpdate">Client last name</label>
                                    <input type="text" class="form-control" id="clientLastNameUpdate" name="lastName" placeholder="Client last name here ...">
                                </div>
                                <div class="form-group col-md-1">
                                    <label for="typeUpdate">Type</label>
                                    <select class="form-control" id="typeUpdate" name="typeUpdate">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="updateDescription"> Update Operation's description</label>
                                    <textarea class="form-control" id="updateDescription" rows="3" name="description"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" id="submitUpdateOperation">Update operation</button>
                        </form>
                    </div>
                </div>

                <!-- end update operation -->

                <!-- Modify worker's role -->

                <div class="col-lg-12 mb-12">

                    <!-- Project Card Example -->
                    <div class="card shadow mb-4" id="modifyRoleWorker">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" id="modifyWorkerHeader">Modify worker's role</h6>
                            <hr class="sidebar-divider my-0">
                            <br>
                            <form id="modifyRoleWorkerForm" method="post">
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
                                        <label for="modifyRole">Role</label>
                                        <select class="form-control" id="modifyRole" name="role">
                                            <option>Expert</option>
                                            <option>Senior</option>
                                            <option>Junior</option>
                                        </select>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary" id="submitModifyRoleWorker">Modify worker's role</button>
                            </form>
                        </div>
                    </div>



            </div>

                <!-- End of Modify worker's role  -->


                <!-- Display available operations -->

                <div class="col-lg-12 mb-12">

                    <!-- Project Card Example -->
                    <div class="card shadow mb-4" id="displayAvailableOperation">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" id="displayAvailableOperationHeader">Available operations</h6>
                            <hr class="sidebar-divider my-0">
                            <br>
                            <table class="table">
                                <thead class="thead-dark">
                                <tr>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>John</td>
                                    <td>Doe</td>
                                    <td>john@example.com</td>
                                </tr>
                                <tr>
                                    <td>Mary</td>
                                    <td>Moe</td>
                                    <td>mary@example.com</td>
                                </tr>
                                <tr>
                                    <td>July</td>
                                    <td>Dooley</td>
                                    <td>july@example.com</td>
                                </tr>
                                </tbody>
                        </div>
                    </div>



                </div>

                <!-- End Display available operations -->

                <!-- Display operation in progress -->

                <div class="col-lg-12 mb-12">

                    <!-- Project Card Example -->
                    <div class="card shadow mb-4" id="displayInProgressOperation">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary" id="displayInProgressOperationHeader">Operation in progress</h6>
                            <hr class="sidebar-divider my-0">
                            <br>

                        </div>
                    </div>



                </div>

                <!-- End Display operation in progress -->

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
          <a class="btn btn-primary" href="../controller/logout.action.php">Logout</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="assets/jquery/jquery-3.5.1.min.js"></script>
  <script src="startbootstrap-sb-admin-2-gh-pages/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>



  <!-- Custom scripts for all pages-->
  <script src="../view/assets/js/dashboard.js"></script>

  <!-- Page level custom scripts -->

</body>

</html>
