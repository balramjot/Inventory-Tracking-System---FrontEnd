<?php include '../view/header.php';?>                                    <!-- including header file -->

<body class="bg-color">
<div class="ht_100"></div>   
    <div class="container cont_cls">
        <div class="cst_div1">
            <h2><center>User Sign In</center></h2>
                <hr style="border-color:#808080"/>
            <?php if(!empty($_SESSION['error_user'])) { echo "<div class='alert alert-danger' role='alert'>".$_SESSION['error_user']."</div>"; } ?>   <!-- to display alerts -->
            <div class="clear ht_20"></div>
            <form action="../index.php" method="POST">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" class="form-control" id="email" placeholder="Enter Email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter Password" name="password" required>
                </div>
                    
                <p><a href="../forgetpassword">Forget Password ?</a></p>
                    
                <input type="hidden" name="action" value="login"/>
                <button type="submit" class="btn btn-success" name="signin">Sign In</button>
                    <div class="clear"></div>
            </form>
        </div>
    </div>
    <div class="ht_100 clear"></div>
<?php include '../view/footer.php'; ?>                                                             <!-- including footer file -->