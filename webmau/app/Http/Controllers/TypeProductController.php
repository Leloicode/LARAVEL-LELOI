<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\TypeProduct;
use Illuminate\Http\Request;

class TypeProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $type_products = TypeProduct::paginate(4, ['*'], 'pagetype');
        return view('admin.types_product',compact('type_products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.TypeProductadd');
        
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
            'name' => 'required|max:150|unique:type_products,name',
            'des' => 'required',
            'img' => 'image|max:10000', 
        ]);
        $name='';
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $name= time().'_'.$file->getClientOriginalName();
            $path=public_path('image/product');
            $file->move($path,$name);
    
        }
        $type= new TypeProduct();
        $type->name=$request->input('name');
        $type->description=$request->input('des');
        $type->image=$name;
        $type->save();
        return redirect('admin/typeproduct')->with('success','Bạn đã thêm thành công');
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
        $typeProduct = TypeProduct::find($id);
        return view('admin.editTypeProduct',compact('typeProduct'));
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
        
        $name='';
        $this->validate($request,[
            'name' => 'required|max:150',
            'des' => 'required',
            'img' => 'image|max:10000',
        ]
    );
  
        $typeProduct = TypeProduct::find($id);
        //dd($typeProduct);
        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $name = $file->getClientOriginalName();
            $path=public_path('image/product');
            $file->move($path,$name);
            $typeProduct->image=$name;
            
        }
       
        $typeProduct->description=$request->input('des');
        
        $typeProduct->update($request->all());
        return redirect('admin/typeproduct')->with('success','Bạn đã update danh mục thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $delete_product = Product::where('id_type',$id)->delete();
        $type_products = TypeProduct::find($id)->delete();
      
        return redirect()->route('typeproduct.index')->with('success','Xóa danh mục sản phẩm thành công');
    }
}
