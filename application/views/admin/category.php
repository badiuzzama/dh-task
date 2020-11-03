
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Category</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="<?= base_url();?>admin/home">Home</a></li>
              <li class="breadcrumb-item active">Category</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        <a class="btn btn-info" style="margin-top: 10px;" href="addcategory">Add Category</a>
            <div class="card-body">
            <?php if ($this->session->flashdata('category_success')) { ?>
  
            <script>
            $("document").ready(function(){
    setTimeout(function(){
        $(".alert-success").remove();
    }, 2000 ); // 5 secs

});
            </script>
        <div class="alert alert-success"> <?= $this->session->flashdata('category_success') ?> </div>
    <?php } ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Category</th>
                  <th>Link</th>
                  <th>Parent</th>
                  <th>Sort</th>
                  <th>Modify</th>
                </tr>
                </thead>
                <tbody>
                  <?php
                  if(isset($data))
                  {
                     foreach ($data as $row)
                     {
                       ?>
                <tr>
                  <td><?= $row['id'];?></td>
                  <td><?= $row['name']; ?></td>
                  <td><?= $row['link']; ?></td>
                  <td><?= $row['parent']; ?></td>
                  <td><?= $row['sort']; ?></td>
                  <td><a href="<?=site_url();?>admin/edit_category/<?= $row['id'];?>"><i class="fa fa-edit"></i></a> <a href="<?=site_url();?>admin/delete_category/<?= $row['id'];?>" onclick="return confirm('Are you sure you want to delete this item?');"><i class="fa fa-trash"></i></a></td>
                </tr>
                <?php
                     }
                  }
                  ?>
                </tbody>
                <tfoot>
                <tr>
                  <th>ID</th>
                  <th>Category</th>
                  <th>Link</th>
                  <th>Parent</th>
                  <th>Sort</th>
                  <th>Modify</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
