
<?php 
        $bulan = [
            '01' => 'Januari',
            '02' => 'Februari',
            '03' => 'Maret',
            '04' => 'April',
            '05' => 'Mei',
            '06' => 'Juni',
            '07' => 'Juli',
            '08' => 'Agustus',
            '09' => 'September',
            '10' => 'Oktober',
            '11' => 'November',
            '12' => 'Desember',
        ];

        $tahun = [
          '2020', 
          '2021', 
          '2022',
        ];
?>
<div class="row">
        <div class="content-wrapper-before"></div>
        <div class="breadcrumbs-dark pb-0 pt-4" id="breadcrumbs-wrapper">
          <!-- Search for small screen-->
          <div class="container">
            <div class="row">
              <div class="col s10 m6 l6">
                <h5 class="mt-0 mb-0"><span><?= $title ?></span></h5>
                <ol class="breadcrumbs mb-0">
                  <li class="breadcrumb-item green-text"><?= $this->session->userdata('level'); ?>
                  </li>
                  <li class="breadcrumb-item green-text">Surat Keluar
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
          <form action="<?php base_url(''. $this->session->userdata('level') .'/SuratKeluar'); ?>" method="GET">
          <div class="row" style="padding: 20px;">
                    <p>Filter Surat Masuk</p>
                      <div class="col s4 input-field">
                            <select class="select2-icons browser-default" id="bulan" name="bulan">
                            <option  <?php if($bulan == "Pilih Bulan"){echo 'selected';} ?>>Pilih Bulan</option>
                            <?php foreach($bulan as $key => $val) : ?>
                              <option value="<?= $key ?>" <?php if($key == $getbulan){echo 'selected';} ?>><?= $val; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col s4 input-field">
                            <select class="select2-icons browser-default" id="tahun" name="tahun">
                            <option <?php if($bulan == "Pilih Tahun"){echo 'selected';} ?>>Pilih Tahun</option>
                              <?php foreach($tahun as $val) : ?>
                              <option value="<?= $val; ?>"  <?php if($val == $gettahun){echo 'selected';} ?>><?= $val; ?></option>
                            <?php endforeach; ?>
                    </select>
                    </div>
                <div class="col s12 input-field">
                  <button class="btn green" type="submit">Pilih</button>
              </div>
            </div>
            </form>
        </div>

  <!-- Page Length Options -->
            <div class="card">
        <div class="card-content">
          <a href="<?= base_url($this->session->userdata('level') . '/' .'SuratKeluar/CetakLaporan/') ?>"  class="btn red left  modal-trigger" href=""><i class="fas fa-file-pdf"></i> Laporan</a>
            <?php if($this->session->userdata('level') == "User")  : ?>
            <a  class="btn green right mb-5 modal-trigger" href="<?= base_url('User/SuratKeluar/create') ?>"><i class="fas fa-plus"></i> Tambah Surat Keluar</a>
            <?php endif; ?>
            <table id="page-length-option" class="display">
                <thead >
                  <tr>
                    <th>No</th>
                    <th>Tgl Surat</th>
                    <th>No Surat</th>
                    <th>Asal</th>
                    <th>Tujuan</th>
                    <th>Sifat Surat</th>
                    <th>Perihal</th>
                    <th>No Agenda</th>
                    <th>Kode Surat</th>
                    <th>File Surat</th>
                    <th>Pengirim</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1 ?>
                  <?php foreach($surat as $s) :  ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $s['tgl_surat'] ?></td>
                      <td><?= $s['no_surat'] ?></td>
                      <td><?= $s['asal'] ?></td>
                      <td><?= $s['jabatan'] ?></td>
                      <td><?= $s['sifat_surat'] ?></td>
                      <td><?= $s['perihal'] ?></td>
                      <td><?= $s['no_agenda'] ?></td>
                      <td><?= $s['kode_surat'] ?></td>
                      <td>
                        <?php if($s['file_surat_keluar'] != "") : ?>
                          <a target="_blank" href="<?= base_url('uploads/') ?><?= $s['file_surat_keluar']; ?>"><i class="fas fa-file"></i></a>
                        <?php else : ?>
                        <?php endif;?>
                      </td>
                      <td> <?= $s['nama_lengkap']; ?> </td>
                      <td>
                        <?php 
                         if($s['status'] == "1") {
                          echo "<button class='btn red'>Belum diterima</button>";
                        }elseif($s['status'] == "2"){
                          echo "<button class='btn green'>Terima</button>";
                        }
                      
                        ?>
                      </td>
                      <td>
                        <?php if($this->session->userdata('level') == "Admin")  : ?>
                          <?php if($s['status'] != "2") : ?>
                          <a class="modal-trigger viewEditSK" href="#modal6"  data-id="<?= $s['id_skluar']; ?>"><i class="far fa-share-square green-text" style="font-size: 20px;"></i></a>
                          <?php endif; ?>
                          <?php elseif($this->session->userdata('level') == "User") : ?>
                            <a href="<?= base_url('User/SuratKeluar/EditSuratKeluar/') ?><?= $s['id_skluar'] ?>"><i class="fas fa-edit" style="font-size: 20px;"></i></a>
                            <a class="tombol-hapus" href="<?= base_url('User/SuratKeluar/DeleteSuratKeluar/') ?><?= $s['id_skluar'] ?>"><i class="fas fa-trash red-text"></i></a>
                        <?php endif; ?>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
  

