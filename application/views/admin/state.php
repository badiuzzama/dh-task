    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row welcome">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <form method="post" action="<?=base_url('admin/addstate');?>">
              <div class="inner">
                <h3><input type="text" name="state" style="width: 100%;"></h3>
              </div>
              <button class="btn btn-success" style="margin-left: 30%">Add State</button>
              </form>
            </div>
          </div>
          <?php
          $i=1;
                   foreach ($data as $row)
                     {
                      ?>
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3><?=$i.'. '.$row['state'];?></h3>
              </div>
              <a href="<?= base_url();?>admin/edit_state/<?=$row['id'];?>" class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <?php
            $i++;
          }
          ?>

        </div>
        <!-- /.row -->
        

            

            
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
