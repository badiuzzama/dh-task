<?php
$func=$this->uri->segment(2);
?>
<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?= base_url();?>admin/home" class="brand-link">
      <img src="<?= base_url();?>public/_static/images/logo.png" alt="Logo" class="brand-image img-circle elevation-3"
           style="opacity: .8">
    </a>
</aside>


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
        	<div class="col-sm-4"></div>
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">
            	<a href="<?=base_url('admin/home');?>">Home</a>&nbsp&nbsp
            	<a href="<?=base_url('admin/state');?>">State</a>&nbsp&nbsp
            	<a href="<?=base_url('admin/district');?>">District</a>&nbsp&nbsp
            	<a href="<?=base_url('admin/child');?>">Child</a>&nbsp&nbsp
            	<a href="<?=base_url('admin/logout');?>">Logout</a>&nbsp&nbsp
            </h1>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
     