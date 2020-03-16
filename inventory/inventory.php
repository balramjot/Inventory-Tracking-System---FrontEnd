<?php include '../view/header.php';?>                                    <!-- including header file -->
<style>
form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
  height:46px;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
<link href="../vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
<body class="bg-color">
<?php include '../view/afterloginHeader.php';?> 
    <div class="container cont_cls">
            <h2><center>Inventory Transaction</center></h2>
            <hr style="border-color:#808080"/>
    <!-- for displaying alerts -->
            <?php if(!empty($_SESSION['error_user'])) { echo "<div class='alert alert-danger' role='alert'>".$_SESSION['error_user']."</div>"; } ?>
            <?php if(!empty($_SESSION['success_user'])) { echo "<div class='alert alert-success' role='alert'>".$_SESSION['success_user']."</div>"; } ?>
            <div class="clear"></div>
            <div id="content-wrapper">

<div class="container-fluid">
  <!-- Area Chart Example-->
  <div class="card sm-12">
    <div class="col-md-6">
    <?php if($action == 'searchPart') { ?>
        <p><span class="badge"><?php echo count($allparts); ?></span> Results Found &nbsp;&nbsp;<a href="index.php?action=inventoryTrack"><span class="label label-success">Show All</span></a></p>
    <?php } ?>
    </div> 
    <div class="col-md-6">
        <form class="example" action="index.php" method="GET" style="margin:auto;max-width:300px;margin-right:15px;">
            <input type="text" placeholder="Part Number or Part Name" name="search">
            <input type="hidden" value="searchPart" name="action">
            <button type="submit"><i class="glyphicon glyphicon-search"></i></button>
        </form>
    </div> 

  <div class="clear ht_20"></div>
      <!-- Container (TOUR Section) -->
<div id="tour" class="bg-1">
<?php
  if(!empty($allparts))
  {
    $i = 1;
  foreach($allparts as $allpart)
  {
?>     
    <div class="text-center">
      <div class="col-sm-3" style="margin-bottom:10px;">
        <div class="thumbnail" style="background:#dce0e6;border:none;padding-top:10px;padding-bottom:10px;<?php if($allpart->getQuantity() <= 0) { echo "opacity:0.3;"; } ?>">
          <img src="../administrator/uploads/<?php echo $allpart->getImageName(); ?>" alt="<?php echo $allpart->getImageName(); ?>" style="width:100px;height:100px;border:3px solid #D0D0D0;border-radius:5px;"/>
          <p><strong><?php echo $allpart->getPartNo(); ?></strong></p>
          <p><?php echo $allpart->getPartName(); ?></p>
          <p style="font-weight:bold;color:<?php if($allpart->getQuantity() >= 1) { echo "green"; } else { echo "red"; } ?>"><?php if($allpart->getQuantity() >= 1) { echo $allpart->getQuantity()." Left"; } else { echo "Out of Order"; } ?></p>
          <?php
            if($allpart->getQuantity() >= 1)
            {
          ?>
          <button class="btn btn-primary" data-toggle="modal" data-target="#withdrawModal-<?php echo $allpart->getID(); ?>"><span class="glyphicon glyphicon-download"></span>&nbsp;Withdraw</button>
          <button class="btn btn-info" data-toggle="modal" data-target="#partDetail-<?php echo $allpart->getID(); ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;Detail</button>
          <?php
            }
            else
            {
          ?>
          <button class="btn btn-danger"><span class="glyphicon glyphicon-cog"></span>&nbsp;Out of Order</button>
          <button class="btn btn-info" data-toggle="modal" data-target="#partDetail-<?php echo $allpart->getID(); ?>"><span class="glyphicon glyphicon-plus"></span>&nbsp;Detail</button>
          <?php
            }
          ?>
        </div>
      </div>
    </div>

<!-- Modal -->
<div class="modal fade" id="partDetail-<?php echo $allpart->getID(); ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon glyphicon-plus"></span> Part Details</h4>
        </div>
        <div class="modal-body">
            <div class="form-group">
              <div class="col-md-3"><label for="psw"> Part Number :</label></div>
              <div class="col-md-9"><span><?php echo $allpart->getPartNo(); ?></span></div>
            </div>
              <div class="clear"></div>
            <div class="form-group">
              <div class="col-md-3"><label for="psw"> Part Name :</label></div>
              <div class="col-md-9"><span><?php echo $allpart->getPartName(); ?></span></div>
            </div>
              <div class="clear"></div>
            <div class="form-group">
              <div class="col-md-3"><label for="psw"> Category :</label></div>
              <div class="col-md-9"><span><?php echo $allpart->getCategoryID(); ?></span></div>
            </div>
             <div class="clear"></div>
            <div class="form-group">
              <div class="col-md-3"><label for="psw"> Quantity :</label></div>
              <div class="col-md-9"><span <?php if($allpart->getQuantity() <= 0) { echo 'style="color:red;font-weight:bold"'; } ?>><?php echo $allpart->getQuantity(); ?></span></div>
            </div>
              <div class="clear"></div>
            <div class="form-group">
              <div class="col-md-3"><label for="psw"> Added On :</label></div>
              <div class="col-md-9"><span><?php echo $allpart->getDateTime(); ?></span></div>
            </div>
              <div class="clear"></div>
            <div class="form-group">
              <div class="col-md-3"><label for="psw"> Description :</label></div>
              <div class="col-md-9"><span><?php echo $allpart->getDescription(); ?></span></div>
            </div>
              <div class="clear"></div>
        </div>
          <div class="clear"></div>
      </div>
    </div>
  </div>
    


  <div class="modal fade" id="withdrawModal-<?php echo $allpart->getID(); ?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">×</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Parts Withdrawn</h4>
        </div>
        <div class="modal-body">
          <form role="form" method="POST" action="index.php">
            <div class="form-group">
              <label for="psw"><span class="glyphicon glyphicon-shopping-cart"></span> Enter Quantity</label>
              <input type="number" class="form-control withdraw_quantity" name="widthdraw_quantity" placeholder="How many?" min="1" max="<?php echo $allpart->getQuantity(); ?>" step="1">
            </div>
            <p class="alert alert-warning">Quantity must be entered between <strong>1</strong> and <strong><?php echo $allpart->getQuantity(); ?></strong></p>
              <input type="hidden" name="part_id" value="<?php echo $allpart->getID(); ?>"/>
              <input type="hidden" name="action" value="changeInventory"/>
              <button type="submit" class="btn btn-block">Continue 
                <span class="glyphicon glyphicon-ok"></span>
              </button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
    }
  }
  else
  {
    echo "<div class='alert alert-info'>No Parts Found. Please try again later</div>";
  }
  ?>
      <div class="clear"></div>
  </div>
  </div>   
</div>
</div>  
          </div>
        </div>
    <div class="clear ht_20"></div>
<script>
  $(function () {
    $( ".withdraw_quantity" ).change(function() {
      var max = parseInt($(this).attr('max'));
      var min = parseInt($(this).attr('min'));
      if ($(this).val() > max)
      {
          $(this).val(max);
      }
      else if ($(this).val() < min)
      {
          $(this).val(min);
      }       
    }); 
});
</script>
<?php include '../view/footer.php'; ?>                                                             <!-- including footer file -->