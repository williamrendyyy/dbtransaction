<?php

namespace App\Http\Controllers;

use App\User;
use App\UserDetail;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TransController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nim = 202122179;
        $nama = 'Anjani';
        $address = 'Wiyata 3';

        $user_exist = User::where('nim', $nim)->first();

        if($user_exist) return 'User Sudah Terdaftar';

        DB::beginTransaction();

        try {
            //code...
            $user = new User;
            $user->nim = $nim;
            $user->nama = $nama;
            $user->save();
    
            $user_detail = new UserDetail;
            $user_detail->user_id = $user->id;
            $user_detail->address = $address;
            $user_detail->save();

            DB::commit();

            return 'Data Berhasil Disimpan';

        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
            return 'Data Gagal Disimpan';
        }








    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
