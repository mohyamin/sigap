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
  border: 1px solid #000000;
  text-align: left;
  padding: 8px;
}

.center {
    text-align: center;
}

</style>

</head>
<body>

<table>
  <tr>
    <td colspan="2" class="center">
    <?php 
$image='assets/image/logo/kabbogor.png';
$imageData=base64_encode(file_get_contents($image));
$src='data:'.mime_content_type($image).';base64,'.$imageData;
echo'<img src="',$src,'"style=" position: absolute; width: 90px; height: auto;">';

?>
        <h1>KECAMATAN BOJONG GEDE</h1>
        <p>JL. RAYA BOJONGGEDE NOMOR 316</p>    
    </td>
</tr>
<tr>
    <td colspan="2" class="center">
        <h2>LEMBAR DISPOSISI</h2>
    </td>
</tr>
<tr>
    <td  colspan="2">
        <span style="margin-right : 122px;" >Index Berkas</span> : <?= $surat['index_surat'] ?>
    </td>
</tr>
<tr>
    <td colspan="2">
        <span style="margin-right : 105px;" >Tanggal/Nomor</span> :  <?= format_indo(substr($surat['tgl_surat'], 0,10 )) ?>/<?= $surat['no_surat'];?>
    </td>
</tr>
<tr>
    <td colspan="2">
        <span style="margin-right : 142px;">Asal Surat</span>  :  <?= $surat['asal'] ?>
    </td>
</tr>
<tr>
    <td colspan="2">
    <span style="margin-right : 166px;">Perihal</span>  : <?= $surat['perihal'] ?> </td>
</tr>
<tr>
    <td colspan="2">
    <span style="margin-right : 94px;">Diterima Tanggal</span> : <?= format_indo($surat['tgl_terima']) ?> </td>
</tr>
<tr>
    <td colspan="2">
    <span style="margin-right : 57px;">Tanggal Penyelesaian</span> : <?= format_indo(substr($surat['updated_at'], 0,10 )) ?></td>
</tr>
<tr>
    <td>
        Isi Disposisi : 
        <p><?= $camat['catatan'] ?></p>
        <?php 
            $image='assets/image/2.png';
            $imageData=base64_encode(file_get_contents($image));
            $src='data:'.mime_content_type($image).';base64,'.$imageData;
            echo'<img src="',$src,'"style="margin-right : 100px; width: 180px; height: auto;">';
?>
        
    </td>
    <td>
        Diteruskan Kepada :
        <p>
            <?= $sekcam['catatan'] ?>
        </p>
        <?php 
            $image='assets/image/2.png';
            $imageData=base64_encode(file_get_contents($image));
            $src='data:'.mime_content_type($image).';base64,'.$imageData;
            echo'<img src="',$src,'"style="margin-right : 100px; width: 180px; height: auto;">';
?>
    </td>
</tr>
</table>

</body>
</html>
