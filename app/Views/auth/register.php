<?= $this->extend("auth/layout/index"); ?>

<?= $this->section("auth"); ?>

<section class="section">
 <div class="container mt-5">
  <div class="row justify-content-center">
   <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-6">
    <!-- <div class="login-brand">
                    <img src="assets/img/stisla-fill.svg" alt="logo" width="100" class="shadow-light rounded-circle">
                </div> -->

    <div class="card card-primary">
     <div class="card-header">
      <h4>Daftar Akun</h4>
     </div>

     <div class="card-body">
      <?= view('Myth\Auth\Views\_message_block') ?>
      <form action="<?= url_to('register') ?>" method="post">
       <?= csrf_field() ?>

       <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php endif ?>" name="email" aria-describedby="emailHelp" placeholder="<?= lang('Auth.email') ?>">
        <small id="emailHelp" class="form-text text-muted"><?= lang('Auth.weNeverShare') ?></small>
        <div class="invalid-feedback">
        </div>
       </div>

       <div class="form-group">
        <label for="email">Username</label>
        <input type="text" class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>">
       </div>

       <div class="form-group">
        <label for="email">Fullname</label>
        <input type="text" class="form-control" name="fullname" placeholder="Nama Lengkap">
       </div>

       <div class="row">
        <div class="form-group col-6">
         <label for="password" class="d-block">Password</label>
         <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off">
        </div>
        <div class="form-group col-6">
         <label for="password2" class="d-block">Password Confirmation</label>
         <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
        </div>
       </div>

       <div class="form-group">
        <button type="submit" class="btn btn-primary btn-lg btn-block">
         Daftar Akun
        </button>
       </div>

       <p>Sudah memiliki akun? <a href="<?= url_to('login') ?>">Sign In</a></p>

      </form>
     </div>
    </div>
    <div class="simple-footer">
     Copyright &copy; Rentcar 2023
    </div>
   </div>
  </div>
 </div>
</section>

<?= $this->endSection(); ?>