<?php 
$curl = curl_init();
curl_setopt_array($curl, array(
    CURLOPT_URL =>'https://farmasi.mimoapps.xyz/mimoqss2auyqD1EAlkgZCOhiffSsFl6QqAEIGtM',
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => '',
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'GET'
));

$response = curl_exec($curl);
curl_close($curl);
$response_array = json_decode($response, true);

$onscreen = '<table class="table" width="100%">
                  <thead>
                    <th>Kode Barang</th>
                    <th>Nama Barang</th>
                    <th>Code</th>
                    <th>BARCODE</th>
                    <th>Harga Jual</th>
                    <th>QUANTITY</th>
                    <th>COGS</th>
                  </thead>
                ';
foreach ($response_array as $resp) {
   $onscreen .='<tr>
                  <td>' . $resp['i_code'] . '</td>
                  <td>' . $resp['i_name'] . '</td>
                  <td>' . $resp['g_code'] . '</td>
                  <td>' . $resp['i_barcode'] .' </td>
                  <td>' . rupiah($resp['i_sell']) . '</td>
                  <td>' . $resp['i_qty'] . '</td>
                  <td>' . rupiah($resp['i_cogs']) . '</td>
                </tr>';
}

$onscreen.='</table>';
echo $onscreen;

function rupiah($angka){
	
	$hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
 
}