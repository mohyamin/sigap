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
                  <li class="breadcrumb-item green-text">Tracking Surat
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

  <!-- Page Length Options -->
  <div class="row">
    <div class="col s12">
      <div class="card">
        <div class="card-content">
          <div class="row">
            <div class="col s12">
                <table class="striped">
                  <thead>
                    <tr>
                        <th>No</th>
                        <th>Disposisi</th>
                        <th>Status</th>
                    </tr>
                  </thead>

                  <tbody>
                    <?php $i = 1; ?>
                    <?php foreach($tracking as $track) : ?>
                    <tr >
                      <td><?= $i++; ?></td>
                      <td><?= $track['jabatan'] ?></td>
                      <td>
                        <?php 
                         if($track['status'] == "1") {
                          echo "<button class='btn red'>Belum didisposisi</button>";
                        }elseif($track['status'] == "2"){
                          echo "<button class='btn green'>Disposisi</button>";
                        }
                        ?>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </tbody>
                  <button class="btn cyan waves-effect waves-light green right" style="margin-right: 5px;" type="submit" name="action"> <i class="fas fa-save"></i> <a href="<?= base_url('Admin/SuratMasuk') ?>">Kembali</a> </button>
                </table>
                
            </div>
     
          </div>
        </div>
      </div>
    </div>
  </div>

