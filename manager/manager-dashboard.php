<?php
/*
session_start();

if (!isset($_SESSION['managername'])) {
  header("location: ../forms/manager-login.php");
}*/

require_once("../backend/helpme.php");
checkLogin();

require_once("../backend/connection.php");

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Swift | Employee</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.svg" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="../assets/css/style.css" rel="stylesheet">

</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex justify-content-between">

      <div class="logo">
        
         <h1><a href="../index.php">SWIFT BANK</a></h1> 
        <!--<a href="index.php"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <li><a class="nav-link scrollto " href="../index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="customer-list.php">Show Customers</a></li>
          <li><a class="nav-link scrollto" href="employee-list.php">Show Employees</a></li>
          <li><a class="nav-link scrollto " href="manager-analytics.php">Analytics</a></li>
          <li><a class="nav-link scrollto" href="../index.php#team">Team</a></li>
          <li><a class="nav-link scrollto" href="../index.php#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- #header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Welcome <?php echo $_SESSION['managername']; ?></h2>
          <a href="../backend/manager-logout.php"><h5>Logout</h5></a>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->



<!--==============================================================================================-->
<!-------empolyee details section-->
   <section style="height:110vh;">
   
      <div class="row">
          <center><h2><b>Employee Details</b></h2></center>
          <div class="col-sm-1"></div>
                    
                <div class="col-sm-10">
                      <ul class="nav nav-pills mb-3 justify-content-center" id="pills-tab" role="tablist">
                          <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Find Employee</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Add Employee</button>
                          </li>
                          <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-contact-tab" data-bs-toggle="pill" data-bs-target="#pills-contact" type="button" role="tab" aria-controls="pills-contact" aria-selected="false">Remove Employee</button>
                          </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                          
                          <!------Find Employee details-->
                          <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                              <form action="" method="post" >
                                  <div class="input-group input-group-lg m-3 ">
                                        <input type="text" name="employeeid" class="form-control" placeholder="Enter Employee ID" aria-label="Recipient's username" aria-describedby="button-addon2">
                                        <button name="findemployee" class="btn btn-outline-secondary" type="submit" id="button-addon2">Find Details</button>
                                  </div>
                              </form>
                              <?php

                                  if (isset($_POST['findemployee'])) {
                                    
                                    $query="SELECT * FROM `employeedata` WHERE ID='$_POST[employeeid]' LIMIT 1";
                                    $result = mysqli_query($conn,$query);

                                    while ($row = mysqli_fetch_assoc($result)) {
                                    
                              ?>
                            <form class="row g-3 m-5" id="printInfo">
                            <center><h4>Employee Details</h4></center>
                              <table class="table table-striped">
                                  <thead>
                                      <tr>
                                        <th scope="col">Sr. no</th>
                                        <th scope="col">Parameters</th>
                                        <th scope="col">Details</th>
                                       
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <tr>
                                        <th scope="row">1</th>
                                        <td>Employee Name</td>
                                        <td><?php echo "$row[nom] $row[prenom]"; ?></td>
                                        
                                      </tr>
                                      <tr>
                                        <th scope="row">2</th>
                                        <td>Employee ID</td>
                                        <td><?php echo "$row[ID]" ?></td>
                                        
                                      </tr>
                                      <tr>
                                        <th scope="row">3</th>
                                        <td>Email address</td>
                                        <td><?php echo "$row[email]" ?></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">4</th>
                                        <td>Mobile No</td>
                                        <td><?php echo "$row[mobile]" ?></td>
                                      </tr>

                                      <tr>
                                        <th scope="row">5</th>
                                        <td>Address</td>
                                        <td><?php echo "$row[adresse]" ?></td>
                                      </tr>
                                      <tr>
                                        <th scope="row">6</th>
                                        <td>poste</td>
                                        <td><?php if($row[poste]==0){echo caissier;}else if($row[poste]==1){echo gerant;}else if($row[poste]==2){echo "A gerant";} ?></td>
                                      </tr>
                                      
                                  </tbody>
                                </table>
                              </form>  
                              <div class="input-group justify-content-center">
                                <button class="btn btn-outline-danger d-grid gap-2 col-4 mx-auto" type="button" onclick="printDiv('printInfo')" > Print</button>
                              </div>
                                <?php
                                     }
                                    }
                                ?>

                          </div>
                           <!------add Employee details-->
                          <div class="tab-pane fade m-5" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                                    <center><h3>Add New Employee</h3></center>
                                    <form class="row g-3" method="post" action="../forms/add-employee.php">
                                          <div class="col-md-4">
                                            <label class="form-label">Employee ID(Don't Edit)</label>
                                            <input type="number" name="id" value="<?php echo rand(1000,9999);?>"  class="form-control" required>
                                          </div>
                                          <div class="col-md-4">
                                            <label class="form-label">CNI</label>
                                            <input type="text" name="cni" class="form-control" required>
                                          </div>
                                          <div class="col-md-4">
                                            <label class="form-label">Nom</label>
                                            <input type="text" name="nom" class="form-control" required>
                                          </div> 
                                          <div class="col-md-4">
                                            <label class="form-label">Prenom</label>
                                            <input type="text" name="prenom" class="form-control" required>
                                          </div>
                                          <div class="col-md-4">
                                            <label class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control" required>
                                          </div>
                                          <div class="col-md-4">
                                            <label class="form-label">mot de passe</label>
                                            <input type="password" name="pwd1" class="form-control" required>
                                          </div>
                                          <div class="col-md-4">
                                            <label class="form-label">Confirm mot de passe</label>
                                            <input type="password" name="pwd2" class="form-control" required>
                                          </div>
                                          <div class="col-md-4">
                                            <label class="form-label">Mobile</label>
                                            <input type="text" name="mobile" class="form-control" required>
                                          </div>
                                          
                                          <div class="col-md-4">
                                            <label class="form-label">date de naissance</label>
                                            <input type="date" name="dn" class="form-control" required>
                                          </div>
                                          <div class="col-md-4">
                                            <label class="form-label">poste</label>
                                            <select name="poste" class="form-control" required>
                                              <option>---------------</option>
                                              <option value="0">caissier/caissiere</option>
                                              <option value="1">gerant/gerante</option>
                                              <option value="0">a gerant</option>
                                            </select>
                                          </div>
                                          <div class="col-md-4">
                                            <label class="form-label">Address</label>
                                            <input type="text" name="address" class="form-control" required>
                                          </div>
                                          <div class="col-md-4">
                                            <label class="form-label">Lien signature</label>
                                            <input type="file" name="ls" class="form-control" required>
                                          </div>
                                          
                                          <div class="col-md-4">
                                            <label class="form-label">Lien Photo</label>
                                            <input type="file" name="lp" class="form-control" required>
                                          </div>
                                          
                                              <div class="col-md-4">
                                                  <input type="submit" name="addemp" class="form-control btn btn-success btn-lg">
                                              </div>
                                              <div class="col-md-4">                                                
                                                  <input type="reset" class="form-control btn btn-outline-danger btn-lg">
                                              </div>
                                    </form>      
                          
                          </div>
                          
                           <!------remove Employee details-->
                          <div class="tab-pane fade" id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
                        <form action="" method="post">
                            <div class="input-group input-group-lg mb-3 ">
                                <input type="text" class="form-control" name="empid" placeholder="Enter Employee ID" aria-describedby="button-addon2">
                                <button class="btn btn-outline-danger" type="submit" name="removeemp" id="button-addon2">Remove Employee</button>
                            </div>
                        </form>
                        <?php
                                          if (isset($_POST['removeemp'])) {
                                            $query = "DELETE FROM `employeedata` WHERE ID='$_POST[empid]' LIMIT 1";
                                            $result = mysqli_query($conn,$query);
                                          }
                                      ?>
                          </div>
                      </div>
                </div>  
                <
                
          <div class="col-sm-1"></div>                          
          
      </div>
                                          
   </section>

                                   
  </main><!-- End #main -->

  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
<script>

  function calculateAge(){
  
    var userinput = document.getElementById("date").value;
    var dob = new Date(userinput);
    
    //calculate month difference from current date in time
    var month_diff = Date.now() - dob.getTime();
    
    //convert the calculated difference in date format
    var age_dt = new Date(month_diff); 
    
    //extract year from date    
    var year = age_dt.getUTCFullYear();
    
    //now calculate the age of the user
    var age = Math.abs(year - 1970);
    
    //display the calculated age
   document.getElementById("age").value=age;
    }

</script>
 <!---------Print btn for employee----->
    <script>
        function printDiv(printInfo) {
            var printContents = document.getElementById("printInfo").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
          }
    </script>
      <!---Print btn for customer---->
    <script>
        function printDiv(printCustomerDetail) {
            var printContents = document.getElementById("printCustomerDetail").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
          }
    </script>
 
</body>

</html>