<div class="row">
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
                  <li class="breadcrumb-item green-text">Management User
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
  <div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <div class="row">
           
            <a  class="btn green right mb-3 modal-trigger" href="<?= base_url('Admin/ManagementUser/TambahUser') ?>"><i class="fas fa-plus"></i> Tambah User</a>
            <div class="col s12">
              <table id="tabelLaporan" class="display" style="width: 100%;">
                <thead >
                  <tr>
                    <th>No</th>
                    <th>Nama Lengkap</th>
                    <th>Nip</th>
                    <th>Jabatan</th>
                    <th>Level</th>
                    <th>Email</th>
                    <th>Tanggal Lahir</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($user as $s) : ?>
                    <tr>
                        <td><?= $i++; ?></td>
                        <td><?= $s['nama_lengkap']; ?></td>
                        <td><?= $s['nip']; ?></td>
                        <td><?= $s['jabatan']; ?></td>
                        <td><?= $s['level']; ?></td>
                        <td><?= $s['email']; ?></td>
                        <td><?= $s['tgl_lahir']; ?></td>
                        <td>
                            <a href="<?= base_url('Admin/ManagementUser/EditUser/'); ?><?= $s['id_user']; ?>"><i class="fas fa-edit" style="font-size: 20px;"></i></a>
                            <a class="tombol-hapus" href="<?= base_url('Admin/ManagementUser/DeleteUser/'); ?><?= $s['id_user']; ?>"><i class="fas fa-trash red-text"></i></a>
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

