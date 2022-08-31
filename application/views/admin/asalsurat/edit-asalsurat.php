
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
                  <li class="breadcrumb-item green-text">Daftar Asal Surat
                  </li>
                  <li class="breadcrumb-item green-text">Edit Asal Surat
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
        
            <form action="<?= base_url('Admin/AsalSurat/update/'), $asurat['id'];?>"method="POST" enctype="multipart/form-data">
                    <h4 class="card-title">Form Edit Asal Surat</h4>
                    <div class="row" hidden>
                        <div class="input-field col s12">
                            <input name="id" type="text" value="<?= $id ?>">
                            <label for="id">ID Asal Surat</label>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input  type="text" name="asal" value="<?= $asurat['asal']; ?>">
                                <label for="asal">Asal Surat</label>
                                <?= form_error('asal', '<small class="red-text">', '</small>'); ?>
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