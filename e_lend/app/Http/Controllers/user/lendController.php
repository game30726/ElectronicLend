<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\lend;
use App\User;

class lendController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $lend = lend::all();
        $data = array(
            'lend' => $lend
        );

        return view('/user/home',$data);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $lend = lend::all();
        $data = array(
            'lend' => $lend
        );

        return view('/user/form',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $order = lend::where('user_id','=', Auth::user()->id)->get();
        return view('user/order',['order' => $order]);
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
        return view('/user/form','/user/order', compact('lend'));
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
            'lend_name'=>'required',
            'position'=>'required',
            'start'=>'required',
            'end'=>'required',
            'status'=>'required',
          ]);
    
          $lend = lend::find($id);
          $lend->lend_name = $request->get('lend_name');
          $lend->status = $request->get('status');
          $lend->position = $request->get('position');
          $lend->start = $request->get('start');
          $lend->end = $request->get('end'); 
          $lend['user_id'] = Auth::user()->id;
          $lend->save();
        return redirect('/user/home');
    }
}
