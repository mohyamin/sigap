
      <div class="row">
        <div class="content-wrapper-before"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="mt-0 mb-0"><span><?= $title; ?></span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item green-text">Profile
                  </li>
                  <li class="breadcrumb-item green-text">Edit Password
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
        <form action="<?= base_url('Profile/ChangePassword'); ?>" method="POST"> 
        <!-- users edit media object ends -->
         <!-- users edit account form start -->
            <div class="row">
              <div class="col s12 m6">
                <div class="row">
                  <div class="col s12 input-field">
                    <input id="password" name="password" type="password" class="validate">
                    <label for="password">Password Lama</label>
                    <?= form_error('password', '<small class="red-text">', '</small>'); ?>
                    <small class="errorTxt1"></small>
                  </div>
                  <div class="col s12 input-field">
                    <input id="password1" name="password1" type="password" class="validate">
                    <label for="password1">Password Baru</label>
                    <?= form_error('password1', '<small class="red-text">', '</small>'); ?>
                    </div>
                    <div class="col s12 input-field">
                    <input id="password2" name="password2" type="password" class="validate" >
                    <label for="password2">Konfirmasi Password</label>
                    <?= form_error('password2', '<small class="red-text">', '</small>'); ?>
                </div>
                </div>
              </div>
             
              
              <div class="col s12 display-flex justify-content-end mt-3">
                <button type="submit" class="btn indigo z-depth-1 green">
                Ubah Password</button>
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