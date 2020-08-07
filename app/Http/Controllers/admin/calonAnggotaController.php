<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CalonAnggota;

class calonAnggotaController extends Controller
{
     public function index() {
        $datas = CalonAnggota::orderBy('id', 'DESC')->paginate(10);
        return view('calonAnggota.index',['datas'=>$datas]);
    }


         public function store(Request $request)
            {

            	$this->validate($request, [
        	            'nim' => ['required', 'integer', 'unique:data_calonanggota'],
        	            'nama_calonanggota' => ['required', 'string', 'max:20'],
        	            'jurusan' => ['required', 'string', 'max:255'],
        	            'nomor_telp' => ['required', 'string'],
        	            // 'password' => ['required', 'string', 'min:5'],
        	            'email_calonanggota' => ['required', 'string', 'email', 'max:255', 'unique:data_calonanggota'],
        	        ]);

                $input = $request->all();
                CalonAnggota::create($input);
                return redirect('/data-ca')->with('flash_message', 'berhasil');
            }


           public function edit($id)
                {
                     $coba = CalonAnggota::orderBy('id', 'DESC')->paginate(10);
                     $datas = CalonAnggota::findOrFail($id);
                    return view('calonAnggota.edit',compact('datas','coba'));
                }

            public function update(Request $request, $id) {
                    $this->validate($request, [
                        'nim' => ['required', 'integer'],
                        'nama_calonanggota' => ['required', 'string', 'max:20'],
                        'jurusan' => ['required', 'string', 'max:255'],
                        'nomor_telp' => ['required', 'string'],
                        // 'password' => ['required', 'string', 'min:5'],
                        'email_calonanggota' => ['required', 'string', 'email', 'max:255'],
                    ]);

                    $form_data = array(
                        'nim' =>$request->nim,
                        'nama_calonanggota' => $request->nama_calonanggota,
                        'jurusan' => $request->jurusan,
                        'nomor_telp' => $request->nomor_telp,
                        // 'password' => $request->password,
                        'email_calonanggota' => $request->email_calonanggota,
                    );
                    CalonAnggota::where('id',$id)->update($form_data);
                return redirect()->to('/data-ca')->with('flash_message', 'node updated!');
        }



            public function destroy($id)
            {
                CalonAnggota::destroy($id);
                return redirect('/data-ca')->with('flash_message', 'CalonAnggota deleted!');
            }

}
