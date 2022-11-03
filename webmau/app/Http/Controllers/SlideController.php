<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Slide;
use Illuminate\Http\Request;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products_listhome = Product::where('new',1)->paginate(4, ['*'], 'pag');
        $products_list_km = Product::where('promotion_price','<>',0)->paginate(4);
        $count_list = Product::where('new',1)->count();
        $count_list_km = Product::where('promotion_price','<>',0)->count();
        $slides=Slide::all();
        //dd($slides);
        return view('product.home',compact('slides','products_list','products_list_km','count_list','count_list_km'));
    }
    public function getindex()
    {   

        $slides =Slide::orderBy('id', 'DESC')->paginate(5, ['*'], 'pageslide');
        return view('admin.Slide',compact('slides'));
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
        $this->validate($request,[
            'img' => 'image|required'
        ]);
        $name='';

        if ($request->hasFile('img')) {
            $file = $request->file('img');
            $name= time().'_'.$file->getClientOriginalName();
            $path=public_path('image/slide');
            $file->move($path,$name);
    
        }
        $type= new Slide();
        $type->image=$name;
        $type->save();
        return redirect('admin/slide-index')->with('success','Bạn đã thêm slide thành công');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function show(Slide $slide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function edit(Slide $slide)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slide $slide)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slide  $slide
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Slide = Slide::find($id)->delete();
   
        return redirect()->route('admin.slides.index')->with('success','Xóa slide thành công');
    }
}
