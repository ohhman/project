<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Shop;
//use App\Http\Controller\CategoriesController;
class ShopsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $usersid=$request->user()->id;
        $data['shops']=Shop::where('user_id',$usersid)->get();
        return view('admin.shops.list',$data);
       
        //$data['shops']=DB::table('shops')->where('user_id',$usersid)->get();
        //return view('admin.shops.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('admin.shops.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shop = new Shop();
        $shop->user_id = $request->user()->id;
        $shop->name = $request->name;
        $shop->adress = $request->adress;
        $shop->phone_number = $request->phone_number;
        $shop->imones_kodas = $request->im_kodas;
        $shop->PVM_moketojo_kodas = $request->PVM;    
        $shop->save();
        $data['shop_id']=$shop->id;
        return view('admin.shops.list',$data);
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
        $data['shops']=Shop::find($id);
        return view('admin.shops.edit',$data);
        
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
        
        DB::update('update shops set user_id = ?, name = ?, adress = ?, phone_number = ?, imones_kodas = ?, PVM_moketojo_kodas = ? where id = ?',[$request->user_id,$request->name,$request->adress,$request->phone,$request->imones_kodas,$request->pvm,$id]);
        echo "Record updated successfully.<br/>";
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
