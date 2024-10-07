<?php
function curl($url){
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$output = curl_exec($ch);
curl_close($ch);
return $output;
}
// alamat localhost untuk file getWisata.php, ambil hasil export JSON
$send = curl("http://localhost/kuliah/rekayasa-web/pertemuan1/getWisata.php");
// mengubah JSON menjadi array
$data = json_decode($send, TRUE);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pratikum !</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2>Pratikum 1</h2>
<table class="table table-bordered table-striped table-hover"> 
    <thead> 
        <tr> 
            <th>kota</th> 
            <th>landmark</th> 
            <th>tarif</th> 
        </tr> 
    </thead> 
    <tbody> 
        <?php foreach ($data as $row): ?> 
            <tr> 
                <td><?php echo htmlspecialchars($row['kota']); ?></td> 
                <td><?php echo htmlspecialchars($row['landmark']); ?></td> 
                <td><?php echo htmlspecialchars($row['tarif']); ?></td> 
            </tr> 
        <?php endforeach; ?> 
    </tbody> 
</table>
</div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>