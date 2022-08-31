<div class="container">
    <div class="row mb-4" style="margin-top: -30px;">
        <div class="col s12">
        <div class="center home-image">
        <img src="<?= base_url('assets/image/logo/1.png'); ?>" alt="">
            <h4 class="center home-text-dashboard" style="margin-top: -30px;" ><span>Sistem Informasi</span> <span>Agenda Arsip Persuratan Kecamatan Bojonggede</h4>
        </div>
    </div>
</div>
   <div id="card-stats" class="pt-0">
      <div class="row">
         <?php if($this->session->userdata('level') == "Admin")  :  ?>
         <div class="col s12 m6 l3">
            <a href="<?= base_url('Admin/DaftarUser'); ?>">
               <div class="card animate fadeLeft z-depth-2">
                  <div class="card-content cyan white-text">
                     <p class="card-stats-title"><i class="material-icons">person_outline</i> Total Pengguna</p>
                     <h4 class="card-stats-number white-text"><?= $countuser["total"]; ?></h4>
                  </div>
                  <div class="card-action cyan darken-1">
                     <div id="clients-bar" class="center-align"></div>
                  </div>
               </div>
            </a>
         </div>
         <?php endif; ?>
         <div class="col s12 m6 l3">
            <a href="<?= base_url('Admin/SuratMasuk'); ?>">
               <div class="card animate fadeLeft z-depth-2">
                  <div class="card-content red accent-2 white-text">
                     <p class="card-stats-title"><i class="material-icons">attach_money</i>Total Surat Masuk</p>
                     <h4 class="card-stats-number white-text"><?= $countsm["total"]; ?></h4>
                  </div>
                  <div class="card-action red">
                     <div id="sales-compositebar" class="center-align"></div>
                  </div>
               </div>
            </a>
         </div>

         <div class="col s12 m6 l3">
            <a href="<?= base_url('Admin/SuratKeluar'); ?>">
               <div class="card animate fadeRight z-depth-2">
                  <div class="card-content orange lighten-1 white-text">
                     <p class="card-stats-title"><i class="material-icons">trending_up</i> Total Surat Keluar</p>
                     <h4 class="card-stats-number white-text"><?= $countsk["total"]; ?></h4>
                  </div>
                  <div class="card-action orange">
                     <div id="profit-tristate" class="center-align"></div>
                  </div>
               </div>
            </a>
         </div>
         <?php if($this->session->userdata('level') == "Admin")  :  ?>
         <div class="col s12 m6 l3">
            <a href="<?= base_url('Admin/Klasifikasi'); ?>">
               <div class="card animate fadeRight z-depth-2">
                  <div class="card-content green lighten-1 white-text">
                     <p class="card-stats-title"><i class="material-icons">content_copy</i> Total Klasifikasi</p>
                     <h4 class="card-stats-number white-text"><?= $countklasifikasi["total"]; ?></h4>
                  </div>
                  <div class="card-action green">
                     <div id="invoice-line" class="center-align"></div>
                  </div>
               </div>
            </div>
            </a>
      </div>
      <?php endif; ?>
   <!--card stats end-->
   <div class="center">

      <div class="chart mb-5 z-depth-1">
         <figure class="highcharts-figure">
            <div id="container"></div>
            
         </figure>
      </div>
   </div>


