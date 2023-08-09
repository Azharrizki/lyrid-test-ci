<?php if (session()->getFlashdata('berhasil')) : ?>
 <div class="alert alert-success alert-dismissible show fade">
  <div class="alert-body">
   <button class="close" data-dismiss="alert">
    <span>×</span>
   </button>
   <?= session()->getFlashdata('berhasil'); ?>
  </div>
 </div>
<?php elseif (session()->getFlashdata('gagal')) : ?>
 <div class="alert alert-danger alert-dismissible show fade">
  <div class="alert-body">
   <button class="close" data-dismiss="alert">
    <span>×</span>
   </button>
   <?= session()->getFlashdata('gagal'); ?>
  </div>
 </div>
<?php endif; ?>