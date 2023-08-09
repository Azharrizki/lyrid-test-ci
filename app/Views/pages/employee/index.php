<?= $this->extend('layout/index') ?>

<?= $this->section('admin-section') ?>

<div class="section-header">
    <h1><?= $title ?></h1>
    <div class="section-header-breadcrumb">
        <div class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Admin</a></div>
        <div class="breadcrumb-item"><?= $title ?></div>
    </div>
</div>

<div class="section-body">
    <?= $this->include('layout/alert') ?>

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <a class="btn btn-success mb-3" href="<?= base_url('tambah-pegawai') ?>">
                        Tambah Pegawai
                    </a>
                    <div class="table-responsive">
                        <table id="datatable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Image</th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Departement</th>
                                    <th>Salary</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($pegawai as $p) :
                                ?>
                                    <tr>
                                        <td><?= $i++ ?></td>
                                        <td><img src="<?= base_url('') ?>/storage/image/<?= $p['image'] ?>" alt="" width="100px" height="100px"></td>
                                        <td><?= $p['name'] ?></td>
                                        <td><?= $p['position'] ?></td>
                                        <td><?= $p['department'] ?></td>
                                        <td><?= number_to_currency($p['salary'], 'IDR') ?></td>
                                        <td>
                                            <?php if ($p['status'] == 'Tetap') : ?>
                                                <div class="badge badge-success"><?= $p['status'] ?></div>
                                            <?php elseif ($p['status'] == 'Kontrak') : ?>
                                                <div class="badge badge-info"><?= $p['status'] ?></div>
                                            <?php elseif ($p['status'] == 'Magang') : ?>
                                                <div class="badge badge-warning"><?= $p['status'] ?></div>
                                            <?php endif ?>
                                        </td>
                                        <td class="text-center">
                                            <a href="<?= base_url('data-pegawai/' . $p['id']) ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                                            <button class="btn-delete btn btn-danger ml-1" type="button" data-title="Hapus Armada" data-body="#modal-delete-employee" data-id="<?= $p['id']; ?>"><i class="fas fa-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<form class="modal-part" id="modal-delete-employee" action="/Employee/delete">
    <?= csrf_field(); ?>
    <p>Apakah anda yakin untuk menghapus data pegawai ini?</p>
    <input type="hidden" name="id" id="id">
</form>
<?= $this->endSection() ?>

<?= $this->section('admin-script') ?>
<script>
    $(document).on("click", ".btn-delete", function() {
        $(".modal-body #id").val($(this).data("id"));
    });

    // Show Modal Hapus Data
    $(".btn-delete").fireModal({
        title: $(".btn-delete").data("title"),
        body: $($(".btn-delete").data("body")),
        footerClass: "bg-whitesmoke",
        buttons: [{
                text: "Cancel",
                closeButton: true,
                class: "btn btn-secondary btn-shadow",
                handler: function(closeModal) {
                    $.destroyModal(closeModal);
                },
            },
            {
                text: "Hapus",
                submit: true,
                class: "btn btn-danger btn-shadow",
                handler: function(modal) {},
            },
        ],
    });
</script>
<?= $this->endSection() ?>