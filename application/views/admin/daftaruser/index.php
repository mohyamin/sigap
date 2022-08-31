      <div class="row">
        <div class="content-wrapper-before"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="mt-0 mb-0"><span>Daftar User</span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item green-text">Admin
                  </li>
                  <li class="breadcrumb-item green-text">Daftar User
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
        <a  class="btn green right mb-3 modal-trigger" href="#modal1"><i class="fas fa-plus"></i> Tambah User</a>
          <div class="row">
            <div class="col s12">
              <table id="page-length-option" class="display">
                <thead >
                  <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama</th>
                    <th>Tanggal Lahir</th>
                    <th>Jabatan</th>
                    <th>Email</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                <?php $i = 1; ?>
                <?php foreach ($daftaruser as $users) : ?>
                  <tr>
                    <th><?= $i++; ?></th>
                    <td><?= $users['nip']; ?></td>
                    <td><?= $users['nama_user']; ?></td>
                    <td><?= $users['tanggal_lahir']; ?></td>
                    <td><?= $users['jabatan']; ?></td>
                    <td><?= $users['email']; ?></td>
                    <td>
                      <a class="modal-trigger" href="<?= base_url('Admin/DaftarUser/EditUser/'); ?><?= $users['id_user']; ?>" ><i class="fas fa-edit" ></i></a>
                      <a class="tombol-hapus" href="<?= base_url('Admin/Daftaruser/HapusUser/' . $users['id_user']); ?>"><i class="fas fa-trash red-text"></i></a>
                    </td>
                  </tr>
                  <?php endforeach; ?>
                </tfoot>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

