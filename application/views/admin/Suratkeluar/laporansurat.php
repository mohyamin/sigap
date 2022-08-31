<!DOCTYPE html>
<html>
<head>
    <title>Laporan Surat Keluar</title>
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
        <th>Tujuan Surat</th>
        <th>Sifat Surat</th>
        <th>Tanggal Surat</th>
        <th>No Surat</th>
        <th>Perihal</th>
        <th>Pengirim</th>
    </tr>
            
    </thead>
    <tbody>
        <?php $i = 1; ?>
        <?php foreach($surat as $s) : ?>
        <tr>
            <td><?= $i++; ?></td>
            <td><?= $s['no_agenda']; ?></td>
            <td><?= $s['kode_surat']; ?></td>
            <td><?= $s['asal']; ?></td>
            <td><?= $s['sifat_surat']; ?></td>
            <td><?= $s['tgl_surat']; ?></td>
            <td><?= $s['no_surat']; ?></td>
            <td><?= $s['perihal']; ?></td>
            <td><?= $s['nama_lengkap']; ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

</body>
</html>
