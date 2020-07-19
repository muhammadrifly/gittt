<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Nilai;

class nilaiController extends Controller
{
    public function index() {
    $datas = Nilai::orderBy('id_nilai', 'DESC')->paginate(10);
    return view('nilai.index',['datas'=>$datas]);
    }


        public function store(Request $request) {
            $this->validate($request, [
                    'selisih' => ['required', 'string'],
                    'nilai' => ['required', 'string', 'max:255'],
                    'keterangan' => ['required', 'string'],
                ]);
            $input = $request->all();
            Nilai::create($input);
            return redirect('/nilai')->with('flash_message', 'berhasil');
        }


        public function edit($id){
                    $coba = Nilai::orderBy('id_nilai', 'DESC')->paginate(10);
                    $datas = Nilai::findOrFail($id);
                return view('nilai.edit',compact('datas','coba'));
            }


        public function update(Request $request, $id) {
                $this->validate($request, [
                    'selisih' => ['required', 'string'],
                    'nilai' => ['required', 'string', 'max:255'],
                    'keterangan' => ['required', 'string'],
                ]);

                $form_data = array(
                    'selisih' =>$request->selisih,
                    'nilai' => $request->nilai,
                    'keterangan' => $request->keterangan,
                );
                
            Nilai::where('id_nilai',$id)->update($form_data);
            return redirect('/nilai')->with('success', 'Nilai updated!');
    }

        public function destroy($id) {
            Nilai::destroy($id);
            return redirect('/nilai')->with('flash_message', 'Nilai deleted!');}

}

