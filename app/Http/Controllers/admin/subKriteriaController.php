<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\subkriteria;
use App\kriteria;

class subKriteriaController extends Controller
{
    public function index() {
       $datas = subkriteria::orderBy('id_subkriteria', 'DESC')->paginate(10);
       $kriterias = kriteria::all();
       return view('subkriteria.index',compact('datas','kriterias'));
   }


        public function store(Request $request)
           {

               $this->validate($request, [
                       'id_kriteria' => ['required', 'integer'],
                       'nama_subkriteria' => ['required', 'string', 'max:255'],
                       'target' => ['required', 'string'],
                       'type' => ['required', 'string'],
                   ]);

               $input = $request->all();
               subkriteria::create($input);
               return redirect('/subkriteria')->with('flash_message', 'berhasil');
           }


          public function edit($id)
               {
                    $coba = subkriteria::orderBy('id_subkriteria', 'DESC')->paginate(10);
                    $datas = subkriteria::findOrFail($id);
                    $kriterias = kriteria::all();
                   return view('subkriteria.edit',compact('datas','coba','kriterias'));
               }


        public function update(Request $request, $id) {
                $this->validate($request, [
                    'id_kriteria' => ['required', 'integer'],
                    'nama_subkriteria' => ['required', 'string', 'max:255'],
                    'target' => ['required', 'string'],
                    'type' => ['required', 'string'],
                ]);

                $form_data = array(
                    'id_kriteria' =>$request->id_kriteria,
                    'nama_subkriteria' => $request->nama_subkriteria,
                    'target' => $request->target,
                    'type' => $request->type,
                );

    
               subkriteria::where('id_subkriteria',$id)->update($form_data);
               return redirect('/subkriteria')->with('success', 'kriteria updated!');
       }



           public function destroy($id)
           {
            subkriteria::destroy($id);
               return redirect('/subkriteria')->with('flash_message', 'Kriteria deleted!');
           }

        }