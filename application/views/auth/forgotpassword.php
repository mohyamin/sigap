<div id="login-page" class="row">
    <div class="logo-login mb-5" style="position: absolute; bottom: 60%; ">
        <img src=" <?= base_url('assets/image/logo/logo_siokta.png'); ?>" style="width: 400px; position: relative; z-index: 1; ">
    </div>
    <div class="col z-depth-5 s12 mb-5 m6 l3 ml-5 mt-5 z-depth-4 login-form card-panel border-radius-6 login-card bg-opacity-">
        <form class="login-form" method="POST" action="<?= base_url('Auth/forgotpassword'); ?>">
            <div class="row margin pt-4">
                <div class="input-field col s12">
                    <!-- <i class="material-icons prefix pt-2">person_outline</i> -->
                    <input id="email" name="email" type="text">
                    <label for="email" class="center-align">Email</label>
                    <div style="position: absolute;">
                        <?= form_error('nip', '<small class="red-text">', '</small>'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" style="border-radius: 0 !important;" class="btn waves-effect waves-light border-round z-depth-1  green col s12">Forgot Password</button>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s6 m6 l6">
                    <p class="margin medium-small"><a href="<?= base_url('Auth'); ?>">Login!</a></p>
                </div>
                <div class="input-field col s6 m6 l6">
                    <p class="margin right-align medium-small"><a href="<?= base_url('Auth/registrasi'); ?>">Daftar Sekarang!</a></p>
                </div>
            </div>
        </form>
    </div>
</div>