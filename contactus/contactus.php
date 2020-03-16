<?php include '../view/header.php';?>                                    <!-- including header file -->
<body class="bg-color">
<?php include '../view/afterloginHeader.php';?> 
    <div class="container cont_cls">
            <h2><center>Contact US</center></h2>
            <hr style="border-color:#808080"/>
<!-- for displaying alerts -->
            <?php if(!empty($_SESSION['error_user'])) { echo "<div class='alert alert-danger' role='alert'>".$_SESSION['error_user']."</div>"; } ?>
            <?php if(!empty($_SESSION['success_user'])) { echo "<div class='alert alert-success' role='alert'>".$_SESSION['success_user']."</div>"; } ?>
            <div class="clear ht_20"></div>
            <div id="content-wrapper">

<div class="container-fluid">
  <!-- Area Chart Example-->
  <div class="card mb-3">
  <form method="POST" action="index.php">
    <div class="card-body">
      <div class="form-group">
        <div class="col-md-2 text-right"><label for="psw"> Name :</label></div>
        <div class="col-md-9">
          <input type="text" class="form-control" id="name" name="name" value="" placeholder="Enter Your Name" required>
        </div>
      </div>
        <div class="clear ht_10"></div>
      <div class="form-group">
        <div class="col-md-2 text-right"><label for="psw"> Email :</label></div>
        <div class="col-md-9">
          <input type="email" class="form-control" id="email" name="email" value="" placeholder="Enter Your Email" required>
        </div>
      </div>
        <div class="clear ht_10"></div>
      <div class="form-group">
        <div class="col-md-2 text-right"><label for="psw"> Subject :</label></div>
        <div class="col-md-9">
          <input type="text" class="form-control" id="subject" name="subject" value="" placeholder="Enter Subject" required>
        </div>
      </div>
        <div class="clear ht_10"></div>
      <div class="form-group">
        <div class="col-md-2 text-right"><label for="psw"> Message :</label></div>
        <div class="col-md-9">
          <textarea class="form-control" id="message" name="message" placeholder="Enter Your Message" required></textarea>
        </div>
      </div>
        <div class="clear ht_10"></div>
      <div class="form-group">
        <div class="col-md-2 text-right"><label for="psw"> &nbsp;</label></div>
        <div class="col-md-9">
          <input type="hidden" name="action" value="saveContact" />
          <button type="submit" name="submit" class="btn btn-success">Send</button>
        </div>
      </div>
    </div>
  </form>
  </div>   
</div>
</div>  
          </div>
        </div>
    <div class="clear ht_20"></div>

<?php include '../view/footer.php'; ?>                                                             <!-- including footer file -->