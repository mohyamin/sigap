
      <div class="row">
        <div class="content-wrapper-before"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="mt-0 mb-0"><span><?= $title ?></span> </h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item green-text"><?= $this->session->userdata('level'); ?>
                  </li>
                  <li class="breadcrumb-item green-text">Daftar Klasifikasi
                  </li>
                  <li class="breadcrumb-item green-text">Edit Klasifikasi
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
  
      <div class="col s12 m12 l12">
    <div id="placeholder" class="card card card-default scrollspy">
        <div class="card-content">
            
            <form action="<?= base_url('Admin/Klasifikasi/update/'), $kdetail['id_klasifikasi']?>" method="POST" enctype="multipart/form-data">
                    <h4 class="card-title">Form Edit Klasifikasi</h4>
                    <div class="row" hidden>
                        <div class="input-field col s12">
                            <input name="id" type="text" value="<?= $id_klasifikasi ?>">
                            <label for="id_klasifikasi">ID Klasifikasi</label>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input  type="text" name="kode_surat" value="<?= $kdetail['kode_surat']; ?>">
                                <label for="kode_surat">Kode Surat</label>
                                <?= form_error('kode_surat', '<small class="red-text">', '</small>'); ?>
                            </div> 
                        </div>
                            <div class="row">
                            <div class="input-field col s12">
                                <input type="text" name="klasifikasi" value="<?= $kdetail['klasifikasi']; ?>">
                                <label for="klasifikasi">Klasifikasi Surat</label>
                                <?= form_error('Klasifikasi', '<small class="red-text">', '</small>'); ?>
                            </div> 
                            <div class="input-field col s12">
                                <input type="text" name="deskripsi" value="<?= $kdetail['deskripsi']; ?>">
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