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
            <li class="breadcrumb-item green-text">SuratMasuk
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
          <form action="<?php base_url('' . $this->session->userdata('level') . '/SuratMasuk'); ?>" method="GET">
            <div class="row" style="padding: 20px;">
              <p>Filter Surat Masuk</p>
              <div class="col s4 input-field">
                <select class="select2-icons browser-default" id="bulan" name="bulan">
                  <option <?php if ($bulan == "Pilih Bulan") {
                            echo 'selected';
                          } ?>>Pilih Bulan</option>
                  <?php foreach ($bulan as $key => $val) : ?>
                    <option value="<?= $key ?>" <?php if ($key == $getbulan) {
                                                  echo 'selected';
                                                } ?>><?= $val; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="col s4 input-field">
                <select class="select2-icons browser-default" id="tahun" name="tahun">
                  <option <?php if ($bulan == "Pilih Tahun") {
                            echo 'selected';
                          } ?>>Pilih Tahun</option>
                  <?php foreach ($tahun as $val) : ?>
                    <option value="<?= $val; ?>" <?php if ($val == $gettahun) {
                                                    echo 'selected';
                                                  } ?>><?= $val; ?></option>
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
            <?php if ($this->session->userdata('level') == "Admin") : ?>
              <a href="<?= base_url($this->session->userdata('level') . '/' . 'SuratMasuk/CetakLaporan/') . '/' . $getbulan . '/' . $gettahun ?>" class="btn red left mb-3 modal-trigger" href=""><i class="fas fa-file-pdf"></i> Laporan</a>
              <a class="btn green right mb-5 modal-trigger" href="<?= base_url('Admin/SuratMasuk/create') ?>"><i class="fas fa-plus"></i> Tambah Surat Masuk</a>
            <?php endif; ?>
            <table id="page-length-option" class="display">
              <thead>
                <tr>
                  <th>No</th>
                  <th>Tgl Surat</th>
                  <th>No Surat</th>
                  <th>Asal Surat</th>
                  <th>Perihal</th>
                  <th>No Agenda</th>
                  <th>Sifat Surat</th>
                  <th>Kode Surat</th>
                  <th>Tgl Terima</th>
                  <th>File Surat Masuk</th>
                  <th>File Surat Keluar</th>
                  <th>Status</th>
                  <th>Tracking Surat</th>
                  <th>Index</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                <?php foreach ($suratmasuk as $surat) : ?>
                  <tr>
                    <td><?= $i++; ?></td>
                    <td><?= $surat['tgl_surat']; ?></td>
                    <td><?= $surat['no_surat']; ?></td>
                    <td><?= $surat['asal']; ?></td>
                    <td><?= $surat['perihal']; ?></td>
                    <td><?= $surat['no_agenda']; ?></td>
                    <td><?= $surat['sifat_surat']; ?></td>
                    <td><?= $surat['kode_surat']; ?></td>
                    <td><?= $surat['tgl_terima']; ?></td>
                    <td>
                      <?php if ($surat['file_smasuk'] != "") : ?>
                        <a target="_blank" href="<?= base_url('uploads/') ?><?= $surat['file_smasuk']; ?>"><i class="fas fa-file"></i></a>
                      <?php else : ?>
                      <?php endif; ?>
                    </td>
                    <td>
                      <?php if ($surat['file_skeluar'] != "") : ?>
                        <a target="_blank" href="<?= base_url('uploads/') ?><?= $surat['file_skeluar']; ?>"><i class="fas fa-file"></i></a>
                      <?php else : ?>
                      <?php endif; ?>
                    </td>
                    <td> <?php
                          if ($surat['status'] == "1") {
                            echo "<button class='btn red'>Belum didisposisi</button>";
                          } elseif ($surat['status'] == "2") {
                            echo "<button class='btn green'>Disposisi</button>";
                          }

                          ?>
                    </td>
                    <td>
                      <a href="<?= base_url('' . $this->session->userdata('level') . '/SuratMasuk/TrackingSurat/'); ?><?= $surat['m_surat_id']; ?>"><i class="fas fa-truck" style="font-size: 20px;"></i></a>
                    </td>
                    <td><?= $surat['index_surat']; ?></td>
                    <td>
                      <?php if ($this->session->userdata('level') == "Admin") : ?>
                        <a class="tombol-hapus" href="<?= base_url('Admin/SuratMasuk/DeleteSuratMasuk/'); ?><?= $surat['id_masuk']; ?>"><i class="fas fa-trash red-text"></i></a>

                      <?php elseif ($this->session->userdata('level') == "Camat" || $this->session->userdata('level') == "Sekcam") : ?>

                        <?php if ($surat['status'] != "2") : ?>
                          <a class="modal-trigger viewSurat" href="#modal4" data-id="<?= $surat['id_masuk']; ?>"><i class="far fa-share-square green-text" style="font-size: 20px;"></i></a>
                        <?php endif; ?>
                      <?php elseif ($this->session->userdata('level') == "User") : ?>
                        <?php if ($surat['status'] != "2") : ?>
                          <a class="modal-trigger viewSurat" href="#modal4" data-id="<?= $surat['id_masuk']; ?>"><i class="far fa-share-square green-text" style="font-size: 20px;"></i></a>
                        <?php else : ?>
                          <a target="_blank" href="<?= base_url('User/SuratMasuk/CetakSurat/'); ?><?= $surat['m_surat_id']; ?>"><i class="fas fa-envelope-open green-text" style="font-size: 20px;"></i></a>
                          <?php $ceksk = $this->db->query("SELECT * FROM m_surat_keluar")->result_array(); ?>
                          <a href="<?= base_url('User/SuratMasuk/TambahSuratKeluar/') ?><?= $surat['m_surat_id']; ?>"><i class="fas fa-paper-plane" style="font-size: 20px;"></i></a>

                        <?php endif; ?>

                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>


          </div>
        </div>