
      <div class="row">
        <div class="content-wrapper-before"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="mt-0 mb-0"><span>Edit User</span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item green-text">Admin
                  </li>
                  <li class="breadcrumb-item green-text">Daftar User
                  </li>
                  <li class="breadcrumb-item green-text">Edit User
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
                <div class="col s12 m6">
                <form action="<?= base_url('Admin/DaftarUser/UbahUser'); ?>" method="POST" >
                    <div class="row">
                        <div class="col s12 input-field">
                            <input id="nip" name="nip" type="hidden" value="<?= $userdetail['nip']; ?>">
                            <input id="nama" name="nama" type="text" value="<?= $userdetail['nama_user']; ?>">
                            <?= form_error('nama', '<small class="red-text">', '</small>'); ?>
                        </div>
                        <div class="col s12 input-field">
                            <input id="email" name="email" type="email" class="validate" value="<?= $userdetail['email']; ?>">
                            <?= form_error('email', '<small class="red-text">', '</small>'); ?>
                        </div>
                        <div class="col s12 input-field">
                            <input id="tgllahir" name="tgllahir" type="date" class="validate" value="<?= $userdetail['tanggal_lahir']; ?>">
                            <?= form_error('tgllahir', '<small class="red-text">', '</small>'); ?>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6" id="role_ubah">
                    <div class="row">
                        <div class="col s12 input-field">
                            <h6>Role</h6>
                            <?php foreach($jabatan as $j) : ?>
                            <p class="mb-1">
                                <label>
                                    <input name="role" <?php if($j['id'] == $userdetail['role_id']){echo 'checked'; } ?> value="<?= $j['id']; ?>" type="radio"  />
                                    <span><?= $j['jabatan']; ?></span>
                                </label>
                            </p>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
                <div class="col s12">
                    <button type="submit" class="btn green right">Ubah data</button>
                </div>
            </div>
        </form>
          </div>
        </div>
      </div>
    </div>
  </div>

