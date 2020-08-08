<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use App\Sample;
use App\CalonAnggota;
use App\subKriteria;
use App\Kriteria;
use DB;

class sampleController extends Controller
{
    public function index() {
        $datas = Sample::join('sub_kriterias','samples.id_subkriteria','=','sub_kriterias.id_subkriteria')
        ->join('data_calonanggota', 'samples.anggota_id', 'data_calonanggota.id')
        ->select('samples.id','samples.values','samples.anggota_id','sub_kriterias.nama_subkriteria','sub_kriterias.target','data_calonanggota.nama_calonanggota')
        ->orderBy('id', 'DESC')->paginate(10);
        $ca = CalonAnggota::all();
        $kriteria = Kriteria::all();
        $subkriteria = subKriteria::all();

        $lk1 = Sample::join('sub_kriterias','samples.id_subkriteria','=','sub_kriterias.id_subkriteria')
        ->select('samples.values','samples.anggota_id','sub_kriterias.nama_subkriteria','sub_kriterias.target','sub_kriterias.type')
        ->where('sub_kriterias.id_kriteria', '=', 7)
        ->orderBy('samples.anggota_id')
        ->get();

        $lk2 = Sample::join('sub_kriterias','samples.id_subkriteria','=','sub_kriterias.id_subkriteria')
        ->select('samples.values','samples.anggota_id','sub_kriterias.nama_subkriteria','sub_kriterias.target','sub_kriterias.type')
        ->where('sub_kriterias.id_kriteria', '=', 8)
        ->get();

        $probation = Sample::join('sub_kriterias','samples.id_subkriteria','=','sub_kriterias.id_subkriteria')
        ->select('samples.values','samples.anggota_id','sub_kriterias.nama_subkriteria','sub_kriterias.target','sub_kriterias.type')
        ->where('sub_kriterias.id_kriteria', '=', 9)
        ->get();

        $listCalonlk1[] = array();

        $lk1hasilcore = array();
        $lk1hasilsecondary = array();
        foreach($lk1 as $item){
                // echo $item->nama_subkriteria. " ";
                if (!isset($lk1hasilcore[$item->anggota_id]) && !isset($lk1hasilsecondary[$item->anggota_id])){
                    $lk1hasilcore[$item->anggota_id] = array();
                    $lk1hasilsecondary[$item->anggota_id] = array();
                }
        
                $nilai = $item->values - $item->target;

                if($nilai >= 2){
                    $hasil = 1.5;
                } elseif ($nilai >= 1) {
                    $hasil = 2.5;
                } elseif ($nilai >= 0) {
                    $hasil = 3;
                } elseif($nilai >= -1){
                    $hasil = 2;
                } else {
                    $hasil = 1;
                }
                if ($item->type == "core") {
                    array_push($lk1hasilcore[$item->anggota_id], $hasil);
                    $listCalonlk1[$item->anggota_id]['core'] = $lk1hasilcore[$item->anggota_id];
                } else {
                    array_push($lk1hasilsecondary[$item->anggota_id], $hasil);
                    $listCalonlk1[$item->anggota_id]['secondary'] = $lk1hasilsecondary[$item->anggota_id];
                }
     
        }
           
        $listCalonlk2[] = array();
        $lk2hasilcore = array();
        $lk2hasilsecondary = array();
        foreach($lk2 as $item){
                if (!isset($lk2hasilcore[$item->anggota_id]) && !isset($lk2hasilsecondary[$item->anggota_id])){
                    $lk2hasilcore[$item->anggota_id] = array();
                    $lk2hasilsecondary[$item->anggota_id] = array();
                }
        
                $nilai = $item->values - $item->target;

                if($nilai >= 2){
                    $hasil = 1.5;
                } elseif ($nilai >= 1) {
                    $hasil = 2.5;
                } elseif ($nilai >= 0) {
                    $hasil = 3;
                } elseif($nilai >= -1){
                    $hasil = 2;
                } else {
                    $hasil = 1;
                }
                if ($item->type == "core") {
                    array_push($lk2hasilcore[$item->anggota_id], $hasil);
                    $listCalonlk2[$item->anggota_id]['core'] = $lk2hasilcore[$item->anggota_id];
                } else {
                    array_push($lk2hasilsecondary[$item->anggota_id], $hasil);
                    $listCalonlk2[$item->anggota_id]['secondary'] = $lk2hasilsecondary[$item->anggota_id];
                }
       
        }
        
        $listCalonp[] = array();
        $phasilcore = array();
        $phasilsecondary = array();
        foreach($probation as $item){
                if (!isset($phasilcore[$item->anggota_id]) && !isset($phasilsecondary[$item->anggota_id])){
                    $phasilcore[$item->anggota_id] = array();
                    $phasilsecondary[$item->anggota_id] = array();
                }
                $nilai = $item->values - $item->target;

                if($nilai >= 2){
                    $hasil = 1.5;
                } elseif ($nilai >= 1) {
                    $hasil = 2.5;
                } elseif ($nilai >= 0) {
                    $hasil = 3;
                } elseif($nilai >= -1){
                    $hasil = 2;
                } else {
                    $hasil = 1;
                }
                if ($item->type == "core") {
                    array_push($phasilcore[$item->anggota_id], $hasil);
                    $listCalonp[$item->anggota_id]['core'] = $phasilcore[$item->anggota_id];
                } else {
                    array_push($phasilsecondary[$item->anggota_id], $hasil);
                    $listCalonp[$item->anggota_id]['secondary'] = $phasilsecondary[$item->anggota_id];
                }
        }   

        
        
        try {
            $totalnilai = [];

            foreach($ca as $item){
                // print_r($listCalonlk1[$item->id]);
                $hasilncflk1[$item->id] = array_sum($listCalonlk1[$item->id]['core']) / count($listCalonlk1[$item->id]['core']);  
                $hasilnsflk1[$item->id] = array_sum($listCalonlk1[$item->id]['secondary']) / count($listCalonlk1[$item->id]['secondary']);
                
                // print_r($listCalonlk2[$item->id]);
                $hasilncflk2[$item->id] = array_sum($listCalonlk2[$item->id]['core']) / count($listCalonlk2[$item->id]['core']);  
                $hasilnsflk2[$item->id] = array_sum($listCalonlk2[$item->id]['secondary']) / count($listCalonlk2[$item->id]['secondary']);
                
                // print_r($listCalonp[$item->id]);
                $hasilncfp[$item->id] = array_sum($listCalonp[$item->id]['core']) / count($listCalonp[$item->id]['core']);  
                $hasilnsfp[$item->id] = array_sum($listCalonp[$item->id]['secondary']) / count($listCalonp[$item->id]['secondary']);

                foreach($kriteria as $data) {
                    if ($data->id_kriteria == 7) {
                        $total = ($hasilncflk1[$item->id] * $data->core_factor) + ($hasilnsflk1[$item->id] * $data->secondary_factor);
                        $totallk1[$item->id] = $total * $data->persentase;
                    }
                    if ($data->id_kriteria == 8) {
                        $total = ($hasilncflk2[$item->id] * $data->core_factor) + ($hasilnsflk2[$item->id] * $data->secondary_factor);
                        $totallk2[$item->id] = $total * $data->persentase;
                    }
                    if ($data->id_kriteria == 9) {
                        $total = ($hasilncfp[$item->id] * $data->core_factor) + ($hasilnsfp[$item->id] * $data->secondary_factor);
                        $totalprob[$item->id] = $total * $data->persentase; 
                    }
                }
                $hasilakhir = ($totallk1[$item->id] + $totallk2[$item->id] + $totalprob[$item->id]);
                $totalnilai[$item->id]['nama'] = $item->nama_calonanggota;
                $totalnilai[$item->id]['nilai'] = $hasilakhir;
                

            }

        } catch (\Exception $e) {
            // echo 'Caught exception: ',  $e->getMessage(), "\n";
        }
        

        
        
    
        return view('sample.index', compact('datas','ca','subkriteria', 'totalnilai'));
    }


