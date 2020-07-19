<?php
    $bobotGap = [
        [
            'selisih' =>0,
            'bobot' => 3,
            'ket' => 'Tidak ada GAP (Kompetensi sesuai yang dibutuhkan)'
        ],
        [
            'selisih' =>1,
            'bobot' => 2.5,
            'ket' => 'Kompentensi individu kelebihan 1 tingkat/level'
        ],
        [
            'selisih' => -1,
            'bobot' => 2,
            'ket' => 'Kompentensi individu kurang 1 tingkat/level'
        ],
        [
            'selisih' =>2,
            'bobot' => 1,5,
            'ket' => 'Kompentensi individu kelebihan 2 tingkat/level'
        ],
        [
            'selisih' => -2,
            'bobot' => 1,
            'ket' => 'Kompentensi individu kurang 2 tingkat/level'
        ],
    ];
?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Penghitungan Metode Profile Matching</h1>
        <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Hasil Penghitungan Profile Matching</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header">
                        <div class="box-title">Proses Profile Matching</div>
                        <div class="box-tools">
                            <a href="<?= BASEURL .'wisata' ?>" class="btn btn-default btn-flat pull-left">Kembali</a>
                        </div>
                    </div>
                    <div class="box-body">
                    <?php
                        $no=1;
                        $profile_ideal=[];
                        $kode_sub=[];
                        $nama_sub=[];
                        $wisata_nilai=[];
                        $nilai_selisih=[];
                        $data_ranking = [];
                        $bobotkriteria = [];
                        $ic=0;
                        $nc=0;
                        $ns=0;
                        $is=0;
                        $kriteriaModel = new KriteriaModel;
                        $wisataModel = new WisataModel;
                        $wisata = $wisataModel->getAllWisata();
                        $baris= 0;
                        foreach($data['kriteria'] as $kriteria){
                        echo "<br/>";
                    ?>
                    <div class="callout callout-info"><h4>Penilaian kriteria <b><?= $kriteria->namakriteria ?></b></h4></div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center bg-gray">No</th>
                                    <th class="text-center bg-gray">Tempat Wisata</th>
                                    <?php
                                        //START --> buat kolom sub kriteria pada bagian header (B1, B2, B3, B4)
                                        $subkriteria = $kriteriaModel->getSubKriteria($kriteria->kodekriteria);
                                        foreach($subkriteria as $sub){
                                            $namasub = explode("|", str_replace(" ","",$sub->namasubkriteria));
                                            array_push($nama_sub, ucwords($namasub[1]));
                                            array_push($profile_ideal, $sub->nilai);
                                            array_push($kode_sub, $sub->kodesubkriteria);
                                    ?>

                                    <th class="text-center bg-yellow"><?= ucwords($namasub[1]) ?></th>
                                    <?php
                                        }
                                        //END --> buat kolom sub kriteria pada bagian header (B1, B2, B3, B4)

                                        //START --> buat kolom selisih kriteria pada bagian header (S B1, S B2, S B3, S B4)
                                        $i=0; 
                                        foreach($subkriteria as $sub){ 
                                    ?>
                                    <th class="bg-olive text-center">S <?= ucwords($nama_sub[$i]) ?></th>
                                    <?php 
                                            $i++; 
                                        }
                                        //END --> buat kolom selisih kriteria pada bagian header (S B1, S B2, S B3, S B4)

                                        //START --> buat kolom nilai GAP pada bagian header (G B1, G B2, G B3, G B4)
                                        $i=0; 
                                        foreach($subkriteria as $sub){
                                    ?>
                                    <th class="text-center bg-purple">G <?= ucwords($nama_sub[$i]) ?></th>
                                    <?php
                                            $i++; 
                                        } 
                                        //END --> buat kolom nilai GAP pada bagian header (G B1, G B2, G B3, G B4)
                                    ?>
                                    <th class="text-center bg-light-blue">CF</th>
                                    <th class="text-center bg-light-blue">SF</th>
                                    <th class="text-center bg-maroon">Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach($wisata as $w){ ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $w->namawisata ?></td>
                                    <?php
                                        //START --> tampilkan nilai sub kriteria setiap baris
                                        foreach($kode_sub as $k){
                                            $nilaiwisata = $wisataModel->getNilaiSubWisata($w->kodewisata, $k);
                                    ?>
                                    <td class="text-center bg-warning"><?= $nilaiwisata->nilai ?></td>
                                    <?php 
                                            // echo $nilaiwisata->nilai;
                                            array_push($wisata_nilai, $nilaiwisata->nilai);
                                        }
                                        //END --> tampilkan nilai sub kriteria setiap baris

                                        //START --> tampilkan nilai selisih sub kriteria setiap baris
                                        $i=0;
                                        foreach($subkriteria as $sub){
                                            $selisih = $wisata_nilai[$i] - $sub->nilai;
                                            array_push($nilai_selisih, $selisih);
                                    ?>
                                    <td class="bg-success text-center"><?= $nilai_selisih[$i] ?></td>
                                    <?php
                                            $i++; 
                                        }
                                        //END --> tampilkan nilai selisih sub kriteria setiap baris
                                       
                                        //START --> tampilkan nilai GAP sub kriteria setiap baris
                                        $i=0;
                                        foreach($subkriteria as $sub){
                                            $indexgap = array_search($nilai_selisih[$i], array_column($bobotGap, 'selisih'));
                                            if($sub->jenis == 'c'){
                                                $ic++;
                                                $nc += $bobotGap[$indexgap]['bobot'];
                                            }else{
                                                $is++;
                                                $ns += $bobotGap[$indexgap]['bobot'];
                                            }
                                       
                                        
                                    ?>
                                    <td class="text-center bg-gray"><?= $bobotGap[$indexgap]['bobot'] ?></td>
                                    <?php
                                        $i++;
                                        }
                                        //END --> tampilkan nilai GAP sub kriteria setiap baris

                                        //HITUNG NILAI NCF DAN NSF
                                        $ncf = $nc / $ic; 
                                        $nsf = $ns / $is; 
                                    ?>
                                    <th class="text-center bg-info"><?= round($ncf,2) ?></th>
                                    <th class="text-center bg-info"><?= round($nsf,2) ?></th>
                                    <?php
                                        //PROSES PENGHITUNGAN NILAI TOTAL 
                                        $setting = $kriteriaModel->getSetting($kriteria->kodekriteria);
                                        $nb = round((($setting[0]->bobot / 100) * $ncf) + (($setting[1]->bobot / 100) * $nsf),2);
                                        $nbx[$w->kodewisata][$baris] = $nb;
                                    ?>
                                    <th class="text-center bg-danger"><?= $nb ?></th>

                                </tr>
                                <?php
                                    $ic=0; $is=0; $nc=0; $ns=0; $ncf=0; $nsf=0;
                                    $wisata_nilai = []; $nilai_selisih=[]; 
                                } 
                                ?>
                                <tr>
                                    <th colspan="2" class="text-center bg-danger">Nilai Profile Ideal</th>
                                    <?php
                                    //looping profile ideal wisata
                                    foreach($profile_ideal as $p){ ?>
                                    <th class="text-center text-danger bg-danger"><?= $p ?></th>
                                    <?php } ?>
                                </tr>
                            </tbody>
                        </table>
                        <?php 
                            $baris++;
                            $kode_sub = [];
                            $profile_ideal = [];
                            $nama_sub=[];
                            $no=1;
                            }
                            
                        ?>
                        <br/>
                        <div class="callout callout-success"><h4>Hasil Profile Matching</h4></div>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center bg-gray">No</th>
                                    <th class="text-center bg-gray">Tempat Wisata</th>
                                    <?php foreach($data['kriteria'] as $k){ ?>
                                    <th class="text-center bg-olive"><?= 'N'.ucwords(substr($k->namakriteria,0,2)) ?></th>
                                    <?php
                                    array_push($bobotkriteria, $k->bobot);
                                    } ?>
                                    <th class="text-center bg-maroon">Ranking</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                $no=1;
                                $ranking=0;
                                foreach($wisata as $w){
                            ?>
                                <tr>
                                    <td class="text-center"><?= $no++ ?></td>
                                    <td><?= $w->namawisata ?></td>
                                    <?php 
                                        $i=0; 
                                        foreach($nbx[$w->kodewisata] as $n){ 
                                    ?>
                                    <td class="text-center bg-success"><?= $n ?></td>
                                    <?php 
                                            $ranking += ($bobotkriteria[$i]/100) * $n;
                                            $i++; 
                                    }
                                        array_push($data_ranking, $ranking);
                                        
                                        //UPDATE RANKING WISATA DITABEL TEMPAT WISATA
                                        $wisataModel->updateRankingWisata($w->kodewisata, $ranking);
                                    ?>
                                    <td class="text-center bg-danger"><?= $ranking ?></td>
                                </tr>
                                <?php 
                                    $ranking = 0; 
                                } 
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="box-footer">
                        <a href="<?= BASEURL .'wisata' ?>" class="btn btn-default btn-flat pull-left">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>