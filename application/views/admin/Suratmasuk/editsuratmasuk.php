<div class="row">
  <div class="content-wrapper-before"></div>
  <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
    <!-- Search for small screen-->
    <div class="container">
      <div class="row">
        <div class="col s10 m6 l6">
          <h5 class="mt-0 mb-0">Edit Surat Masuk</h5>
          <ol class="breadcrumbs mb-0">
            <li class="breadcrumb-item"><a href="index-2.html" class="green-text">Home</a>
            </li>
            <li class="breadcrumb-item green-text">Surat Masuk
            </li>
            <li class="breadcrumb-item green-text">Edit
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
            <p class="caption mb-0">Edit Surat Masuk</p>
          </div>
        </div>



        <!-- jQuery Plugin Initialization -->
        <div class="row mb-5">

          <!-- Form with placeholder -->
            <div class="col s12 m12 l12">
            <div id="placeholder" class="card card card-default scrollspy">
              <div class="card-content">
                <form action="<?= base_url('Admin/SuratMasuk/edit/', $surat['id_masuk']); ?>" method="POST" enctype="multipart/form-data">
                  <h4 class="card-title">Form Edit Surat Masuk</h4>
                  <div class="row">
                      <input type="hidden" name="id_surat" value="<?= $surat['id_surat']; ?>">
                        <div class="col s6 input-field">
                                <input id="no_agenda" name="no_agenda" type="text" value="<?= $surat['no_agenda']; ?>">
                                <label for="no_agenda">No Agenda</label>
                                <?= form_error('no_surat', '<small class="red-text">', '</small>'); ?>
                        </div>
                         <div class="col s6 input-field">
                        <select class="select2-icons browser-default" id="kode_surat" name="kode_surat">
                            <option selected>Pilih Kode Surat</option>
                             <?php foreach($klasifikasi as $k) : ?>
                            <option value="<?= $k['id_klasifikasi']; ?> " ? <?php if($k['id_klasifikasi'] == $surat['id_klasifikasi']){echo 'selected';} ?> ><?= $k["kode_surat"]; ?> - <?= $k["klasifikasi"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('kode_surat', '<small class="red-text">', '</small>'); ?>
                            
                    </div>
                  </div>
                  <div class="row">
                       <div class="col s6 input-field">
                            <select class="select2-icons browser-default" id="sifat_surat" name="sifat_surat">
                            <option selected>Pilih Sifat Surat</option>
                            <option value="Biasa" <?php if($surat['sifat_surat'] == "Biasa"){echo 'selected';} ?>>Biasa</option>
                            <option value="Penting"  <?php if($surat['sifat_surat'] == "Penting"){echo 'selected';} ?>>Penting</option>
                            <option value="Sangat Penting"  <?php if($surat['sifat_surat'] == "Sangat Penting"){echo 'selected';} ?>>Sangat Penting</option>
                            <option value="Segera"  <?php if($surat['sifat_surat'] == "Segera"){echo 'selected';} ?>>Segera</option>
                        </select>
                        <?= form_error('sifat_surat', '<small class="red-text">', '</small>'); ?>
                    </div>
                     <div class="col s6 input-field">
                            <input id="index_surat" name="index_surat" type="text" value="<?= $surat['index_surat']; ?>">
                            <label for="index_surat">Index Surat</label>
                            <?= form_error('no_surat', '<small class="red-text">', '</small>'); ?>
                    </div>
                  </div>

                 <div class="row">
                            <div class="col s6 input-field">
                        <select class="select2-icons browser-default" id="asal_surat" name="asal_surat">
                            <option selected>Pilih Asal Surat</option>
                             <?php foreach($asal as $a) : ?>
                            <option value="<?= $a['id']; ?>"  <?php if($a['id'] == $surat['id_asal']){echo 'selected';} ?>><?= $a["asal"]; ?></option>
                            <?php endforeach; ?>
                        </select>
                        <?= form_error('asal_surat', '<small class="red-text">', '</small>'); ?>
                    </div>
                  <div class="col s6 input-field">
                            <input id="tgl_surat" name="tgl_surat" type="date" value="<?= $surat['tgl_surat']; ?>">
                            <label for="tgl_surat">Tanggal Surat</label>
                            <?= form_error('tgl_surat', '<small class="red-text">', '</small>'); ?>
                    </div>
                 </div>

                 <div class="row">
                      <div class="col s6 input-field">
                            <input id="no_surat" name="no_surat" type="text" value="<?= $surat['no_surat']; ?>">
                            <label for="no_surat">No Surat</label>
                            <?= form_error('no_surat', '<small class="red-text">', '</small>'); ?>
                    </div>
                  <div class="col s6 input-field">
                            <input id="tgl_terima" name="tgl_terima" type="date" value="<?= $surat['tgl_terima']; ?>">
                            <label for="tgl_terima">Tanggal Terima</label>
                            <?= form_error('tgl_terima', '<small class="red-text">', '</small>'); ?>
                    </div>
                 </div>
                 <div class="row">
                        <div class="col s6 input-field">
                            <input id="perihal" name="perihal" type="text" value="<?= $surat['perihal']; ?>">
                            <label for="perihal">Perihal</label>
                            <?= form_error('no_surat', '<small class="red-text">', '</small>'); ?>
                    </div>
                        <div class="col s6 input-field">
                            <p class="red-text">File Surat(Format pdf)</p>
                            <input id="file_masuk" name="file_masuk" type="file" value="<?= $surat['file_smasuk']; ?>">
                            <?= form_error('file_masuk', '<small class="red-text">', '</small>'); ?>
                    </div>

                 </div>

                    <div class="row">

                          <button class="btn cyan waves-effect waves-light red left" type="submit" name="action"> <i class="fas fa-save"></i> <a href="<?= base_url('Auth/Logout') ?>">Kembali</a> 
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