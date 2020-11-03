<script src="../public/ckeditor/ckeditor.js"></script>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-3"></div>
          <div class="col-md-5">
            <!-- general form elements -->
            <div class="card card-primary">
              <div class="card-header" style="margin-top: 5%;">
                <h3 class="card-title"><a href="<?= base_url('admin/child')?>"><i class="fa fa-arrow-left"></i></a> Add Child</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?=base_url('admin/addchild');?>" method="post" enctype="multipart/form-data">
                <div class="card-body">
                  <div class="form-group">
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Name" required>
                  </div>
                  <div class="form-group">
                    <select class="custom-select" name="category_id" required>
                          <option value="">Sex</option>
                          <option>Male</option>
                          <option>Female</option>
                          <option>Others</option>
                        </select>
                  </div>
                  <div class="form-group">
                    <input type="date" name="dob" class="form-control" id="exampleInputEmail1" placeholder="Date of Birth" required>
                  </div>
                  <div class="form-group">
                    <input type="text" name="father_name" class="form-control" id="exampleInputEmail1" placeholder="Father's Name" required>
                  </div>
                  <div class="form-group">
                    <input type="text" name="mother_name" class="form-control" id="exampleInputEmail1" placeholder="Mother's Name" required>
                  </div>
                  <div class="form-group">
                    <select name="state" id="state" class="custom-select">
                      <option value="">Select State</option>
                    <?php
                    foreach ($data1 as $data) { ?>
                      <option value="<?= $data['id'];?>"><?= $data['state'];?></option>
<?php                    }
                    ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <select name="district" id="district" class="custom-select">
                      <option value="">Select District</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Take a Photo</label>
                    <input type="file" accept=".pdf" name="files">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>
            <!-- /.card -->

            <!-- Form Element sizes -->
            
          <!--/.col (right) -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
  </script>
  <script type="text/javascript">
$(document).ready(function(){
 $('#state').change(function(){
  var state_id = $('#state').val();
  if(state_id != '')
  {
   $.ajax({
    url:"<?php echo base_url(); ?>admin/fetch_district",
    method:"POST",
    data:{state_id:state_id},
    success:function(data)
    {
     $('#district').html(data);
    }
   });
  }
  else
  {
   $('#district').html('<option value="">Select District</option>');
  }
 });
});
  </script>
