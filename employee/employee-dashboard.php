<?php
  
  session_start();

  if (!isset($_SESSION['empfname'])) {
    header("Location: ../index.php");
  }
  require("../backend/connection.php");
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
  <link href="../assets/img/favicon.svg" rel="icon">

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
          <li><a class="nav-link scrollto" href="../manager/customer-list.php">Show customers</a></li>
          <li><a class="nav-link scrollto" href="../index.php#services">Services</a></li>
          <li><a class="nav-link scrollto " href="../index.php#portfolio">Portfolio</a></li>
          <li><a class="nav-link scrollto" href="../index.php#team">Team</a></li>
          <li class="dropdown"><a href="#"><span>Drop Down</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="dropdown"><a href="#"><span>Deep Drop Down</span> <i class="bi bi-chevron-right"></i></a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li>
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
          <h2>Welcome <?php echo $_SESSION['empfname']." ".$_SESSION['emplname'] ?></h2>
          <ol>
            <li><a href="../backend/employee-logout.php"><h5>Logout</h5></a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->


<!----customer details section---->
    <section class="inner-page pt-4">
      <center><h2><b>Customer Details</b></h2></center>
      <div class="container">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Account Details</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Add Customer</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false">Remove Customer</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#credit" type="button" role="tab" aria-controls="credit" aria-selected="false">Credit Funds</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#debit" type="button" role="tab" aria-controls="debit" aria-selected="false">Debit Funds</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#transfer" type="button" role="tab" aria-controls="transfer" aria-selected="false">Transfer Funds</button>
              </li>
          </ul>
          <div class="tab-content" id="myTabContent">
           
          <!--Find the customer using account number-->
              <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                  <center class="m-4"><h3>Find Account Details</h3></center>
                            <form action="" method="post">
                                  <div class="input-group input-group-lg mb-3">
                                      <input type="number" class="form-control" name="accountnum" placeholder="Enter Account Number" aria-label="Recipient's username" aria-describedby="button-addon2">
                                      <button class="btn btn-outline-secondary" name="findcustomer" type="submit" id="button-addon2">Find Details</button>
                                  </div>
                            </form>  
                            <?php
                            
                                        if (isset($_POST['findcustomer'])) {
                                         
                                          //get acc no
                                          $account_no = mysqli_real_escape_string($conn,$_POST['accountnum']);

                                           $query = "SELECT `account_no` FROM `customerdata` WHERE account_no='$account_no'";
                                           $result = mysqli_query($conn,$query);

                                           while ($row = mysqli_fetch_assoc($result)) {
                                            
                                           
                                    ?>
                            <form class="row g-3 m-4" id="printCustomerDetail">
                                    <center><h4>Customer Detail's</h4></center>
                                    <table class="table table-striped mb-5" >
                                            <thead>
                                              <tr>
                                                <th scope="col">Sr.no</th>
                                                <th scope="col">Parameters</th>
                                                <th scope="col">Details</th>
                                              </tr>
                                            </thead>
                                            <tbody>
                                              <tr>
                                                <th scope="row">1</th>
                                                <td>Account Holder Name</td>
                                                <td><?php echo "$row[first_name] $row[father_name] $row[last_name]"; ?></td>
                                              </tr>
                                              <tr>
                                                <th scope="row">2</th>
                                                <td>Account Number</td>
                                                <td><?php echo "$row[account_no]"; ?></td>   
                                              </tr>
                                              <tr>
                                                <th scope="row">3</th>
                                                <td>Email</td>
                                                <td><?php echo "$row[email_address]"; ?></td>   
                                              </tr>
                                              <tr>
                                                <th scope="row">4</th>
                                                <td>Mobile</td>
                                                <td><?php echo "$row[mobile_no]"; ?></td>   
                                              </tr>
                                              <tr>
                                                <th scope="row">5</th>
                                                <td>City</td>
                                                <td><?php echo "$row[city]"; ?></td>   
                                              </tr>
                                              <tr>
                                                <th scope="row">6</th>
                                                <td>Taluka</td>
                                                <td><?php echo "$row[taluka]"; ?></td>   
                                              </tr>
                                              <tr>
                                                <th scope="row">7</th>
                                                <td>District</td>
                                                <td><?php echo "$row[district]"; ?></td>   
                                              </tr>
                                              <tr>
                                                <th scope="row">8</th>
                                                <td>State</td>
                                                <td><?php echo "$row[state]"; ?></td>   
                                              </tr>
                                              <tr>
                                                <th scope="row">9</th>
                                                <td>Pincode</td>
                                                <td><?php echo "$row[pincode]"; ?></td>   
                                              </tr>
                                              <tr>
                                                <th scope="row">10</th>
                                                <td>Address</td>
                                                <td><?php echo "$row[address]"; ?></td>   
                                              </tr>
                                              
                                            </tbody>
                                          </table>
                                          <div class="input-group justify-content-center">
                                            <button class="btn btn-outline-danger d-grid gap-2 col-4 mx-auto" type="button" onclick="printDiv('printCustomerDetail')" > Print</button>
                                          </div>
                                    </form>   
                                    <?php
                                    }
                                  }
                                    ?>

              </div>
            
              <!--Add the customer-->
            <div class="tab-pane fade m-5" id="profile" role="tabpanel" aria-labelledby="profile-tab">
              <center class="m-4"><h4>Add New Customer</h4></center>

              <form class="row g-3" action="../forms/add-customer.php" method="post" enctype="multipart/form-data">
              <div class="col-md-4">
                <label class="form-label">Employee ID(Don't Edit)</label>
                <input type="number" name="id" value="<?php echo rand(100000,999999);?>"  class="form-control" required>
              </div>
              <div class="col-md-4">
                <label class="form-label">Acount number(Don't Edit)</label>
                <input type="number" name="account" value="<?php echo rand(1000000,9999999);?>"  class="form-control" required>
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
                <label class="form-label">profession</label>
                <input type="text" name="prof" class="form-control">
              </div>
              <div class="col-md-4">
                <label class="form-label">balance</label>
                <input type="number" name="balance" class="form-control">
              </div>
              <div class="col-md-4">
                <label class="form-label">Address</label>
                <input type="text" name="address" class="form-control" required>
              </div>
              <div class="col-md-4">
                <label class="form-label">Lien signature</label>
                <input type="text" name="ls1" class="form-control" required>
              </div>
              
              <div class="col-md-4">
                <label class="form-label">Lien Photo</label>
                <input type="text" name="lp" class="form-control" required>
              </div>
                <div class="col-md-4">
                    <div class="form-check">
                          <input class="form-check-input" type="radio" value="Male" name="flexRadioDefault" id="flexRadioDefault1">
                          <label class="form-check-label" for="flexRadioDefault1">Male</label>
                    </div>
                    <div class="form-check">
                          <input class="form-check-input" type="radio" value="Female" name="flexRadioDefault" id="flexRadioDefault1">
                          <label class="form-check-label" for="flexRadioDefault1">Female</label>
                    </div>
                </div>

                  <div class="col-md-4">
                        <input type="submit" name="addcustomer" class="form-control btn btn-success btn-lg">
                  </div>
                  <div class="col-md-4">                                                
                        <input type="reset" class="form-control btn btn-outline-danger btn-lg">
                  </div>
              </form>
            </div>

            <!--Delete the customer using account number-->
            <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                <center><h3>Remove Customer</h3></center>
                     <form action="" method="post">
                          <div class="input-group input-group-lg mb-3">
                                <input type="number" class="form-control" placeholder="Account Number" name="accnum" aria-label="Recipient's username" aria-describedby="button-addon2">
                                <button class="btn btn-outline-danger" name="removeC" type="submit" id="button-addon2">Remove Customer</button>
                          </div>
                     </form>  
                     <?php
                          if (isset($_POST['removeC'])) {

                            

                              //first find the customer
                              $search_customer = "SELECT * FROM `customerdata` WHERE account_no='$_POST[accnum]' LIMIT 1";
                              
                              $find = mysqli_query($conn,$search_customer);
                              
                              if ($row = mysqli_fetch_assoc($find)) {
                                #echo "$row[account_no]";
                                $query = "DELETE FROM `customerdata` WHERE account_no='$_POST[accnum]' LIMIT 1";
                                
                                $result = mysqli_query($conn,$query);
                                #echo "Deleted!";
                                
                                echo "<script>alert('Customer Deleted Successfully!');</script>";

                              }else{
                                echo "<script>alert('Customer Not Found!');</script>";
                              }
                               

                               
                                
                          }
                      ?>
            </div>
              <!--credit the customer using account number-->
              <div class="tab-pane fade" id="credit" role="tabpanel" aria-labelledby="credit-tab">
                        <center class="m-4"><h3>Credit Funds</h3>
                          <!----Send credit fund info---->
                          <form action="../forms/credit-fund.php" method="post">
                            <div class="row">
                                  <div class="col-sm-4">
                                      <div class="input-group input-group-lg">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">Account No.</span>
                                            <input type="number" name="acnum" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-lg">
                                      </div>
                                  </div>
                                  <div class="col-sm-4">
                                      <div class="input-group input-group-lg">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">Amount (Rs.)</span>
                                            <input type="number" name="amount" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-lg">
                                      </div>
                                  </div>
                                  <div class="col-sm-4">
                                      <input type="submit" name="creditfund" class="btn btn-primary btn-lg" value="Credit fund">
                                  </div>
                            </div>                              
                          </form>
                        </center>
              </div>
                <!--debit the customer using account number-->
            <div class="tab-pane fade" id="debit" role="tabpanel" aria-labelledby="debit-tab">
                  <center class="m-4"><h3>Debit Funds</h3>
                          <!----Send credit fund info---->
                          <form action="../forms/debit-fund.php" method="post">
                            <div class="row">
                                  <div class="col-sm-4">
                                      <div class="input-group input-group-lg">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">Account No.</span>
                                            <input type="number" name="acnum" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-lg">
                                      </div>
                                  </div>
                                  <div class="col-sm-4">
                                      <div class="input-group input-group-lg">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">Amount (Rs.)</span>
                                            <input type="number" name="amount" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-lg">
                                      </div>
                                  </div>
                                  <div class="col-sm-4">
                                      <input type="submit" name="debitfund" class="btn btn-primary btn-lg" value="Debit fund">
                                  </div>
                            </div>                              
                          </form>
                        </center>
            </div>
            <!----Transfer funds------->
            <div class="tab-pane fade" id="transfer" role="tabpanel" aria-labelledby="transfer-tab">
                  <center>
                        <h3 class="m-5">Transfer Funds</h3>
                  </center>      
                        <!-------Transfer funds form---->
                  <form action="../forms/transfer-funds.php" method="post">
                            <div class="row">
                                  <div class="col-sm-4">
                                      <div class="input-group input-group-lg">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">From</span>
                                            <input type="number" name="fromaccount" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-lg">
                                      </div>
                                  </div>
                                  <div class="col-sm-4">
                                      <div class="input-group input-group-lg">
                                            <span class="input-group-text" id="inputGroup-sizing-lg">To</span>
                                            <input type="number" name="toaccount" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-lg">
                                      </div>
                                  </div>
                                  <div class="col-sm-4">
                                      <div class="input-group input-group-lg">
                                            <input type="number" name="amount" placeholder="Enter amount" class="form-control" aria-label="Sizing example input" required aria-describedby="inputGroup-sizing-lg">
                                      </div>
                                  </div>
                                  <div class="col-sm-4"> </div>
                                  <div class="col-sm-4 mt-4 d-flex justify-content-center">
                                  <i class="fas fa-paper-plane"></i>
                                      <input type="submit" name="transferfund" class="btn btn-primary btn-lg" value="Transfer Funds">
                                  </div>
                            </div>                              
                    </form>
              </div>
            </div>

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