    public function store(Request $request) {
        $datas = Sample::all();
        foreach ($datas as $item) {
            if ($item->anggota_id == $request->anggota_id && $item->id_subkriteria == $request->id_subkriteria) {
                return redirect('/sample')->with('flash_message', 'gagal'); 
            }
        }
        $this->validate($request, [
                'anggota_id' => ['required', 'integer'],
                'id_subkriteria' => ['required', 'integer'],
                'values' => ['required', 'string'],
            ]);
        $input = $request->all();
        Sample::create($input);
        return redirect('/sample')->with('flash_message', 'berhasil');
    }


    public function edit($id){
        $coba =Sample::orderBy('id_sample', 'DESC')->paginate(10);
        $datas =Sample::findOrFail($id);
        return view('sample.edit',compact('datas','coba'));
    }


    public function update(Request $request, $id) {
        $this->validate($request, [
            'anggota_id' => ['required', 'integer'],
            'id_subkriteria' => ['required', 'integer'],
            'values' => ['required', 'string'],
        ]);

        $form_data = array(
            'anggota_id' =>$request->anggota_id,
            'id_subkriteria' => $request->id_subkriteria,
            'values' => $request->values,
        );

        Sample::where('id',$id)->update($form_data);
        return redirect('/sample')->with('success', 'sample updated!');
    }

    public function destroy($id) {
        Sample::destroy($id);
        return redirect('/sample')->with('flash_message', 'sample deleted!');
    }

    public function lk1()
    {
        
    }

}


