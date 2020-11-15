<?php


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


?>