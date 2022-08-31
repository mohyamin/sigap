<!-- MODAL TAMBAH USER -->
<div id="modal1" class="modal">
    <div class="modal-content">
        <form action="<?= base_url('Admin/DaftarUser/DaftarUser'); ?>" method="POST" >
            <div class="row">
                <div class="col s12">
                    <h5>Tambah User</h5>
                </div>
                <div class="col s12 m12">
                    <div class="row">
                            <div class="col s4 input-field">
                                <p class="mb-1">
                                    <label>
                                        <input name="role" value="1" type="radio" checked />
                                        <span>Admin</span>
                                    </label>
                                </p>
                            </div>
                            <div class="col s4 input-field">
                                <p class="mb-1">
                                    <label>
                                        <input name="role" value="2" type="radio" checked />
                                        <span>Staff</span>
                                    </label>
                                </p>
                            </div>
                            <div class="col s4 input-field">
                                <p class="mb-1">
                                    <label>
                                        <input name="role" value="3" type="radio" checked />
                                        <span>User</span>
                                    </label>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="row">
                        <div class="col s12 input-field">
                            <input id="nip" name="nip" type="number">
                            <label for="nip">NIP</label>
                            <div class="show_error_nip" style="font-size: 12px;"></div>
                        </div>
                        <div class="col s12 input-field">
                            <input id="nama" name="nama" type="text"
                            data-error=".errorTxt2">
                            <label for="nama">Nama Lengkap</label>
                            <div class="show_error_nama" style="font-size: 12px;"></div>
                        </div>
                        <div class="col s12 input-field">
                            <input id="email" name="email" type="email" class="validate"
                            data-error=".errorTxt3">
                            <label for="email">Email</label>
                            <div class="show_error_email" style="font-size: 12px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6">
                    <div class="row">
                        <div class="col s12 input-field">
                            <input id="tgllahir" name="tgllahir" type="date" class="validate">
                            <label for="tgllahir"></label>
                            <div class="show_error_tgllahir" style="font-size: 12px;"></div>
                        </div>
                        <div class="col s12 input-field">
                            <input id="password1" name="password1" type="password" class="validate"
                            data-error=".errorTxt3">
                            <label for="password1">Password</label>
                            <div class="show_error_password" style="font-size: 12px;"></div>
                        </div>
                        <div class="col s12 input-field">
                            <input id="password2" name="password2" type="password" class="validate">
                            <label for="password2">Confirm Password</label>
                            <div class="show_error_confirm_password" style="font-size: 12px;"></div>
                        </div>
                    </div>
                </div>
                <!-- <button type="submit">Update</button> -->
            </div>
            <div class="modal-footer">
                <a  class="modal-action modal-close waves-effect red btn">Batal</a>
                <button type="submit" class="modal-action waves-effect green btn" id="tambahUser">Save changes</button>
            </div>
        </form>
    </div>
</div>


<!-- MODAL EDIT USER -->
<div id="modal2" class="modal">
    <div class="modal-content">
        <form action="<?= base_url('Admin/DaftarUser/EditUser'); ?>" method="POST" >
            <div class="row">
                <div class="col s12">
                    <h5 id="title">Edit User</h5>
                </div>
                <div class="col s12 m6">
                    <div class="row">
                        <div class="col s12 input-field">
                            <input id="nip" name="nip" type="hidden">
                            <input id="nama" name="nama" type="text"
                            data-error=".errorTxt2">
                            <div class="show_error_nama" style="font-size: 12px;"></div>
                        </div>
                        <div class="col s12 input-field">
                            <input id="email" name="email" type="email" class="validate"
                            data-error=".errorTxt3">
                            <div class="show_error_email" style="font-size: 12px;"></div>
                        </div>
                        <div class="col s12 input-field">
                            <input id="tgllahir" name="tgllahir" type="date" class="validate">
                            <div class="show_error_tgllahir" style="font-size: 12px;"></div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6" id="role_ubah">
                    <div class="row">
                        <div class="col s12 input-field">
                            <h6>Role</h6>
                            <div id="role_ubah" ></div>
                            <p class="mb-1">
                                <label>
                                    <input name="role" value="1" type="radio"  />
                                    <span>Admin</span>
                                </label>
                            </p>
                            <p class="mb-1">
                                <label>
                                    <input name="role" value="2" type="radio" />
                                    <span>Staff</span>
                                </label>
                            </p>
                            <p class="mb-1">
                                <label>
                                    <input class="with-gap" name="role" value="3" type="radio" />
                                    <span>User</span>
                                </label>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- <button type="submit">Update</button> -->
            </div>
            <div class="modal-footer" id="tombol">
                <a  class="modal-action modal-close waves-effect red btn">Batal</a>
                <button type="submit" class="modal-action waves-effect green btn" id="tambahUser">Save changes</button>
            </div>
        </form>
    </div>
