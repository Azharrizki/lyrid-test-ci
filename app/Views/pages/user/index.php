<?= $this->extend('layout/index') ?>

<?= $this->section('admin-section'); ?>

<div class="section-header">
  <h1>Data Pengguna</h1>
  <div class="section-header-breadcrumb">
    <div class="breadcrumb-item"><a href="<?= base_url('dashboard') ?>">Admin</a></div>
    <div class="breadcrumb-item"><?= $title ?></div>
  </div>
</div>

<div class="section-body">
  <h2 class="section-title">Table</h2>
  <p class="section-lead">Example of some Bootstrap table components.</p>

  <?= $this->include('layout/alert') ?>

  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-body">
          <div class="table-responsive">
            <table id="datatable" class="table table-bordered table-md">
              <thead>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Create At</th>
                <th>Role</th>
                <th>Aksi</th>
              </thead>
              <tbody>
                <?php
                $i = 1;
                foreach ($users as $user) :
                  $date = new DateTime($user['created_at'])
                ?>
                  <tr>
                    <td><?= $i++ ?></td>
                    <td><?= $user['fullname'] ?></td>
                    <td><?= $user['email'] ?></td>
                    <td><?= $date->format('j F Y') ?></td>
                    <td><?= $user['role'] ?></td>
                    <td class="text-center">
                      <a href="<?= base_url('data-pengguna/' . $user['id']) ?>" class="btn btn-warning"><i class="fas fa-pen"></i></a>
                      <button class="btn-delete btn btn-danger ml-1" type="button" data-title="Hapus Pengguna" data-body="#modal-delete-user" data-id="<?= $user['id']; ?>"><i class="fas fa-trash"></i></button>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<form class="modal-part" id="modal-delete-user" action="/User/delete">
  <?= csrf_field(); ?>
  <p>Apakah anda yakin untuk menghapus pengguna ini?</p>
  <input type="hidden" name="id" id="id">
</form>
<?= $this->endSection() ?>

<?= $this->section('admin-script'); ?>
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