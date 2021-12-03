<?= $this->include('layout/header'); ?>

<?= $this->include('layout/preloader'); ?>

<?= $this->include('layout/navbar'); ?>

<?= $this->include('layout/sidebar'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

  <?= $this->include('layout/breadcrumb'); ?>

  <!-- Main content -->
  <section class="content">
    <?= $this->renderSection('content'); ?>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?= $this->include('layout/footer1'); ?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<?= $this->include('layout/footer'); ?>