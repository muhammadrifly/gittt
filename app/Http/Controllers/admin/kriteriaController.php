<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Kriteria;

class kriteriaController extends Controller
{
        public function index() {
        $datas = Kriteria::orderBy('id_kriteria', 'DESC')->paginate(10);
        return view('kriteria.index',['datas'=>$datas]);
        }


            public function store(Request $request) {
                $this->validate($request, [
                        'nama_kriteria' => ['required', 'string'],
                        'persentase' => ['required', 'string', 'max:255'],
                        'secondary_factor' => ['required', 'string'],
                        'core_factor' => ['required', 'string'],
                    ]);
                $input = $request->all();
                Kriteria::create($input);
                return redirect('/kriteria')->with('flash_message', 'berhasil');
            }


            public function edit($id){
                        $coba = Kriteria::orderBy('id_kriteria', 'DESC')->paginate(10);
                        $datas = Kriteria::findOrFail($id);
                    return view('kriteria.edit',compact('datas','coba'));
                }


            public function update(Request $request, $id) {
                    $this->validate($request, [
                        'nama_kriteria' => ['required', 'string'],
                        'persentase' => ['required', 'string', 'max:255'],
                        'secondary_factor' => ['required', 'string'],
                        'core_factor' => ['required', 'string'],
                    ]);

                    $form_data = array(
                        'nama_kriteria' =>$request->nama_kriteria,
                        'persentase' => $request->persentase,
                        'secondary_factor' => $request->secondary_factor,
                        'core_factor' => $request->core_factor,
                    );
                Kriteria::where('id_kriteria',$id)->update($form_data);
                return redirect('/kriteria')->with('success', 'kriteria updated!');
        }

            public function destroy($id) {
                Kriteria::destroy($id);
                return redirect('/kriteria')->with('flash_message', 'Kriteria deleted!');}

}