<script src="<?=base_url();?>public/ckeditor/ckeditor.js"></script>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-9">
            <a href="<?= base_url('admin/child')?>"><i class="fa fa-arrow-left"></i></a>
            <?php
              $path = DOCUMENTROOT."/public/photo/";
                  if(isset($data))
                  {
                     foreach ($data as $row)
                     {
                       ?>
              <table class="responsive" style="width: 100%">
                <tr>
                  <td><img src="<?= $path.$row['photo'];?>" class="brand-image img-circle elevation-5"></td>
                  <td colspan="2"></td>
                </tr>
                <tr>
                  <td>Name: <?= $row['name'];?></td>
                  <td>Sex: <?= $row['sex'];?></td>
                  <td>Date of Birth : <?= $row['dob'];?></td>
                </tr>
                <tr>
                  <td>Father's Name : <?= $row['father_name'];?></td>
                  <td>Mother's Name : <?= $row['mother_name'];?></td>
                  <td>State : <?= $row['state'];?></td>
                </tr>
                 <tr>
                  <td>District : <?= $row['district'];?></td>
                </tr>
              </table>
              <?php
            }
          }
          ?>
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