</div>


<!-- MODAL VIEW KEGIATAN -->
<div id="modal3" class="modal">
    <div class="modal-content">
        <form action="<?= base_url('Admin/Kegiatan/Terima_Kegiatan'); ?>" method="POST" >
        <h6 id="title">Detail Kegiatan</h6>
                    <hr>
            <div class="row">
                <div class="col s12">
                    <table class="striped ">
                        <tbody>
                        <input type="hidden" id="no" name="idkegiatan">
                        <tr>
                            <td>Jenis Pelaksana</td>
                            <td></td>
                            <td id="jenis"></td>
                        </tr>
                        <tr>
                            <td>Operator</td>
                            <td></td>
                            <td id="operator"></td>
                        </tr>
                        <tr>
                            <td>Nama Kegiatan</td>
                            <td></td>
                            <td id="kegiatan"></td>
                        </tr>
                        <tr>
                            <td>Tanggal Kegiatan</td>
                            <td></td>
                            <td id="tgl_kegiatan"></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td></td>
                            <td id="keterangan"></td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td></td>
                            <td>
                            <div class="switch">
                            <input type="hidden" name="idUser" value="<?= $user['role_id']; ?>">
                            <label>
                                <input name="status" type="radio" value="1" />
                                <span>Terima</span>
                            </label> &ensp;
                            <label>
                                <input name="status" type="radio" value="0"  />
                                <span>Tolak</span>
                            </label>
                            </div>
                            </td>
                        </tr>
                        </tbody>
                </table>
                <h6>Rincian Pelaksana </h6>
                <hr>
                <table class="striped">
                        <tbody id="rincian_kegiatan">
                        </tbody>
                </table>
                </div>
            </div>
            <div class="modal-footer" id="tombol">
                <a  class="modal-action modal-close waves-effect red btn">Batal</a>
                <button type="submit" class="modal-action waves-effect green btn" id="terimaKegiatan">Kirim <i class="material-icons right">send</i></button>
            </div>
        </form>
    </div>
</div>

