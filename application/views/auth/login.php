<div id="login-page" class="row">
    
    <div class="col s12 mb-10 m6 l4 ml-6   login-form card-panel border-radius-6 login-card login ">
        <form class="login-form" method="POST" action="<?= base_url('Auth'); ?>">
        <div class="row mb-5">
                <div class="input-field col s12">
                <img src=" <?= base_url('assets/image/logo/logo.png'); ?>" style="width: 100%; position:relative; ">
              
            <div class="row margin">
                <div class="input-field col s12">
                    <!-- <i class="material-icons prefix pt-2">person_outline</i> -->
                    <input id="nip" name="nip" type="text">
                    <label for="nip" class="center-align">Nip</label>
                    <div style="position: absolute;">
                        <?= form_error('nip', '<small class="red-text">', '</small>'); ?>
                    </div>
                </div>
            </div>
            <div class="row margin">
                <div class="input-field col s12">
                    <!-- <i class="material-icons prefix pt-2">lock_outline</i> -->
                    <input id="password" name="password" type="password">
                    <label for="password">Password</label>
                    <div style="position: absolute; ">
                        <?= form_error('password', '<small class="red-text">', '</small>'); ?>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="input-field col s12">
                    <button type="submit" style="border-radius: 0 !important;" class="btn waves-effect waves-light border-round  col s12 z-depth-1 green" id="login">Login</button>
                </div>
            </div>
            <div class="row">
            </div>
        </form>
    </div>
</div>