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
                'thongbao' => '????n h??ng c???a b???n ??ang ???????c v???n chuy???n ?????n b???n.Vui l??ng chu???n b??? s??? ti???n '.number_format($total).' vn?? ????? thanh to??n cho nh??n vi??n giao h??ng',
                
                
            ];
            Mail::to($email)->send(new \App\Mail\Tinhtrangdonhang($sentData));
            $bill->status = 1;
            $bill->update();
            return redirect()->back()->with('chuyendon0','Chuy???n tr???ng th??i ????n h??ng th??nh c??ng');

            
        }
      
        if ($bill->status === 1 ) {
            $sentData = [
                'thongbao' => '????n h??ng c???a b???n ???? giao th??nh c??ng ?????n b???n. V???i s??? ti???n '.number_format($total).' vn?? .C???m ??n b???n ???? ?????t h??ng t???i BAKERYLELOI',
                
                
            ];
            Mail::to($email)->send(new \App\Mail\Tinhtrangdonhang($sentData));
            $bill->status = 2;
            $bill->update();
    
            return redirect()->back()->with('chuyendon0','Chuy???n tr???ng th??i ????n h??ng th??nh c??ng');  
        }
      
    }
    public function deleteDangCho($id)
    {
        
        $bill = Bills::where('id',$id)->first();
        $email= $bill->Customer->email;
        if ($bill->status === 0 ) {
            $sentData = [
                'thongbao' => '????n h??ng c???a b???n ???? b??? h???y do m???t s??? v???n ?????. C???m ??n b???n ???? ?????t h??ng. Ch??c b???n ng??y m???i t???t l??nh - BAKERYLELOI',
                
                
            ];
            Mail::to($email)->send(new \App\Mail\Tinhtrangdonhang($sentData));
            $bill->status = 3;
            $bill->update();
            return redirect()->back()->with('chuyendon0','H???y ????n h??ng ??ang ch??? th??nh c??ng');
        }
        if ($bill->status === 1 ) {
            $sentData = [
                'thongbao' => '????n h??ng c???a b???n ???? b??? h???y do m???t s??? v???n ?????. C???m ??n b???n ???? ?????t h??ng. Ch??c b???n ng??y m???i t???t l??nh - BAKERYLELOI',
                
                
            ];
            Mail::to($email)->send(new \App\Mail\Tinhtrangdonhang($sentData));
            $bill->status = 3;
            $bill->update();
            return redirect()->back()->with('chuyendon0','H???y ????n h??ng ??ang v???n chuy???n th??nh c??ng');
        }
       

      

       
    }
}