<!-- MODAL VIEW KEGIATAN ADMIN-->
<div id="modal4" class="modal">
    <div class="modal-content">
        <?php if($this->session->userdata('jabatan_id') == "1") : ?>
        <form action="<?=  base_url('Admin/SuratMasuk/Disposisi'); ?>" method="POST">
        <?php elseif($this->session->userdata('jabatan_id') == "2") : ?>
            <form action="<?=  base_url('Camat/SuratMasuk/Disposisi'); ?>" method="POST">
        <?php elseif($this->session->userdata('jabatan_id') == "3") :  ?>
            <form action="<?=  base_url('Sekcam/SuratMasuk/Disposisi'); ?>" method="POST">
        <?php else : ?>
            <form action="<?=  base_url('User/SuratMasuk/Disposisi'); ?>" method="POST">
        <?php endif; ?>
        <h6 id="title">Detail Surat Masuk</h6>
                    <hr>
            <div class="row">
                <div class="col s12">
                    <table class="striped ">
                        <tbody>
                        <input type="hidden" id="no" name="idkegiatan">
                        <tr>
                            <td>Tanggal Surat</td>
                            <td></td>
                            <td >
                                <p id="tgl_surat"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>No Surat</td>
                            <td></td>
                            <td>
                                <p id="no_surat"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Asal Surat</td>
                            <td></td>
                            <td>
                                <p id="asal"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Perihal</td>
                            <td></td>
                            <td>
                                <p id="perihal"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>No Agenda</td>
                            <td></td>
                            <td>
                                <p id="no_agenda"></p>
                            </td>
                        </tr>
                        <tr>
                            <td>Sifat Surat</td>
                            <td></td>
                            <td>
                               <div id="sifat_surat"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>Kode Surat</td>
                            <td></td>
                            <td>
                               <div id="kode_surat"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>Tanggal Terima</td>
                            <td></td>
                            <td>
                               <div id="tgl_terima"></div>
                            </td>
                        </tr>
                        <tr>
                            <td>Disposisi</td>
                            <td></td>
                                <input type="hidden" id="id_masuk" name="id_masuk">
                                <td>
                                    <div class="switch">
                                <label>
                                    <input name="status" type="radio" value="1" />
                                    <?php if($this->session->userdata('level') == "User") : ?>
                                    <span>Terima</span>
                                    <?php else :?>
                                        <span>Teruskan</span>
                                    <?php endif; ?>
                                </label> &ensp;
                                <label>
                                    <input name="status" type="radio" value="0"  />
                                    <span>Tolak</span>
                                </label>
                            </td>
                        </tr>
                        <?php if($this->session->userdata('jabatan_id') == "3") : ?>
                        <tr>
                            <td>Tujuan</td>
                            <td></td>
                            <td>
                                <select class="select2-icons browser-default" id="tujuan" name="tujuan">
                                    <option selected>Pilih Tujuan Surat</option>
                                    <option value="4">Seksi Ekbang</option>
                                    <option value="5">Seksi Diskes</option>
                                    <option value="6">Seksi PM</option>
                                    <option value="7">Seksi PEM</option>
                                    <option value="8">Seksi Umpeg</option>
                                    <option value="9">Seksi Proge</option>
                                </select>
                            </td>
                        </tr>
                        <?php endif; ?>
                        <?php if($this->session->userdata('jabatan_id') == "3" || ($this->session->userdata('jabatan_id') == "2") ) : ?>
                        <tr>
                            <td>Catatan</td>
                            <td></td>
                            <td>
                                <textarea  id="catatan" name="catatan" type="text"></textarea>
                            </td>
                        </tr>
                        <?php endif; ?>
                        </tbody>
                </table>
                </div>
            </div>
             <?php if($this->session->userdata('level') == "Camat" || $this->session->userdata('level') == "Sekcam" ) : ?>
            <!-- PIN -->
            <div id="modal9" class="modal">
                <div class="modal-content">
                        <span>PIN</span>
                        <input type="password" name="pin" >
                        <div class="modal-footer" id="tombol">
                            <a  class="modal-action modal-close waves-effect red btn">Batal</a>
                            <button type="submit" class="modal-action waves-effect green btn" id="tambahUser">Kirim</button>
                        </div>
                    </form>
                </div>
            </div>
            <?php endif; ?>

            <?php if($this->session->userdata('level') == "Camat" || $this->session->userdata('level') == "Sekcam" ) : ?>
            <div class="modal-footer" id="tombol">
                <a  class="modal-action modal-close waves-effect red btn left">Close</a>
                <button class="btn green modal-trigger" href="#modal9">Kirim</button>
                </div>
            <?php else : ?>
                <div class="modal-footer" id="tombol">
                <a  class="modal-action modal-close waves-effect red btn left">Close</a>
                    <button type="submit" class="modal-action waves-effect green btn">Kirim</button>
                </div>
            <?php endif; ?>
                </form>
    </div>
</div>
















