<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\API\SemakPemilihController as SemakPemilihController;

class HomeController extends SemakPemilihController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if($request->isMethod('post')){

            $request->validate([
                'ic' => 'required|numeric|digits:12',
            ]);

            $getData = $this->ApiSpr($request->ic);
            // dd($getData);
            if($getData['code'] == 200){
                swal()->success('Berjaya','Rekod Ditemui',[]);
            }else{
                swal()->info('Info','Rekod Tidak Ditemui',[]);
            }

        }
        return view('pages.home.index',compact('getData'));
    }

}
