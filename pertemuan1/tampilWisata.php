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
$send = curl("http://localhost/kuliah/pertemuan1/getWisata.php");
// mengubah JSON menjadi array
$data = json_decode($send, TRUE);

?>
 <table class="table">
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