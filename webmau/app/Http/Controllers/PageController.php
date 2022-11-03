<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Models\BillDetail;
use App\Models\Bills;
use App\Models\Coupons;
use App\Models\Customer;
use App\Models\Product;
use App\Models\ProductLike;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Session\Session as SessionSession;

class PageController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    public function getinputemail(){
        return view('product.input-email');
    }
    public function postInputEmail(Request $request){
              
        $this->validate($request,[
            'email' => 'required|exists:users',
           
        ],
        [
            'email.required' => "Vui lòng nhập tài khoản email đã đăng kí",
            'email.exists' => 'Email không tồn tại trong hệ thống'
        ]
    );
    $token = strtoupper(Str::random(10));
    //dd($token);
    $email=$request->email;
    $user = User::where('email',$email)->first();
    //dd($user);
    $user->update(['remember_token' => $token]);

        //dd(Hash::($user->password));
        //dd($user);
     
            //gửi mật khẩu reset tới email
            $sentData = [
                'full_name' => $user->full_name,
                'email' => $user->email,
                'token' => $token,
                'user' => $user
            ];
            Mail::to($email)->send(new \App\Mail\SendMail($sentData));
            Session::flash('message', 'Send email successfully!');
            return redirect()->route('login');//về lại trang đăng nhập của khách
        
       
    }

    public function getPass(User $user,$token,Request $request)
    {
        if ($user->remember_token === $token) {
            return view('product.getPass');
        }
        return abort(404);
    }
    public function postPass(User $user,$token,Request $request)
    {
       $this->validate($request,[
        'newpass' => 'required|min:6|max:20',
        'repass' => 'required|same:newpass|min:6|max:20'
       ],[
        'repass.same' => 'Hai mật khẩu không khớp'
       ]);
       $pass_hash = bcrypt($request->newpass);
       $user->update(['password'=> $pass_hash,'remember_token'=> null]);
       return redirect()->route('login')->with('yes','Đặt lại mật khẩu thành công');
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
    public function getAddtocart(Request $request,$id)
    {
        $product = Product::find($id);
        $oldcart = Session('cart')?Session::get('cart'):null;
        $cart = new Cart($oldcart);
        
        $cart->add($product,$id);
        $request->session()->put('cart',$cart);
        return redirect()->back();
    }
    public function getDatHang()
    {
        return view('product.dathang');
    }
    public function chitietgiohang()
    {

        return view('product.chitietgiohang');
    }
    public function postDatHang(Request $request) 
    {
        Session::forget('magiamgiatrue');   
        // dd($this->valuegiamgiaa);
        //dd($request->name_coupon);
        // if ($request->name_coupon == "") {
            $this->validate($request,[
                'phone' => 'required|min: 10| max: 10',
               
            ],[
                'phone.min' => 'Số điện thoại không nhỏ hơn 10 số',
                'phone.max' => 'Số điện thoại không quá 10 số',
     
            ]);
            
            $user = Auth::user();
            $cart = Session('cart');
            $customer = new Customer();
            $customer->name = $request->name;
            $customer->gender = $request->gender;
            $customer->email = $user->email;
            $customer->address = $request->address;
            $customer->phone_number = $request->phone;
            $customer->note = $request->note;
            $customer->save();
    
            $bill = new Bills();
            $bill->id_customer = $customer->id;
            $bill->date_order = date('Y-m-d');
            //dd($this->giamgia);
            if ($request->magiamgiatrue  === "true") {
                //dd( $cart->totalPrice - $request->valuegiamgia);
                $totalPrice = $cart->totalPrice - $request->valuegiamgia + 25000;
                $bill->total = $totalPrice;
                
            }
            else {
                $totalPrice = $cart->totalPrice + 25000 ;
                $bill->total = $totalPrice;
            }
       
            $bill->payment = $request->payment;
            $bill->note = $request->note;
            $bill->status= 0;
            $bill->save();
    
           
            foreach ($cart->items as $key => $value) {
                $bill_detail = new BillDetail();
                $bill_detail->id_bill = $bill->id;
                $bill_detail->id_product = $key;
                $bill_detail->quantity = $value['qty'];
                
                $bill_detail->unit_price = ($value['price']/$value['qty']);
                $bill_detail->save();
    
            }
                $chitietgiohang = $cart->items;
                //dd($chitietgiohang);
                $email=$user->email;
            
          
          
                //gửi mật khẩu reset tới email
                if ($request->magiamgiatrue  === "true") {
                    $sentData = [
                        'name' => $request->name,
                        'sdt' => $request->phone,
                        'address' => $request->address,
                        'ghichu' => $request->note,
                        'chitietgiohang' => $chitietgiohang,
                        'tonggia' => $totalPrice,
                        'giachuakm' =>$cart->totalPrice,
                        'magiamgia' => $request->valuegiamgia
                    ];
                }
                else {
                    $sentData = [
                        'name' => $request->name,
                        'sdt' => $request->phone,
                        'address' => $request->address,
                        'ghichu' => $request->note,
                        'chitietgiohang' => $chitietgiohang,
                        'tonggia' => $totalPrice
                        
                    ];
                }
                
                Mail::to($email)->send(new \App\Mail\DonHangEmail($sentData));

       
      
      



         Session::forget('cart');
        return redirect('/')->with('thongbao','Đặt hàng thành công. Đơn hàng của bạn sẽ được gửi đến '.$user->email);
        

    }
    public function deleteProductLike($id)
    {
        $emailusser = Auth::user()->email;
        $ProductLike = ProductLike::where('id_product',$id)->where('email',$emailusser);
        
        $ProductLike->delete();
        return redirect()->back()->with('thongbao','Xóa sản phẩm khỏi yêu thích thành công');
    }
        public function getCouPonProduct(Request $request)
        {
            $this->validate($request,[
                'name_coupon' => 'required|exists:coupons'
            ],[
                'name_coupon.exists' => 'Mã giảm giá không hợp lệ',
            ]);
            $couponInput = $request->name_coupon;
            // dd($couponInput);
            $coupon = Coupons::where('name_coupon',$couponInput)->first();
            

            $valuegiamgia = $coupon->value;
       
          
            return redirect()->back()->with(['magiamgiatrue'=> 'true', 'valuegiamgia' => $valuegiamgia,'thongbao'=>'Áp dụng mã giảm giá thành công']);
        }

    public function ListProductLike()
    {
        $user=Auth::user();
        $count_list_product_like = ProductLike::where('email',$user->email)->count();
        $products_list_product_like = ProductLike::where('email',$user->email)->paginate(4, ['*'], 'page');

        
        return view('product.listProduct',compact('count_list_product_like','products_list_product_like')); 
    }
    public function getDellItemOneCart($id)
    {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->reduceByOne($id);
        //dd(Session::get('cart'));
        if (count($cart->items)>0) {
            Session::put('cart',$cart);   
        }
        else {
            Session::forget('cart');   
        }
        //Session::put('cart',$cart);   
        return redirect()->back();
    }
    public function getRaiseonecart($id)
    {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->Raiseonecart ($id);
        if (count($cart->items)>0) {
            Session::put('cart',$cart);   
        }
        else {
            Session::forget('cart');   
        }
  
        return redirect()->back();
    }
    public function getDellItemCart($id)
    {
        $oldCart = Session::has('cart')?Session::get('cart'):null;
        $cart = new Cart($oldCart);
        $cart->removeItem($id);
        if (count($cart->items)>0) {
            Session::put('cart',$cart);   
        }
        else {
            Session::forget('cart');   
        }
  
        return redirect()->back();
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
    public function addProductLike($id)
    {
        
        $user = Auth::user();
        $email = $user->email;
        $product = ProductLike::where('id_product',$id)->get();
        $count_product = ProductLike::where('id_product',$id)->where('email',$email)->get();
        // dd($count_product->count());
        if ($count_product->count() == 0) {
            $addProduct = new ProductLike();
            $addProduct->email = $email;
            $addProduct->id_product = $id;
            $addProduct->save();
            return redirect()->back()->with('yeuthich','Sản phẩm đã được đưa vào yêu thích');
        }
        else {
            return redirect()->back()->with('yeuthich','Sản phẩm đã tồn tại trong danh sách yêu thích');;
        
        }
        
      
      

        
    }
}
