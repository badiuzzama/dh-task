
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Add Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url();?>home">Home</a></li>
              <li class="breadcrumb-item"><a href="<?= base_url();?>admin/category">Category</a></li>
              <li class="breadcrumb-item active">Add Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-6">
            <!-- general form elements -->
            <!--<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>-->
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" action="<?=base_url('admin/addcategory');?>" method="post">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="Enter Category">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Link</label>
                    <input type="text" name="link" class="form-control" id="exampleInputEmail1" placeholder="Enter Link">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Parent</label>
                    <input type="text" name="parent" class="form-control" id="exampleInputEmail1" placeholder="Enter Parent">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Sort</label>
                    <input type="text" name="sort" class="form-control" id="exampleInputEmail1" placeholder="Enter Parent">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  <button type="button" class="btn btn-warning" onclick="window.location.href='<?= base_url();?>admin/category'">Back</button>
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
