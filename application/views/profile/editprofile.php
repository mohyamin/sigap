
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
                  <li class="breadcrumb-item green-text">Profile
                  </li>
                  <li class="breadcrumb-item green-text">Edit Profile
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
            <div class="media display-flex align-items-center mb-2">
              <a class="mr-2" href="#">
                <img src="<?= base_url('uploads/image/'); ?><?= $user['image']; ?>" alt="users avatar"
                height="100" width="100">
              </a>
        <form action="<?= base_url('Profile/EditProfile/'); ?><?= $user['id_user'] ?>" method="POST" enctype="multipart/form-data">
            <div class="media-body">
              <h5 class="media-heading mt-0"><?= $user['nama_lengkap']; ?></h5>
              <!-- <div class="user-edit-btns display-flex"> -->
                <div class="mt-2">
                  <input type="file" id="image" name="image" >
                </div>
              </div>
            
          </div>
          <!-- users edit media object ends -->
          <!-- users edit account form start -->
            <div class="row">
              <div class="col s12 m6">
                <div class="row">
                  <div class="col s12 input-field">
                    <input id="nip" name="nip" type="text" class="validate" value="<?= $user['nip']; ?>">
                    <label for="nip">NIP</label>
                    <small class="errorTxt1"></small>
                  </div>
                  <div class="col s12 input-field">
                    <input id="nama" name="nama" type="text" class="validate" value="<?= $user['nama_lengkap']; ?>" 
                      data-error=".errorTxt2">
                    <label for="nama">Nama Lengkap</label>
                    <?= form_error('nama', '<small class="red-text">', '</small>'); ?>
                  </div>
                  
                </div>
              </div>
              <div class="col s12 m6">
                <div class="row">
                <div class="col s12 input-field">
                    <input id="email" name="email" type="email" class="validate"  value="<?= $user['email']; ?>"
                    data-error=".errorTxt3">
                    <label for="email">Email</label>
                    <?= form_error('email', '<small class="red-text">', '</small>'); ?>
                </div>
                  <div class="col s12 input-field">
                  <input id="tgllahir" name="tgllahir" type="date" class="validate" value="<?= $user['tgl_lahir'] ?>">
                    <label for="tgllahir"></label>
                    <?= form_error('tgllahir', '<small class="red-text">', '</small>'); ?>
                  </div>
                </div>
              </div>
              <div class="col s12 display-flex justify-content-end mt-3">
                <button type="submit" class="btn indigo z-depth-1">
                  Save changes</button>
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