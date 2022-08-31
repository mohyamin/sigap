<div class="row">
  <div class="content-wrapper-before"></div>
  <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
      <div class="row">
        <div class="col s10 m6 l6">
          <h5 class="mt-0 mb-0">Tambah Surat Keluar</h5>
          <ol class="breadcrumbs mb-0">
            <li class="breadcrumb-item"><a href="index-2.html" class="green-text">Home</a>
            </li>
            <li class="breadcrumb-item green-text">Surat Keluar
            </li>
            <li class="breadcrumb-item green-text">Create
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
            <p class="caption mb-0">Tambah surat keluar baru dengan melengkapi field-field yang tersedia</p>
          </div>
        </div>



        <!-- jQuery Plugin Initialization -->
        <div class="row mb-5">

          <!-- Form with placeholder -->
            <div class="col s12 m12 l12">
            <div id="placeholder" class="card card card-default scrollspy">
              <div class="card-content">
                <form action="<?= base_url('User/SuratKeluar/create'); ?>" method="POST" enctype="multipart/form-data">
                  <h4 class="card-title">Form Tambah Surat Keluar</h4>
                  <div class="row">
                        <div class="col s12 input-field">
                               <input id="no_agenda" name="no_agenda" type="text" value="<?= $noagenda; ?>" readonly>
                                <label for="no_agenda">No Agenda</label>
                                <?= form_error('no_agenda', '<small class="red-text">', '</small>'); ?>
                        </div>
                         <div class="col s12 input-field">
                        <select class="select2-icons browser-default" id="kode_surat" name="kode_surat">
                            <option selected>Pilih Kode Surat</option>
                             <?php foreach($klasifikasi as $k) : ?>
                            <option value="<?= $k['id_klasifikasi']; ?>"><?= $k["kode_surat"]; ?> - <?= $k["klasifikasi"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('kode_surat', '<small class="red-text">', '</small>'); ?>
                            
                    </div>
                  </div>
                  <div class="row">
                       <div class="col s12 input-field">
                            <select class="select2-icons browser-default" id="sifat_surat" name="sifat_surat">
                            <option selected>Pilih Sifat Surat</option>
                            <option value="Biasa">Biasa</option>
                            <option value="Penting">Penting</option>
                            <option value="Sangat Penting">Sangat Penting</option>
                            <option value="Segera">Segera</option>
                        </select>
                        <?= form_error('sifat_surat', '<small class="red-text">', '</small>'); ?>
                    </div>
                  </div>

                 <div class="row">
                          
                  <div class="col s12 input-field">
                            <input id="tgl_surat" name="tgl_surat" type="date">
                            <label for="tgl_surat">Tanggal Surat</label>
                            <?= form_error('tgl_surat', '<small class="red-text">', '</small>'); ?>
                    </div>
                 </div>

                 <div class="row">
                      <div class="col s12 input-field">
                            <input id="no_surat" name="no_surat" type="text">
                            <label for="no_surat">No Surat</label>
                            <?= form_error('no_surat', '<small class="red-text">', '</small>'); ?>
                    </div>
                 </div>
                 <div class="row">
                        <div class="col s12 input-field">
                            <input id="perihal" name="perihal" type="text">
                            <label for="perihal">Perihal</label>
                            <?= form_error('perihal', '<small class="red-text">', '</small>'); ?>
                    </div>
                    <div class="col s12 input-field">
                        <select class="select2-icons browser-default" id="asal_surat" name="asal_surat">
                            <option selected>Pilih Asal Surat</option>
                             <?php foreach($asal as $a) : ?>
                            <option value="<?= $a['id']; ?>"><?= $a["asal"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('asal_surat', '<small class="red-text">', '</small>'); ?>
                            
                    </div>
                        <div class="col s12 input-field">
                            <p class="red-text">File Surat(Format pdf)</p>
                            <input id="file_keluar" name="file_keluar" type="file">
                            <?= form_error('file_keluar', '<small class="red-text">', '</small>'); ?>
                    </div>

                 </div>

                    <div class="row">
                      <div class="input-field col s12">
                          </div>
                          <button class="btn cyan waves-effect waves-light green right" style="margin-right: 10px;" type="submit" name="action"> <i class="fas fa-save"></i> <a href="<?= base_url('Auth/Logout') ?>">Kembali</a> 
                          </button> 
                        <button class="btn cyan waves-effect waves-light green right" type="submit" name="action"> <i class="fas fa-save"></i> Simpan
                        </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- END: Page Main-->
<script>
$('.select2-icons').select2({
  // ajax:{
  //       url: "<?= base_url(); ?>Admin/SuratMasuk/create",
  //       dataType: "json",
  //       data:function(params){
  //         return{
  //           kode : params.term
  //         };
  //       },
  //       processResult:function(data){
  //         result.push({
  //           id: item.id_klasifikasi,
  //           text: item.klasifikasi
  //         });
  //       }
  //     }
});

</script>