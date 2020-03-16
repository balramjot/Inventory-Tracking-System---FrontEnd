<?php include '../view/header.php';  ?>                                    <!-- including header file -->
<body class="bg-color">
<?php include '../view/afterloginHeader.php';  ?>     
    <div class="container cont_cls">
            <h2><center>Dashboard</center></h2>
            <hr style="border-color:#808080"/>
            <div class="clear ht_20"></div>
    <div id="content-wrapper">

            <div class="container-fluid">
              <!-- Area Chart Example-->
             
    <?php
    // query to get data for pie chart

      $db = Database::getDB();
      $qur_pie = "SELECT COUNT(transaction.part_id) AS total,transaction.part_id,parts.part_no FROM transaction,parts WHERE transaction.part_id = parts.id and transaction.user_id = '".$_SESSION['account']['user_id']."' GROUP BY transaction.part_id";
      $stmt_pie = $db->prepare($qur_pie);
      $stmt_pie->execute();
      $fet_pie = $stmt_pie->fetchAll();
      $stmt_pie->closeCursor();
      if(!empty($fet_pie))
      {
    ?>
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-chart-area"></i>
        Transactions Per Parts</div>
      <div class="card-body">
        <div id="piechart" style="height: 400px; width: 100%;"></div>
      </div>
    </div>
    <?php
      }
      else
      {
        echo "<div class='alert alert-warning' role='alert'>No Transactions Yet !!!!!</div>";
      } 
    ?>        
      
              
      
      
            </div>      
          </div>
        </div>
    <div class="clear ht_20"></div>
 <script>
window.onload = function () {
var options = {
  animationEnabled: true,
  backgroundColor: "#e4e6eb",
  data: [{
    type: "doughnut",
    innerRadius: "40%",
    showInLegend: true,
    legendText: "{label}",
    indexLabel: "{label}: #percent%",
    dataPoints: [
    <?php
      if(!empty($fet_pie))
      {
        foreach($fet_pie as $piedata)
        {
            ?>
            { label: "<?php echo $piedata['part_no']; ?>", y: <?php echo $piedata['total']; ?> },
    <?php
        }
      }
    ?>
    ]
  }]
};
$("#piechart").CanvasJSChart(options);                    // pie chart rendering

}
</script>
  <script src="../js/demo/jquery.canvasjs.min.js"></script>                                         <!-- js file for piechart -->
  <?php include '../view/footer.php'; ?>                                                             <!-- including footer file -->