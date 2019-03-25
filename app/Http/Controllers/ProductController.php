<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Product;
use App\Shop;
use App\Categories;
use App\Relations;
use App\User;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //$data['product']=Product::find($id); //suranda pagal id
        //$data['product']=Product::where('qty','1')->orderBy('name','DESC')->get(); gauna visus qty=1
        //$data['product']=Product::where('qty',0)->first(); paimtu pirma
        //$data['product']=User::where('role_id',1)->value('email')->get();istraukia useri kurio id 1 ir jo email gaunam
       // $data['products'] = Product::where('category_id',$_GET['id'])->paginate(3); //susitvarkyt, kad veiktu su id
        //{{$products->appends(request()->except('page'))->links()}}
        $userID=$request->user()->id;
        $data['products'] = Product::where('user_id',$userID)->get();
        
        return view('admin.products.list',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->user_id = $request->user()->id;
        $product->name = $request->name;
        $product->category_id = $request->categories_id;
        $product->weight = $request->weight;
        $product->special_price = $request->specprice;
        $product->unit = $request->qty;
        $product->img = $request->input_img;
        $product->price = $request->price;
        $product->slug = $request->slug;
        $product->description = $request->description;
        $product->save();

        $relation = new Relations();
        $relation->product_id = $product->id;
        $relation->category_id = $request->categories_id;
        $relation->save();
        return redirect(route('products.index',['id'=>$relation->category_id]));

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return redirect(route('products.update',$id));
        //var_dump(DB::table('Products')->where('id','=',$id)->get());
        //$data['products'] = DB::table('products')->where('category_id','=',$id)->get();
        // foreach ($Result as $key => $value) {
        //     //echo $value;
        //     echo $key;
        //     var_dump($key);
        //     echo '<br>';
        //     var_dump($value);
        // }
         $data['products'] = Product::where('category_id',$id)->paginate(5);
        return view('admin.products.list',$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['products']=Product::find($id);
        return view('admin.products.edit',$data);
        

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
        DB::update('update products set name = ?, slug = ?, price = ?, special_price = ?, unit = ?, description = ?, img = ?, shop_id = ?, weight = ? where id = ?',[$request->name,$request->slug,$request->price,$request->spec_price,$request->unit,$request->description,$request->img,$request->shop_id,$request->weight,$id]);
        echo "Record updated successfully.<br/>";
       //return redirect()->route('categories.index');


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
