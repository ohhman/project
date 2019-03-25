<?php

namespace App\Http\Controllers;
use App\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['categories'] = Categories::all();
        // return view('admin.categories.list',$data);
         $data['categories']=Categories::paginate(2); //{{$categories->links()}} prideti i blade
        return view('admin.categories.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['categories']=Categories::all();
        return view('admin.categories.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category = new Categories();
        $category->name = $request->name;
        $category->shop_id = $request->shops_id;
        $category->parent_id = $request->type;
        $category->img = $request->img;
        $category->slug = $request->slug;
        $category->description = $request->description;
            
        $category->save();
    return redirect(route('categories.index'));
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $data['categories'] = DB::table('Categories')->where('shop_id','=',$id)->get();
        //$cat =  Categories::find($id);
        //$cat = $cat->categoriesID;
        //dd($cat->id);
        $data['categories']= Categories::where('shop_id',$id)->paginate(1);
        return view('admin.categories.list',$data);
        //$data['category']=Categories::find($id);
        //return view('admin.categories.delete',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['categories']=Categories::find($id);
        return view('admin.categories.edit',$data);
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
        DB::update('update categories set name = ?, slug = ?, description = ?, img = ?, parent_id = ? where id = ?',[$request->name,$request->slug,$request->description,$request->img,$request->parent_id,$id]);
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
        //$category = Categories::find($id);
        //$category->delete();
        //$category = Categories::where('parent_id',$id);
        //$category->delete();
        //return redirect()->route('categories.index');
    }
   
}
