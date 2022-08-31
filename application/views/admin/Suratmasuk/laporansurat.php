<!DOCTYPE html>
<html>
<head>
    <title>Surat Masuk</title>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid black;
  padding: 8px;
}

.center {
    text-align: center;
}

</style>
</head>
<body>


<table>
    <thead>

    <tr>
        <th>No</th>
        <th>No Agenda</th>
        <th>Kode Surat</th>
        <th>Sifat Surat</th>
        <th>Index Surat</th>
        <th>Asal Surat</th>
        <th>Tanggal Surat</th>
        <th>No Surat</th>
        <th>Tanggal Terima</th>
        <th>Perihal</th>
        <th>Disposisi</th>
    </tr>
            
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach($surat as $s) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $s['no_agenda']; ?></td>
            <td><?= $s['kode_surat']; ?></td>
            <td><?= $s['sifat_surat']; ?></td>
            <td><?= $s['index_surat']; ?></td>
            <td><?= $s['asal']; ?></td>
            <td><?= $s['tgl_surat']; ?></td>
            <td><?= $s['no_surat']; ?></td>
            <td><?= $s['tgl_terima']; ?></td>
            <td><?= $s['perihal']; ?></td>
            <td>
                <?php $i= 1; ?>
                <?php $tracking = $this->db->query("SELECT * FROM v_sm_jabatan WHERE id_surat = " . $s['m_surat_id'] ." AND user_jabatan_id != 1")->result_array(); ?>
                <?php foreach($tracking as $t) : ?>
                    <?= $i++ . ".". $t['jabatan']; ?>
                <?php endforeach; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
