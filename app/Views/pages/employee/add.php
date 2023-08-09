<?= $this->extend('layout/index') ?>

<?= $this->section('admin-section') ?>


<div class="section-header">
    <div class="section-header-back">
        <a href="<?= base_url('dashboard') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Tambah Pegawai</h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
        <div class="breadcrumb-item"><?= $title ?></div>
    </div>
</div>

<div class="section-body">
    <h2 class="section-title">Tambahkan data pegawai baru</h2>
    <p class="section-lead">
        On this page you can create a new employee and fill in all fields.
    </p>

    <?= $this->include('layout/alert'); ?>
    <form method="POST" action="/Employee/save" enctype="multipart/form-data">
        <?= csrf_field(); ?>
        <div class="row">
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <div class="form-group mb-4">
                            <label>Foto</label>
                            <div style="display: flex;" id="preview-images"></div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="card">

                    <div class="card-body row">
                        <div class="form-group col-6 mb-4 ">
                            <label>Name</label>
                            <input class="form-control" type="text" name="name" placeholder="ex: Nama Pegawai">
                        </div>
                        <div class="form-group col-6 mb-4 ">
                            <label>Jenis Kelamin</label>
                            <select class="form-control" name="gender">
                                <option>Pilih jenis kelamin...</option>
                                <option value="Pria">Pria</option>
                                <option value="Wanita">Wanita</option>
                            </select>
                        </div>
                        <div class="form-group col-6 mb-4 ">
                            <label>Nomor Telphone</label>
                            <input class="form-control" type="number" name="phone_number" placeholder="ex: 08921xxxx">
                        </div>
                        <div class="form-group col-6 mb-4 ">
                            <label>Email</label>
                            <input class="form-control" type="email" name="email" placeholder="ex: user@gmail.com">
                        </div>
                        <div class="form-group col-12 mb-4 ">
                            <label>Alamat</label>
                            <textarea name="address" class="summernote-simple" style="display: none;"></textarea>
                        </div>
                        <div class="form-group col-6 mb-4 ">
                            <label>Position</label>
                            <input class="form-control" type="text" name="position" placeholder="ex: Manager">
                        </div>
                        <div class="form-group col-6 mb-4 ">
                            <label>Department</label>
                            <input class="form-control" type="text" name="department" placeholder="ex: Marketing">
                        </div>
                        <div class="form-group col-6 mb-4 ">
                            <label>Salary</label>
                            <input class="form-control" type="number" name="salary" placeholder="ex: 2000000">
                        </div>
                        <div class="form-group col-6 mb-4 ">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option>Pilih status pegawai...</option>
                                <option value="Tetap">Tetap</option>
                                <option value="Kontrak">Kontrak</option>
                                <option value="Magang">Magang</option>

                            </select>
                        </div>
                        <div class="col-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-success">Simpan</button>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
<?= $this->endSection() ?>

<?= $this->section('admin-script') ?>
<script>
    $(document).ready(function() {
        $("#image").change(function() {
            $("#preview-images").empty();
            var total_file = document.getElementById("image").files.length;
            for (var i = 0; i < total_file; i++) {
                $("#preview-images").append("<img style='margin:10px auto 10px auto;' src='" + URL.createObjectURL(event.target.files[i]) + "' height='300'><br>");
            }
        });
    });
</script>
<?= $this->endSection() ?>