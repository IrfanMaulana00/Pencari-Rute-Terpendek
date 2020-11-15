<?php

include "koneksi.php";

function query($sql) {
    global $conn;
    $simpanuery = mysqli_query($conn, $sql);
    $jumlah = mysqli_num_rows($simpanuery);
    
    $data = array();
    while($get = mysqli_fetch_array($simpanuery)) {
        array_push($data, $get);
    }

    return array("jumlah" => $jumlah, "data" => $data);
}

function ongkosjalan($kota, $jalurotw = array()){
    global $conn;
    $biaya = 0;
    for ($x = 0; $x < count($jalurotw)-1; $x++) {
        $biaya += $kota[$jalurotw[$x]][$jalurotw[$x+1]];
    }

    $biaya_jalan = $biaya + query("select * from data_kota where nama_kota = '".$jalurotw[0]."'")['data'][0]['pajak'];
    return $biaya_jalan;
}

function carijalan($data_biaya, $start, $target) {
    
    $data = array();
    $simpul = array();
    $simpan = new SplPriorityQueue();

    foreach ($data_biaya as $key => $adj) {
        $data[$key] = INF;
        $simpul[$key] = null;
        foreach ($adj as $w => $cost) {
            $simpan->insert($w, $cost);
        }
    }

    $data[$start] = 0;

    while (!$simpan->isEmpty()) {
      $u = $simpan->extract();
      if (!empty($data_biaya[$u])) {
          
        foreach ($data_biaya[$u] as $key => $cost) {
            
          $alt = $data[$u] + $cost;
          
          if ($alt < $data[$key]) {
            $data[$key] = $alt;
            $simpul[$key] = $u;
          }
        }
      }
    }

    $listkota = new SplStack();
    $u = $target;
    while (isset($simpul[$u]) && $simpul[$u]) {
      $listkota->push($u);
      $u = $simpul[$u];
    }
    
    if ($listkota->isEmpty()) {
        $result = array('status' => false, 'message' => "Jalur $start ke $target tidak ditemukan, error");
    } else {
        $listkota->push($start);
        $result = array('status' => true, 'data' => $listkota);
    }
    return $result;
}

$data = query("select * from data_kota");
foreach($data['data'] as $list) {
    $data2 = query("select * from jalur where dari = '".$list['nama_kota']."'");
    if ( $data2['jumlah'] > 0 ){
        foreach($data2['data'] as $list2) {
            $pajak2 = query("select * from data_kota where nama_kota = '".$list2['ke']."'")['data'][0]['pajak'];
            $biaya[$list2['ke']] = (int)$list2['biaya'] + $pajak2;
        }
    }

    $data2 = query("select * from jalur where ke = '".$list['nama_kota']."'");
    
    if ( $data2['jumlah'] > 0 ){
        foreach($data2['data'] as $list2) {
            $pajak2 = query("select * from data_kota where nama_kota = '".$list2['dari']."'")['data'][0]['pajak'];
            $biaya[$list2['dari']] = (int)$list2['biaya'] + $pajak2;
        }
    }

    $kota[$list['nama_kota']] = $biaya;
    $biaya = array();
}

while( true ) {
    echo "Masukan Kota Pengiriman (A-B) : ";
    $pengiriman = trim(fgets(STDIN));
    $pisah = explode("-", strtoupper($pengiriman));
    if (isset($pisah[0]) and isset($pisah[1])) {
        $start = $pisah[0];
        $end = $pisah[1];
    }

    if (isset($pisah[0]) and isset($pisah[1]) and $pisah[0] != "" and $pisah[1] != "") break;
}
echo "\n";
echo str_repeat("=", 40).PHP_EOL;
echo "\n";

$berangkat = carijalan($kota, $start, $end);
foreach( $berangkat['data'] as $x => $kotaotw ) {
    $jalurotw[] = $kotaotw;
}
$ongkos = ongkosjalan($kota, $jalurotw);

print_r("Jalur yang dilalui : ".implode(" -> ", $jalurotw)."\ndengan total biaya : $ongkos".PHP_EOL);

foreach ($kota as $x => $kotaclear) {
    foreach($kotaclear as $hapuskota => $biaya) {
        if (in_array($hapuskota, $jalurotw) and in_array($x, $jalurotw)) {
            unset($kota[$x][$hapuskota]);
        }
    }
}

$pulang = carijalan($kota, $end, $start);
$jalurotw = array();
foreach( $pulang['data'] as $x => $kotaotw ) {
    $jalurotw[] = $kotaotw;
}
$ongkos = ongkosjalan($kota, $jalurotw);

print_r("\nJalur yang dilalui : ".implode(" -> ", $jalurotw)."\ndengan total biaya : $ongkos".PHP_EOL);