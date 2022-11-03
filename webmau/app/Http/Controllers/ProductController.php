<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ProductLike;
use App\Models\Slide;
use App\Models\TypeProduct;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\Cast\String_;
use SebastianBergmann\Type\TypeName;

use function PHPSTORM_META\type;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getindex()
    {
        
        $products =Product::orderBy('id', 'DESC')->paginate(10, ['*'], 'page');
        return view('admin.Product',compact('products'));
    }
    public function index()
    {
        $products_listhome = Product::where('new',1)->paginate(4, ['*'], 'pag');
        $products_listsanpham = Product::where('new',1)->paginate(3, ['*'], 'pag');
        $products_list_kmhome = Product::where('promotion_price','<>',0)->paginate(4);
        $count_list = Product::where('new',1)->count();
        $count_list_km = Product::where('promotion_price','<>',0)->count();
        $slides=Slide::all();
        
        if (Auth::check()) {
            $user = Auth::user();
            $email = $user->email;
            $productlikes = ProductLike::where('email',$email)->get();
           
        }
        else {
            $productlikes = [];
        }
        
        
        return view('product.home',compact('slides','products_listhome','products_list_kmhome','count_list','count_list_km','productlikes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $type_product = TypeProduct::all();
        return view('admin.AddProduct',compact('type_product'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:150|unique:products,name',
            'img'=> 'image|required'
        ]);
        $name='';
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $name= time().'_'.$file->getClientOriginalName();
            $path=public_path('image/product');
            $file->move($path,$name);
    
        }
        $type= new Product();
        $type->id_type=$request->input('id_type');
        $type->name=$request->input('name');
        $type->unit_price=$request->input('unit_price');
        $type->promotion_price=$request->input('promotion_price');
        $type->unit=$request->input('unit');
        $type->description=$request->input('des');
        $type->new= 1;
        $type->image=$name;
        $type->save();
        return redirect('admin/product-index')->with('success','Bạn đã thêm thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        return view('product.product-detail',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $type_product = TypeProduct::all();
        $product = Product::find($id); 
        return view('admin.EditProduct',compact('type_product','product'));
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
        $this->validate($request,[
            'name' => 'required|max:150',
            
        ]);
        $Product = Product::find($id);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            $path=public_path('image/product');
            $file->move($path,$name);
            $Product->image=$name;
            
        }
        $Product->description=$request->input('des');
        $Product->update($request->all());
        return redirect('admin/product-index')->with('success','Bạn đã update sản phẩm thành công');
    }
    public function type_product( $id,$name){
        
        $product_fiter_top=Product::where('id_type',$id)->where('promotion_price','<>',0)->paginate(3,['*'],'type-page-top');
        $count_product_fiter_top=Product::where('id_type',$id)->where('promotion_price','<>',0)->get();


        $product_fiter_new=Product::where('id_type',$id)->where('new',1)->paginate(3,['*'],'typepage');
        $count_product_fiter_new=Product::where('id_type',$id)->where('new',1)->get();
        
        if (Auth::check()) {
            $user = Auth::user();
            $email = $user->email;
            $productlikes = ProductLike::where('email',$email)->get();
           
        }
        else {
            $productlikes = [];
        }
        
        return view('product.type-product',compact('product_fiter_new','count_product_fiter_new','id','name','product_fiter_top','count_product_fiter_top','productlikes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $products = Product::find($id)->delete();
      
        return redirect()->route('admin.products.index')->with('success','Xóa sản phẩm thành công');
    }
}
