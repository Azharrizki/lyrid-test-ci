<?= $this->extend('layout/index') ?>

<?= $this->section('admin-section') ?>

<div class="section-header">
  <h1>Form Validation</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
    <div class="breadcrumb-item"><a href="#">Forms</a></div>
    <div class="breadcrumb-item">Form Validation</div>
  </div>
</div>

<div class="section-body">
  <h2 class="section-title">Form Validation</h2>
  <p class="section-lead">
    Form validation using default from Bootstrap 4
  </p>

  <div class="row flex justify-content-center">
    <div class="col-12 ">
      <div class="card">
        <form action="/Pengguna/update" enctype="multipart/form-data" method="POST">
          <div class="card-header">
            <h4>Data Pengguna</h4>
          </div>
          <input type="hidden" name="id" value="<?= $user['id'] ?>" required>
          <div class="card-body">
            <div class="row">
              <div class="form-group col-6">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?= $user['email'] ?>" required>
              </div>
              <div class="form-group col-6">
                <label>Nama Lengkap</label>
                <input type="text" class="form-control" name="fullname" value="<?= $user['fullname'] ?>" required>
              </div>
            </div>
            <div class="row">
              <div class="form-group col-6">
                <label>Username</label>
                <input type="text" class="form-control" name="username" value="<?= $user['username'] ?>" required>
              </div>
              <div class="form-group col-6">
                <label for="">Role</label>
                <select class="form-control" name="role" id="role">
                  <option>Pilih role pengguna...</option>
                  <?php foreach ($role as $key) : ?>
                    <option value="<?= $key['id'] ?>" <?= $user['role'] == $key['name'] ? 'selected' : '' ?>><?= $key['name'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div>
          <div class="card-footer text-right">
            <button class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?= $this->endSection() ?>