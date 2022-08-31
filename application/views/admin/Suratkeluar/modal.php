<!-- MODAL VIEW KEGIATAN ADMIN-->
<div id="modal6" class="modal">
    <div class="modal-content">
        <h6 id="title">Ubah Status Surat Keluar</h6>
                    <hr>
            <div class="row">
            <form action="<?= base_url('Admin/SuratKeluar/Approval'); ?>" method="POST" >
                <div class="col s12">
                    <table class="striped ">
                        <tbody>
                            <tr>
                                <input type="hidden" id="id_surat" name="id_surat">
                                <label>
                                    <input name="status" type="radio" value="2" />
                                    <span>Terima</span>
                                </label> &ensp;
                                <label>
                                    <input name="status" type="radio" value="3"  />
                                    <span>Tolak</span>
                                </label>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer" id="tombol">
                <button type="submit" class="modal-action  waves-effect green btn right ml-2" id="tambahJenisPelaksana">Ubah</button>
                <a  class="modal-action modal-close waves-effect red btn right">Kembali</a>
            </div>
        </form>
    </div>
</div>