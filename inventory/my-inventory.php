<?php include '../view/header.php';?>                                    <!-- including header file -->
<link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<body class="bg-color">
<?php include '../view/afterloginHeader.php';?> 
    <div class="container cont_cls">
            <h2><center>My Inventory</center></h2>
            <hr style="border-color:#808080"/>
  <!-- for displaying alerts -->
            <?php if(!empty($_SESSION['error_user'])) { echo "<div class='alert alert-danger' role='alert'>".$_SESSION['error_user']."</div>"; } ?>
            <?php if(!empty($_SESSION['success_user'])) { echo "<div class='alert alert-success' role='alert'>".$_SESSION['success_user']."</div>"; } ?>
            <div class="clear ht_20"></div>
            <div id="content-wrapper">

<div class="container-fluid">
  <!-- Area Chart Example-->
  <div class="card mb-3">
    <div class="card-body">
      <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>S No.</th>
              <th>Part Number</th>
              <th>Part Name</th>
              <th>Quantity Out</th>
              <th>Transaction On</th>
            </tr>
          </thead>
          <tbody>
<?php
  if(!empty($myinventorys))
  {
    $i = 1;
  foreach($myinventorys as $myinventory)
  {
?>
            <tr>
              <td><?php echo $i; ?></td>
              <td><a href="index.php?action=viewPart&partid=<?php echo $myinventory->getPartID(); ?>" style="text-decoration:none;"><?php echo $myinventory->getTransactionID(); ?></a></td>
              <td><a href="index.php?action=viewPart&partid=<?php echo $myinventory->getPartID(); ?>" style="text-decoration:none;"><?php echo $myinventory->getUserID(); ?></a></td>
              <td><?php echo $myinventory->getQuantity(); ?></td>
              <td><?php echo $myinventory->getDateTime(); ?></td>
              <td>              
            </tr>
<?php
    $i++;
   }
  }
  else
  {
      echo "<tr colspan='7'><td>No transaction yet !!!</td></tr>";
  }
?>
          </tbody>
        </table>
      </div>
    </div>
  </div>   
</div>
</div>  
          </div>
        </div>
    <div class="clear ht_20"></div>
  <!-- Bootstrap core JavaScript-->
  <script src="../vendor/jquery/jquery.min.js"></script>
  <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Page level plugin JavaScript-->
  <script src="../vendor/datatables/jquery.dataTables.js"></script>
  <script src="../vendor/datatables/dataTables.bootstrap4.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="../js/sb-admin.min.js"></script>

  <!-- Demo scripts for this page-->
  <script src="../js/demo/datatables-demo.js"></script>

<?php include '../view/footer.php'; ?>                                                             <!-- including footer file -->