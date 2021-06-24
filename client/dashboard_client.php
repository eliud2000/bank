<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Ivoire Finance | Client</title>
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
        <li><a class="nav-link scrollto active" href="#hero">Acceuil</a></li>
          <li><a class="nav-link scrollto" href="#about">A propos</a></li>
          <!--<li><a class="nav-link scrollto" href="#services">Notices</a></li>-->
          <li><a class="nav-link scrollto" href="#team">Equipe</a></li>      
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
          
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
          <h2>Welcome </h2>
          <ol>
            <li><a href="../backend/employee-logout.php"><h5>Se deconnecter</h5></a></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page pt-4">
      <center><h2><b>Details Clients</b></h2></center>
      <div class="container">
          <ul class="nav nav-tabs" id="myTab" role="tablist">
              <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Details du Compte</button>
              </li>
              <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Historique Transaction</button>
              </li>
          </ul>
          <div class="tab-content" id="myTabContent">
           
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
</main>

</body>

</html>