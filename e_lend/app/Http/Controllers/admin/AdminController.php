<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\lend;
use App\User;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lend = lend::where('status','=','2')->get();
        return view('admin/dashboard',['lend' => $lend]);
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
        $request->validate([
            'name'=>'required',
            'quantity'=> 'required',
            'type'=> 'required',
            'iden'=> 'required',
            'brand'=> 'required',
            'gen'=> 'required',
            'number'=> 'required',
            'date'=> 'required',
            'price'=> 'required',
            'place'=> 'required',
            'status' => 'required'
          ]);
          $lend = new lend([
            'name' => $request->get('name'),
            'quantity'=> $request->get('quantity'),
            'type'=> $request->get('type'),
            'iden'=> $request->get('iden'),
            'brand'=> $request->get('brand'),
            'gen'=> $request->get('gen'),
            'number'=> $request->get('number'),
            'date'=> $request->get('date'),
            'price'=> $request->get('price'),
            'place'=> $request->get('place'),
            'status'=> $request->get('status')
          ]);
          $lend->save();
          return redirect('/admin/dashboard')->with('success', 'Stock has been added');
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
        $lend = lend::find($id);

        return view('/admin/edit', compact('lend'));
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
        $request->validate([
            'status'=>'required',
          ]);
    
          $lend = lend::find($id);
          $lend->status = $request->get('status');
          $lend->save();
        return redirect('/admin/dashboard');
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
