<div class="row">
  <div class="content-wrapper-before"></div>
  <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
      <div class="row">
        <div class="col s10 m6 l6">
          <h5 class="mt-0 mb-0">Tambah Asal Surat</h5>
          <ol class="breadcrumbs mb-0">
            <li class="breadcrumb-item"><a href="index-2.html" class="green-text">Home</a>
            </li>
            <li class="breadcrumb-item green-text">Asal Surat
            </li>
            <li class="breadcrumb-item green-text">tambah Asal Surat
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
            <p class="caption mb-0">Tambah Asal Surat baru dengan melengkapi field-field yang tersedia</p>
          </div>
        </div>
         <!-- jQuery Plugin Initialization -->
         <div class="row mb-5">

 <!-- Form with placeholder -->
<div class="col s12 m12 l12">
    <div id="placeholder" class="card card card-default scrollspy">
        <div class="card-content">
            <form action="<?= base_url('Admin/asalsurat/tambah'); ?>" method="POST" enctype="multipart/form-data">
                    <h4 class="card-title">Form Tambah Asal Surat</h4>
                    <div class="row" hidden>
                        <div class="input-field col s12">
                            <input id="id" name="id" type="text" value="<?= $id ?>">
                            <label for="id">ID Asalsurat</label>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input id="asal" type="text"  name="asal">
                                <label for="asal">Asal Surat</label>
                                <?= form_error('asal', '<small class="red-text">', '</small>'); ?>
                            </div> 
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