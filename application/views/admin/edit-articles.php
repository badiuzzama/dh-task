<script src="<?=base_url();?>public/ckeditor/ckeditor.js"></script>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-9">
            <!-- general form elements -->
            <!--<div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>-->
              <!-- /.card-header -->
              <!-- form start -->
              <?php foreach ($data as $row):?>
              <form role="form" action="<?=base_url('admin/edit_articles');?>" method="post" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?=$row['id']; ?>">
                <div class="card-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Article Title</label>
                    <input type="text" name="title" value="<?= $row['title'];?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Title">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Category</label>
                    <select class="custom-select" name="category_id">
                          <option value="" disabled>Select</option>
                          <?php
                  if(isset($data2))
                  {
                     foreach ($data2 as $row2)
                     {
                       ?>
                  <option value="<?= $row2['id'];?>" <?php if($row['category_id']==$row2['id']) echo 'selected';?>><?= $row2['name'];?></td>
                <?php
                     }
                  }
                  ?>
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Article Body</label>
                    <textarea class="form-control" rows="3" name="body" id="editor1"><?= $row['body'];?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Article PDF</label>
                    <input type="file" accept=".pdf" name="files">
                    <a href="<?= base_url();?>public/photo/<?= $row['files'];?>" target="_blanck"><?= $row['files'];?></a>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Access</label>
                    <select class="custom-select" name="access">
                          <option value="" disabled>Select</option>
                          <option value="0" <?php if($row['access']=='0') echo 'selected';?>>Everyone</option>
                          <option value="1" <?php if($row['access']=='1') echo 'selected';?>>Distributor</option>
                          <option value="2" <?php if($row['access']=='2') echo 'selected';?>>LDP</option>
                          <option value="3" <?php if($row['access']=='2') echo 'selected';?>>TO</option>
                        </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Author</label>
                    <select class="custom-select" name="user_id">
                          <option value="" disabled>Select</option>
                          <?php
                  if(isset($data1))
                  {
                     foreach ($data1 as $row1)
                     {
                       ?>
                  <option value="<?= $row1['id'];?>" <?php if($row['user_id']==$row1['id']) echo 'selected';?>><?= $row1['first_name'].' '.$row1['last_name']; ?></td>
                <?php
                     }
                  }
                  ?>
                        </select>
                  </div>
                  <div class="form-group">
                  <label>Published</label><br>
                    <input class="form-check-input" type="radio" name="is_published" value="1" <?php if($row['is_published']=='1') echo 'checked';?>>
                    <label class="form-check-label">Yes</label><br>
                    <input class="form-check-input" type="radio" name="is_published" value="0" <?php if($row['is_published']=='0') echo 'checked';?>>
                    <label class="form-check-label">No</label>
                  </div>
                  <div class="form-group">
                  <label>Add to Menu</label><br>
                    <input class="form-check-input" type="radio" name="in_menu" value="1" <?php if($row['in_menu']=='1') echo 'checked';?>>
                    <label class="form-check-label">Yes</label><br>
                    <input class="form-check-input" type="radio" name="in_menu" value="0" <?php if($row['in_menu']=='0') echo 'checked';?>>
                    <label class="form-check-label">No</label>
                  </div>
                  <div class="form-group">
                  <label>Position</label><br>
                  <input type="text" name="position" value="<?= $row['position'];?>" class="form-control" id="exampleInputEmail1" placeholder="Enter Position">
                  </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" name="submit" class="btn btn-primary">Update</button>
                  <button type="button" class="btn btn-warning" onclick="window.location.href='../articles'">Back</button>
                </div>
              </form>
              <?php endforeach;?>
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