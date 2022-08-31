<div class="row">
    <div class="col s12">
        <div class="container">
            <div id="login-page" class="row">
                <!-- <?= $this->session->flashdata('pesan'); ?> -->
                <div class="col s12 m6 z-depth-5 l4 z-depth-4 card-panel border-radius-6 login-card bg-opacity-2">
                    <form class="login-form" method="POST" action="<?= base_url('Auth/Registrasi'); ?>">
                        <div class="row margin">
                            <div class="input-field col s12">
                                <!-- <i class="material-icons prefix pt-2">person_outline</i> -->
                                <input id="nama" name="nama" type="text">
                                <label for="nama" class="center-align">Nama Lengkap</label>
                                <div style="position: absolute;">
                                    <?= form_error('nama', '<small class="red-text">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <!-- <i class="material-icons prefix pt-2">person_outline</i> -->
                                <input id="nip" name="nip" type="text">
                                <label for="nip" class="center-align">NIP</label>
                                <div style="position: absolute;">
                                    <?= form_error('nip', '<small class="red-text">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <!-- <i class="material-icons prefix pt-2">person_outline</i> -->
                                <input id="email" name="email" type="text">
                                <label for="email" class="center-align">Email</label>
                                <div style="position: absolute;">
                                    <?= form_error('email', '<small class="red-text">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <!-- <i class="material-icons prefix pt-2">lock_outline</i> -->
                                <input id="password1" name="password1" type="password">
                                <label for="password">Password</label>
                                <div style="position: absolute;">
                                    <?= form_error('password1', '<small class="red-text">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row margin">
                            <div class="input-field col s12">
                                <!-- <i class="material-icons prefix pt-2">lock_outline</i> -->
                                <input id="password2" name="password2" type="password">
                                <label for="password">Confirm Password</label>
                                <div style="position: absolute;">
                                    <?= form_error('password2', '<small class="red-text">', '</small>'); ?>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col s12 m12 l12 ml-2 mt-1">
                                <p>
                                    <label>
                                        <input type="checkbox" />
                                        <span>Remember Me</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button type="submit" style="border-radius: 0 !important;" class="btn waves-effect z-depth-1 waves-light border-round green col s12">Daftar</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s6 m6 l6">
                                <p class="margin medium-small"><a href="<?= base_url('Auth'); ?>">Login sekarang!</a></p>
                            </div>
                            <!-- <div class="input-field col s6 m6 l6">
                                <p class="margin right-align medium-small"><a href="user-forgot-password.html">Forgot password ?</a></p>
                            </div> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="content-overlay"></div>
    </div>
</div>