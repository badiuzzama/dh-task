    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row welcome">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <form method="post" action="<?=base_url('admin/edit_state');?>">
              <div class="inner">
                <?php
                foreach ($data as $row) {
                ?>
                <input type="hidden" name="id" value="<?=$row['id'];?>">
                <h3><input type="text" name="state" value="<?=$row['state'];?>" style="width: 100%;"></h3>
                <?php
                }
                ?>
              </div>
              <button class="btn btn-success" style="margin-left: 30%">Update State</button>
              </form>
            </div>
          </div>
        </div>
        <!-- /.row -->
        

            

            
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
