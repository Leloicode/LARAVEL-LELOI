<?php

namespace App\Http\Controllers;

use App\Models\BillDetail;
use App\Models\Bills;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OderListController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bill_details = BillDetail::all();
        $WaitingBills = Bills::where('status',0)->paginate(5, ['*'], 'page0');
        $BeingTransportedBills = Bills::where('status',1)->paginate(5, ['*'], 'page1');
        $SuccessfulApplication = Bills::where('status',2)->orderBy('id', 'DESC')->paginate(5, ['*'], 'page2');
        $ApplicationFailed = Bills::where('status',3)->orderBy('id', 'DESC')->paginate(5, ['*'], 'page3');
        // dd($bills->Customer()->name\\);
        return view('admin.OderList',compact('WaitingBills','bill_details','BeingTransportedBills','SuccessfulApplication','ApplicationFailed'));
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
        //
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
    }
    public function ChuyenDangCho($id)
    {
         
        $bill = Bills::where('id',$id)->first();
        $email= $bill->Customer->email;
        // $phone = $bill->Customer->phone_number;
        $total = $bill->total;
        // $ghichu = $bill->note;
        // $bill_details = BillDetail::all();
        // dd($bill_details);
        //dd($bill->status);
        if ($bill->status === 0 ) {
            $sentData = [
                'thongbao' => 'Đơn hàng của bạn đang được vận chuyển đến bạn.Vui lòng chuẩn bị số tiền '.number_format($total).' vnđ để thanh toán cho nhân viên giao hàng',
                
                
            ];
            Mail::to($email)->send(new \App\Mail\Tinhtrangdonhang($sentData));
            $bill->status = 1;
            $bill->update();
            return redirect()->back()->with('chuyendon0','Chuyển trạng thái đơn hàng thành công');

            
        }
      
        if ($bill->status === 1 ) {
            $sentData = [
                'thongbao' => 'Đơn hàng của bạn đã giao thành công đến bạn. Với số tiền '.number_format($total).' vnđ .Cảm ơn bạn đã đặt hàng tại BAKERYLELOI',
                
                
            ];
            Mail::to($email)->send(new \App\Mail\Tinhtrangdonhang($sentData));
            $bill->status = 2;
            $bill->update();
    
            return redirect()->back()->with('chuyendon0','Chuyển trạng thái đơn hàng thành công');  
        }
      
    }
    public function deleteDangCho($id)
    {
        
        $bill = Bills::where('id',$id)->first();
        $email= $bill->Customer->email;
        if ($bill->status === 0 ) {
            $sentData = [
                'thongbao' => 'Đơn hàng của bạn đã bị hủy do một số vấn đề. Cảm ơn bạn đã đặt hàng. Chúc bạn ngày mới tốt lành - BAKERYLELOI',
                
                
            ];
            Mail::to($email)->send(new \App\Mail\Tinhtrangdonhang($sentData));
            $bill->status = 3;
            $bill->update();
            return redirect()->back()->with('chuyendon0','Hủy đơn hàng đang chờ thành công');
        }
        if ($bill->status === 1 ) {
            $sentData = [
                'thongbao' => 'Đơn hàng của bạn đã bị hủy do một số vấn đề. Cảm ơn bạn đã đặt hàng. Chúc bạn ngày mới tốt lành - BAKERYLELOI',
                
                
            ];
            Mail::to($email)->send(new \App\Mail\Tinhtrangdonhang($sentData));
            $bill->status = 3;
            $bill->update();
            return redirect()->back()->with('chuyendon0','Hủy đơn hàng đang vận chuyển thành công');
        }
       

      

       
    }
}
