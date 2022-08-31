
      <div class="row">
        <div class="content-wrapper-before"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="mt-0 mb-0"><span><?= $title; ?></span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item green-text"><?= $this->session->userdata('level'); ?>
                  </li>
                  <li class="breadcrumb-item green-text">Management User
                  </li>
                  <li class="breadcrumb-item green-text">Tambah User
                  </li>
                </ol>
              </div>
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="container">
            <!-- users edit start -->
<div class="section users-edit">
  <div class="card z-depth-1">
    <div class="card-content">
      <!-- <div class="card-body"> -->
  
        <div class="row">
          <div class="col s12" id="account">
            <!-- users edit media object start -->
            
        <form action="<?= base_url('Admin/ManagementUser/TambahUser/'); ?>" method="POST" enctype="multipart/form-data">
            
          <!-- users edit media object ends -->
          <!-- users edit account form start -->
            <div class="row">
                  <div class="col s6 input-field">
                    <input id="nip" name="nip" type="text" class="validate" value="">
                    <label for="nip">NIP</label>
                    <?= form_error('nip', '<small class="red-text">', '</small>'); ?>
                  </div>
                  <div class="col s6 input-field">
                    <input id="nama" name="nama" type="text" class="validate" value="" 
                      data-error=".errorTxt2">
                    <label for="nama">Nama Lengkap</label>
                    <?= form_error('nama', '<small class="red-text">', '</small>'); ?>
                  </div>
                  <div class="col s6 input-field">
                    <select class="select2-icons browser-default" id="jabatan" name="jabatan">
                            <option selected>Pilih Level</option>
                            <?php foreach($jabatan as $j ) : ?>
                            <option value="<?= $j['id_jabatan'] ?>" ><?= $j['jabatan'] ?></option>
                            <?php endforeach; ?>
                        </select>
                  </div>
                  <div class="col s6 input-field">
                     <select class="select2-icons browser-default" id="level" name="level">
                            <option selected>Pilih Level</option>
                            <option value="Admin">Admin</option>
                            <option value="Camat">Camat</option>
                            <option value="Sekcam">Sekcam</option>
                            <option value="User" >User</option>
                        </select>
                  </div>
                  <div class="col s6 input-field">
                    <input id="email" name="email" type="text" class="validate" 
                      data-error=".errorTxt2">
                    <label for="email">Email </label>
                    <?= form_error('email', '<small class="red-text">', '</small>'); ?>
                  </div>
                  <div class="col s6 input-field">
                    <input id="tgl_lahir" name="tgl_lahir" type="date" class="validate" 
                      data-error=".errorTxt2">
                    <label for="tgl_lahir">Tanggal Lahir </label>
                    <?= form_error('tgl_lahir', '<small class="red-text">', '</small>'); ?>
                  </div>
                  <div class="col s6 input-field">
                    <input id="password" name="password" type="password" class="validate" 
                      data-error=".errorTxt2">
                    <label for="password">Password </label>
                    <?= form_error('tgl_lahir', '<small class="red-text">', '</small>'); ?>
                  </div>
                  <div class="col s12 display-flex justify-content-end mt-3">
                <button type="submit" class="btn indigo z-depth-1">
                  Tambah User</button>
              </div>
              <!-- <button type="submit">Update</button> -->
          </form>
            </div>
            <!-- users edit account form ends -->
          </div>
          
      <!-- </div> -->
    </div>
  </div>
</div>