      <div class="row z-depth-5">
        <div class="content-wrapper-before"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="mt-0 mb-0"><?= $title; ?></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item green-text">Admin</li>
                  <li class="breadcrumb-item green-text">My Profile</li>
                </ol>
              </div>
              
            </div>
          </div>
        </div>
        <div class="col s12">
          <div class="container">
            <!-- users view start -->
<div class="section users-view">
  <!-- users view media object start -->
  <div class="card-panel z-depth-1">
    <div class="row">
      <div class="col s12 m7">
        <div class="display-flex media">
          <a href="#" class="avatar">
            <img src="<?= base_url('uploads/image/'); ?><?= $user['image']; ?>" alt="users view avatar"
              height="100" width="100">
          </a>
          <div class="media-body">
            <h6 class="media-heading">
              <span class="users-view-nama"></span>
            </h6>
            <span>NIP: <?= $user['nip']; ?></span>
            <span class="users-view-nip"></span>
          </div>
        </div>
      </div>
      <div class="col s12 m5 quick-action-btns display-flex justify-content-end align-items-center pt-2">
        <a href="app-email.html" class="btn-small btn-light-indigo"><i class="material-icons">mail_outline</i></a>
        <a href="<?= base_url('Profile/EditProfile/') ?><?= $user['id_user'] ?>" class="btn-small indigo">Edit</a>
      </div>
    </div>
  </div>
  <!-- users view media object ends -->
  

  <!-- users view card details start -->
  <div class="card z-depth-1">
    <div class="card-content">
      <div class="row">
        <div class="col s12">
          <table class="striped">
            <tbody>
              <tr>
                <td>NIP</td>
                <td>:</td>
                <td class="users-view-nip"><?= $user['nip']; ?></td>
              </tr>
              <tr>
                <td>Nama Lengkap</td>
                <td>:</td>
                <td class="users-view-nama"><?= $user['nama_lengkap']; ?></td>
              </tr>
              <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td class="users-view-email"><?= $user['jabatan']; ?></td>
              </tr>

            </tbody>
          </table>
          <h6 class="mb-2 mt-2"><i class="material-icons">error_outline</i> Personal Info</h6>
          <table class="striped">
            <tbody>
              <tr>
                <td>Email</td>
                <td>:</td>
                <td class="users-view-email"><?= $user['email']; ?></td>
              </tr>
              <tr>
                <td>Tanggal Lahir</td>
                <td>:</td>
                <td class="users-view-email"><?= format_indo($user['tgl_lahir']); ?></td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
      <!-- </div> -->
    </div>
  </div>
  <!-- users view card details ends -->

</div>

