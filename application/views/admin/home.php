    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row welcome">
          <?php
           if(isset($data))
                  {
                     foreach ($data as $row)
                     {
                       ?>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <p>Name : <?= $row['name'];?></p>
              </div>
          </div>
        </div>
          <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <p>Organization : <?= $row['organisation'];?></p>
              </div>
          </div>
        </div>
        <!-- /.row -->
        <div class="col-lg-4 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <p>Designation : <?= $row['designation'];?></p>
              </div>
          </div>
        </div>

          <div class="col-lg-6 col-6">
            <!-- small box -->
            <img src="<?= base_url("public/dist/img/prod-1.jpg"); ?>">
          </div>        

          <?php
          }
          }  
?>
            
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
