    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row welcome">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <form method="post" action="<?=base_url('admin/edit_district');?>">
              <div class="inner">
                <h3>
                <select name="state_id" style="width: 100%">
                  <?php
                  foreach ($data as $row) {
                  foreach ($data1 as $row1) 
                  {
                    ?>
                    <option value="<?=$row1['id'];?>"<?php if($row['state_id']==$row1['id']) echo "selected";?>><?=$row1['state'];?></option>
                   <?php
                   }
                   ?> 
                </select>
              </h3>
                <input type="hidden" name="id" value="<?=$row['id'];?>">
                <h3><input type="text" name="district" value="<?=$row['district'];?>" style="width: 100%;"></h3>
                <?php
                }
                ?>
              </div>
              <button class="btn btn-success" style="margin-left: 30%">Update District</button>
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
  
