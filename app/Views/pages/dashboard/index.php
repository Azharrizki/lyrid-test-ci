<?= $this->extend('layout/index'); ?>

<?= $this->section('admin-section'); ?>

<div class="section-header">
 <h1>Dashboard</h1>
</div>

<div class="row">
 <div class="col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
   <div class="card-icon bg-primary">
    <i class="far fa-user"></i>
   </div>
   <div class="card-wrap">
    <div class="card-header">
     <h4>Total Pegawai</h4>
    </div>
    <div class="card-body">
     <?= $employee ?> Orang
    </div>
   </div>
  </div>
 </div>
 <div class="col-md-6 col-sm-6 col-12">
  <div class="card card-statistic-1">
   <div class="card-icon bg-danger">
    <i class="far fa-newspaper"></i>
   </div>
   <div class="card-wrap">
    <div class="card-header">
     <h4>Total Pengguna</h4>
    </div>
    <div class="card-body">
     <?= $user ?> Pengguna
    </div>
   </div>
  </div>
 </div>
</div>


<?= $this->endSection() ?>