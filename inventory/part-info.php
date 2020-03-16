<?php include '../view/header.php';?>                                    <!-- including header file -->
<body class="bg-color">
<?php include '../view/afterloginHeader.php';?> 
    <div class="container cont_cls">
            <h2><center>Part Information</center></h2>
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
    
    <div class="form-group">
        <div class="col-md-2"><label for="psw"> Part Number :</label></div>
        <div class="col-md-9"><span><?php echo $partinfo->getPartNo(); ?></span></div>
      </div>
        <div class="clear ht_10"></div>
      <div class="form-group">
        <div class="col-md-2"><label for="psw"> Part Name :</label></div>
        <div class="col-md-9"><span><?php echo $partinfo->getPartName(); ?></span></div>
      </div>
        <div class="clear ht_10"></div>
      <div class="form-group">
        <div class="col-md-2"><label for="psw"> Category :</label></div>
        <div class="col-md-9"><span><?php echo $partinfo->getCategoryID(); ?></span></div>
      </div>
        <div class="clear ht_10"></div>
      <div class="form-group">
        <div class="col-md-2"><label for="psw"> Quantity :</label></div>
        <div class="col-md-9"><span <?php if($partinfo->getQuantity() <= 0) { echo 'style="color:red;font-weight:bold"'; } ?>><?php echo $partinfo->getQuantity(); ?></span></div>
      </div>
        <div class="clear ht_10"></div>
      <div class="form-group">
        <div class="col-md-2"><label for="psw"> Added On :</label></div>
        <div class="col-md-9"><span><?php echo $partinfo->getDateTime(); ?></span></div>
      </div>
        <div class="clear ht_10"></div>
      <div class="form-group">
        <div class="col-md-2"><label for="psw"> Description :</label></div>
        <div class="col-md-9"><span><?php echo $partinfo->getDescription(); ?></span></div>
      </div>
        <div class="clear ht_10"></div>
      <div class="form-group">
        <div class="col-md-2"><label for="psw"> Image :</label></div>
        <div class="col-md-9"><img src="../administrator/uploads/<?php echo $partinfo->getImageName(); ?>" style="width:300px;height:300px;border:3px solid #D0D0D0;border-radius:5px;"/></div>
      </div>
    </div>
  </div>   
</div>
</div>  
          </div>
        </div>
    <div class="clear ht_20"></div>

<?php include '../view/footer.php'; ?>                                                             <!-- including footer file -->