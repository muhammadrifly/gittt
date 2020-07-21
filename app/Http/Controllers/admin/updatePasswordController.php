<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CalonAnggota;
use Illuminate\Support\Facades\Session;
use App\User;


class updatePasswordController extends Controller
{
     public function index() {
        // $datas = CalonAnggota::orderBy('id', 'DESC')->paginate(10);
        return view('resetpassword.index');
    }


         public function store(Request $request)
            {   

            	$this->validate($request, [
                    'password' => 'required|confirmed|min:6'
                ]); 
                $form_data = array(
                    'password' => $request->password
                );
                    echo "test ".$request->session()->get('id');
                // $input = $request->all();
                // CalonAnggota::create($input);
                print_r($form_data);
                try {
                    User::where('id',$request->session()->get('id'))->update($form_data);
                } catch (\Illuminate\Database\QueryException $e) {
                    echo 'Caught exception: ',  $e->getMessage(), "\n";
                }
                return redirect()->to('reset')->with(['message' => 'Update Berhasil']);
            }

}
