        <div class="content-wrapper-before"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="mt-0 mb-0"><span><?= $title ?></span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item green-text"><?= $this->session->userdata('level'); ?>
                  </li>
                  <li class="breadcrumb-item green-text">Klasifikasi
                  </li>
                </ol>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="container">
            <div class="section section-data-tables">
        <div class="card">
            
      </div>

       <!-- Page Length Options -->
  <div class="col s12">
          <div class="container">
            <div class="section section-data-tables">
        <div class="card-panel ">
         
            <?php if($this->session->userdata('level') == "Admin")  : ?>
            <a  class="btn green left mb-2 modal-trigger" href="<?= base_url('Admin/Klasifikasi/tambah') ?>"><i class="fas fa-plus"></i> Tambah Klasifikasi</a>
            <?php endif; ?>
            <div class="row">
            <div class="col s12">
            <div style="overflow-x:auto;">
              <table id="page-length-option" class="display">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Kode Surat</th>
                    <th>Klasifikasi</th>
                    <th>Deskripsi</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>

                <?php $i = 1; ?>
                  <?php foreach ($klasifikasi as $k) : ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $k['kode_surat']; ?></td>
                      <td><?= $k['klasifikasi']; ?></td>
                      <td><?= $k['deskripsi']; ?></td>
                      <td>
                        <a href="<?= base_url('Admin/Klasifikasi/EditKlasifikasi/'); ?><?= $k['id_klasifikasi']; ?>"><i class="fas fa-edit"></i></a>
                        <a href="<?= base_url('Admin/Klasifikasi/HapusKlasifikasi/'); ?><?= $k['id_klasifikasi']; ?>" class="tombol-hapus"><i class="fas fa-trash red-text"></i></a>
                        </td>

                      <?php endforeach; ?>