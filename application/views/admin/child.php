
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
        <a class="btn btn-success" style="margin-top: 10px;" href="addchild">Add Child</a>
            <div class="card-body">
            <?php if ($this->session->flashdata('article_success')) { ?>
            <script>
              $("document").ready(function(){
                setTimeout(function(){
                $(".alert-success").remove();
                }, 2000 ); // 5 secs
              });
            </script>
            <div class="alert alert-success"> <?= $this->session->flashdata('article_success') ?> </div>
            <?php } ?>
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Sex</th>
                  <th>Date of Birth</th>
                  <th>Father's Name</th>
                  <th>Mother's Name</th>
                  <th>State</th>
                  <th>District</th>
                  <th>Action</th>
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
                  <td><?= $row['name']; ?></td>
                  <td><?= $row['sex']; ?></td>
                  <td><?= $row['dob']; ?></td>
                  <td><?= $row['father_name']; ?></td>
                  <td><?= $row['mother_name']; ?></td>
                  <td><?= $row['state']; ?></td>
                  <td><?= $row['district']; ?></td>
                  <td><a href="view_child/<?= $row['id'];?>" class="btn btn-primary">view</a></td>
                </tr>
                <?php
                     }
                  }
                  ?>
                </tbody>
                <tfoot>
                <tr>
                <th>Sno</th>
                  <th>Name</th>
                  <th>Category</th>
                  <th>Author</th>
                  <th>Date</th>
                  <th>Actions</th>
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
