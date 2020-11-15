<?php

include "koneksi.php";
include "class.php";


if ($_POST) {

    $keberangkatan = ((isset($_POST['keberangkatan'])) ? $_POST['keberangkatan'] : null);
    $tujuan = ((isset($_POST['tujuan'])) ? $_POST['tujuan'] : null);

    if ($keberangkatan == null or $tujuan == null) {
        echo "Maaf, data tidak boleh kosong";
        exit;
    } elseif ($keberangkatan == $tujuan) {
        echo "Maaf, Kota tujuan & Keberangkatan tidak boleh sama";
        exit;
    } else {

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

        $berangkat = carijalan($kota, $keberangkatan, $tujuan);
        foreach( $berangkat['data'] as $x => $kotaotw ) {
            $jalurotw[] = $kotaotw;
        }
        $ongkos = ongkosjalan($kota, $jalurotw);

        //print_r("Jalur yang dilalui : ".implode(" -> ", $jalurotw)."dengan total biaya : $ongkos");

        foreach ($kota as $x => $kotaclear) {
            foreach($kotaclear as $hapuskota => $biaya) {
                if (in_array($hapuskota, $jalurotw) and in_array($x, $jalurotw)) {
                    unset($kota[$x][$hapuskota]);
                }
            }
        }

        $pulang2 = carijalan($kota, $tujuan, $keberangkatan);
        $jalurotw2 = array();
        foreach( $pulang2['data'] as $x => $kotaotw2 ) {
            $jalurotw2[] = $kotaotw2;
        }
        $ongkos2 = ongkosjalan($kota, $jalurotw2);

        ?>

<p>Jalur Keberangkatan</p>
<p>Total Biaya <?php echo $ongkos; ?></p>
<table id="tabel-instruktur">
    <thead>
        <tr>
            <th>Id</th>
            <th>Dari Kota</th>
            <th>Ke kota</th>
            <th>Biaya Jalan</th>
        </tr>
    </thead>
    <tbody>
        <?php
            foreach($data['data'] as $kota) {
                $pajak[$kota['nama_kota']] = $kota['pajak'];
            }
            $i = 1;
            for ($y=0; $y<count($jalurotw)-1; $y++) {
                $type = 1;
                $gets = query("select * from jalur where dari = '".$jalurotw[$y]."' and ke = '".$jalurotw[$y+1]."'");
                if ($gets['jumlah'] == 0) {
                    $type = 2;
                    $gets = query("select * from jalur where ke = '".$jalurotw[$y]."' and dari = '".$jalurotw[$y+1]."'");
                }
                $gets = $gets['data'][0];
                
                echo "<tr>
                    <td>".$i."</td>
                    <td>".(($type == 2) ? $gets['ke'] : $gets['dari'])." (Pajak ".$pajak[(($type == 2) ? $gets['ke'] : $gets['dari'])].")</td>
                    <td>".(($type == 2) ? $gets['dari'] : $gets['ke'])." (Pajak ".$pajak[(($type == 2) ? $gets['dari'] : $gets['ke'])].")</td>
                    <td>".$gets['biaya']."</td>
                </tr>";
                $i++;
            }
        ?>
    </tbody>
</table>
<br><br>
<p>Jalur Kembali</p>
<p>Total Biaya <?php echo $ongkos2; ?></p>
<table id="tabel-instruktur">
    <thead>
        <tr>
            <th>Id</th>
            <th>Dari Kota</th>
            <th>Ke kota</th>
            <th>Biaya Jalan</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $i = 1;
            $jalurotw = $jalurotw2;
            for ($y=0; $y<count($jalurotw)-1; $y++) {
                $type = 1;
                $gets = query("select * from jalur where dari = '".$jalurotw[$y]."' and ke = '".$jalurotw[$y+1]."'");
                if ($gets['jumlah'] == 0) {
                    $type = 2;
                    $gets = query("select * from jalur where ke = '".$jalurotw[$y]."' and dari = '".$jalurotw[$y+1]."'");
                }
                $gets = $gets['data'][0];
                
                echo "<tr>
                    <td>".$i."</td>
                    <td>".(($type == 2) ? $gets['ke'] : $gets['dari'])." (Pajak ".$pajak[(($type == 2) ? $gets['ke'] : $gets['dari'])].")</td>
                    <td>".(($type == 2) ? $gets['dari'] : $gets['ke'])." (Pajak ".$pajak[(($type == 2) ? $gets['dari'] : $gets['ke'])].")</td>
                    <td>".$gets['biaya']."</td>
                </tr>";
                $i++;
            }
        ?>
    </tbody>
</table>

        <?php

    }
 
} else {
    echo "<script>window.location.href='index.php';</script>";
    exit;
}


?>