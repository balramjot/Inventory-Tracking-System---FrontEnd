<?php include '../view/header.php';?>                                    <!-- including header file -->
<body class="bg-color">
    <div class="container cont_cls">
            <h2><center>Forget Password</center></h2>
            <hr style="border-color:#808080"/>
<!-- for displaying alerts -->
            <?php if(!empty($_SESSION['error_user'])) { echo "<div class='alert alert-danger' role='alert'>".$_SESSION['error_user']."</div>"; } ?>
            <?php if(!empty($_SESSION['success_user'])) { echo "<div class='alert alert-success' role='alert'>".$_SESSION['success_user']."</div>"; } ?>
            <div class="clear ht_20"></div>
    <div id="content-wrapper">

      <form class="form-horizontal" action="index.php" method="POST">
        <div class="form-group">
            <div class="col-md-12">
                <label class="control-label col-sm-3" for="name">Email:</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" id="email" name="email" value="" placeholder="Enter Your Email Address" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <label class="control-label col-sm-3" for="dummy">&nbsp;</label>
                <div class="col-sm-6">             
                    <input type="hidden" name="action" value="forgetPassword" />
                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    <button type="button" class="btn btn-default" onClick="window.location.assign('../index.php')">Cancel</button>
                </div>
            </div>
        </div>
      </form>
            </div>      
          </div>
        </div>
    <div class="clear ht_20"></div>
<?php include '../view/footer.php'; ?>                                                             <!-- including footer file -->