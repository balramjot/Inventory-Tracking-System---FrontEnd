<?php include '../view/header.php';?>                                    <!-- including header file -->
<body class="bg-color">
<?php include '../view/afterloginHeader.php';  ?> 
    <div class="container cont_cls">
            <h2><center>Change Password</center></h2>
            <hr style="border-color:#808080"/>
<!-- for displaying alerts -->
            <?php if(!empty($_SESSION['error_user'])) { echo "<div class='alert alert-danger' role='alert'>".$_SESSION['error_user']."</div>"; } ?>
            <?php if(!empty($_SESSION['success_user'])) { echo "<div class='alert alert-success' role='alert'>".$_SESSION['success_user']."</div>"; } ?>
            <div class="clear ht_20"></div>
    <div id="content-wrapper">

      <form class="form-horizontal" action="index.php" method="POST">
        <div class="form-group">
            <div class="col-md-12">
                <label class="control-label col-sm-3" for="cpass">Current Password:</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="email" name="current_password" value="" placeholder="Enter Current Password" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <label class="control-label col-sm-3" for="npass">New Password:</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="email" name="new_password" value="" placeholder="Enter New Password" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <label class="control-label col-sm-3" for="rpass">Retype Password:</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" id="email" name="retype_password" value="" placeholder="Re-Enter New Password" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-12">
                <label class="control-label col-sm-3" for="dummy">&nbsp;</label>
                <div class="col-sm-6">             
                    <input type="hidden" name="action" value="changePassword" />
                    <button type="submit" class="btn btn-success" name="submit">Submit</button>
                    <button type="button" class="btn btn-default" onClick="window.location.href = window.location.href">Cancel</button>
                </div>
            </div>
        </div>
      </form>
            </div>      
          </div>
        </div>
    <div class="clear ht_20"></div>
<?php include '../view/footer.php'; ?>                                                             <!-- including footer file -->