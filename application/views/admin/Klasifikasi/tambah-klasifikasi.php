<div class="row">
  <div class="content-wrapper-before"></div>
  <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
      <div class="row">
        <div class="col s10 m6 l6">
          <h5 class="mt-0 mb-0">Tambah Klasifikasi</h5>
          <ol class="breadcrumbs mb-0">
            <li class="breadcrumb-item"><a href="index-2.html" class="green-text">Home</a>
            </li>
            <li class="breadcrumb-item green-text">Klasifikasi
            </li>
            <li class="breadcrumb-item green-text">tambah Klasifikasi
            </li>
          </ol>
        </div>
      </div>
    </div>
  </div>
</div>
  <div class="col s12">
    <div class="container">
      <div class="seaction">

        <?= $this->session->flashdata('pesan'); ?>

        <div class="card">
          <div class="card-content">
            <p class="caption mb-0">Tambah Klasifikasi baru dengan melengkapi field-field yang tersedia</p>
          </div>
        </div>
         <!-- jQuery Plugin Initialization -->
         <div class="row mb-5">

 <!-- Form with placeholder -->
<div class="col s12 m12 l12">
    <div id="placeholder" class="card card card-default scrollspy">
        <div class="card-content">
            <form action="<?= base_url('Admin/klasifikasi/tambah'); ?>" method="POST" enctype="multipart/form-data">
                    <h4 class="card-title">Form Tambah Klasifikasi</h4>
                    <div class="row" hidden>
                        <div class="input-field col s12">
                            <input id="id_klasifikasi" name="id_klasifikasi" type="text" value="<?= $id_klasifikasi ?>">
                            <label for="id_klasifikasi">ID Klasifikasi</label>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="kode_surat" type="text"  name="kode_surat">
                                <label for="kode_surat">Kode Surat</label>
                                <?= form_error('kode_surat', '<small class="red-text">', '</small>'); ?>
                            </div> 
                        </div>
                            <div class="row">
                            <div class="input-field col s12">
                                <input id="klasifikasi" type="text" name="klasifikasi">
                                <label for="klasifikasi">Klasifikasi Surat</label>
                                <?= form_error('Klasifikasi', '<small class="red-text">', '</small>'); ?>
                            </div> 
                            <div class="input-field col s12">
                                <input id="deskripsi" type="text" name="deskripsi">
                                <label for="deskripsi">deskripsi Surat</label>
                                <?= form_error('deskripsi', '<small class="red-text">', '</small>'); ?>
                            </div> 
                        
                            <div class="row">
                            <div class="input-field col s12">
                              
                                <button class="btn cyan waves-effect waves-light green right" type="submit" name="action"> <i class="fas fa-save"></i> Simpan
                                </button>
                            </div>
                            </div>
                        
                    </div>
            </form>
        </div>
    </div>
</div>
</div>

</div>