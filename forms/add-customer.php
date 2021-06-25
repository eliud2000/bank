<?php

    require_once("../backend/helpme.php");
    checkLogin();
    
    require_once("../backend/connection.php");

    #customer added by employee
    if (isset($_POST['addcustomer'])) {
        //get the post values in secure format
        $id = mysqli_real_escape_string($conn,$_POST['id']);
        $cni = mysqli_real_escape_string($conn,$_POST['cni']);
        $nom = mysqli_real_escape_string($conn,$_POST['nom']);
        $prenom = mysqli_real_escape_string($conn,$_POST['prenom']);
        $email = mysqli_real_escape_string($conn,$_POST['email']);
        $pwd1 = mysqli_real_escape_string($conn,$_POST['pwd1']);
        $pwd2 = mysqli_real_escape_string($conn,$_POST['pwd2']);
        $mobile = mysqli_real_escape_string($conn,$_POST['mobile']);
        $dn = mysqli_real_escape_string($conn,$_POST['dn']);
        $prof = mysqli_real_escape_string($conn,$_POST['prof']);
        $address = mysqli_real_escape_string($conn,$_POST['address']);
        $ls = mysqli_real_escape_string($conn,$_POST['ls1']);
        $lp = mysqli_real_escape_string($conn,$_POST['lp']);
        $balance = mysqli_real_escape_string($conn,$_POST['balance']);
        $gender = mysqli_real_escape_string($conn,$_POST['flexRadioDefault']);
        $account = mysqli_real_escape_string($conn,$_POST['account']);
        //set the timezone to asia kolkata
        date_default_timezone_set('Asia/Kolkata');
        $timestamp = date("Y-m-d h:i:s");
        #echo $timestamp;
    

        $query = "INSERT INTO `customerdata` (`id`, `cni`, `nom`, `prenom`, `email`, `telephone`, `dn`, `proffesion`, `lp`, `ls`,`sexe`,`account_no`,`balance`,`datecreation`) VALUES ('$id','$cni', '$nom', '$prenom', '$email', '$mobile', '$dn', '$prof', '$lp', '$ls','$gender','$account','$balance','$timestamp')";

       $result = mysqli_query($conn,$query);

       #echo mysqli_error($conn);

       //if the data inserted successfully
        if ($result) {

             ?>
               <!--html is here -->
               <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer ID Card</title>
    <link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
    <style>

        #main-id{
            width: 500px;
            height: 300px;
            margin-top: 15%;
            border: 2px dashed black;
        }
        #photo{
            border: 1px solid black;
            width: 140px;
            height: 170px;
            margin-left: 5%;
            margin-top: 5%;
        }
        #info{
            height: 200px;
        }
        #options{
            margin-top: 5%;
        }
    </style>
</head>
<body>
    
    <div class="container" id="printID">
        <div class="row" >
            <div class="col-sm-3"></div>
            <!------Main column-->
            <div id="main-id" class="col-sm-5">
                <div class="mt-3" id="heading">
                    <center>
                        <h4><b>Swift Bank ID Card</b></h4>
                    </center>
                </div>
                
                <div class="row">
                    <!-------Photo-->
                    <div id="photo" class="col-sm-4">
                        <center class="m-3">Photo</center>
                    </div>
                    <!------Information--->
                    <div class="col-sm-8 " id="info"><br>
                        <b>Name&nbsp;&nbsp;:</b>&nbsp;<?php echo $_POST['nom']." ".$_POST['prenom']." "; ?><br>
                        <b>Account No&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;&nbsp;&nbsp;<?php echo $_POST['account']; ?><br>
                        <b>mail de connexion&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;&nbsp;&nbsp;<?php echo $_POST['email']; ?><br>
                        <b>Telephone&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;&nbsp;&nbsp;<?php echo $_POST['mobile']; ?><br>
                        <b>Pincode&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:</b>&nbsp;&nbsp;&nbsp;<?php echo $_POST['pwd1']; ?><br>
                        <b>Date of Issue&nbsp;:&nbsp;&nbsp;&nbsp;</b><?php echo date('d/m/Y'); ?>
                    </div>
                    <!---signature-->
                    <div class="col-sm-8"></div>
                    <div class="col-sm-4" id="signature">
                        Signature
                    </div>
                </div>

            </div>
            <div class="col-sm-3"></div>
        </div>
        
    </div>
    <!----Options for user--->
    <center id="options">
            <button class="btn btn-primary" onclick="printDiv()">Print</button>

            <?php
            if (isset($_SESSION['empfname'])) {
                echo "<a href='../employee/employee-dashboard.php' class='btn btn-outline-primary'>Home</a>";
                
            }
            

            if (isset($_SESSION['managername'])) {
                echo "<a href='../manager/manager-dashboard.php' class='btn btn-outline-primary'>Home</a>";
             }
           ?>
    </center>

    <script src="../assets/vendor/bootstrap/js/bootstrap.js"></script>

    <!--Print the id function----->
    <script>
        function printDiv(printID) {
            var printContents = document.getElementById("printID").innerHTML;
            var originalContents = document.body.innerHTML;

            document.body.innerHTML = printContents;

            window.print();

            document.body.innerHTML = originalContents;
          }
    </script>
</body>
</html>



               
             <?php
            
        }
        // else{

        //     echo "<script> alert('Record is not added! Try again'); </script>";
        //     redirectPage(); #redirect to the respected user dashboard

        // }#end of success query completion

    }#end of addcustomer submit

?>