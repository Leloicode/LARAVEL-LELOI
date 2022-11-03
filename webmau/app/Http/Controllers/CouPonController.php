<?php

namespace App\Http\Controllers;

use App\Models\CouPon;
use App\Models\Coupons;
use Illuminate\Http\Request;

class CouPonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $CouPons = Coupons::all();
        //dd($CouPons);
        return view('admin.CouPonIndex',compact('CouPons'));
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
            'name_coupon' => 'required|min: 2|max: 30|unique:coupons,name_coupon',
          
        ],
        [
            'name_coupon.unique' => 'Tên mã đã tồn tại',
            'name_coupon.min' => 'Tên mã không được nhỏ hơn 2 kí tự',
            'name_coupon.max' => 'Tên mã không được lớn hơn 30 kí tự',
           
        ]);
        $coupon = new CouPon();
        $coupon->name_coupon = $request->name_coupon;
        $coupon->description = $request->description;
        $coupon->value = $request->value;
        $coupon->save();
        return redirect('admin/coupons')->with('success','Thêm mã giảm giá thành công');
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
        $coupon = Coupons::find($id)->delete();
        //dd($coupon);
        return redirect()->back()->with('success','Xóa mã giảm giá thành công');
    }
}
