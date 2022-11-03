<!doctype html>
<html lang="en">
  <head>
    <title>Đơn hàng</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    @isset ($sentData['thongbao'])
        <p>{{$sentData['thongbao']}} </p>
    @else

 
    <div class="donhang" style="background-color: rgb(241, 244, 244);padding: 10px;text-align: left;box-shadow: rgba(196, 246, 17, 0.24) 0px 3px 8px;">
        <h1 style="font-size: 20px">Thông tin đơn hàng - BAKERYLELOI</h1>
        <b>Đơn hàng đang được xử lí</b>
        <hr>
        
        <p>Người nhận: {{$sentData['name']}}</p>
        <p>Số điện thoại: {{$sentData['sdt']}}</p>
        <p>Địa chỉ: {{$sentData['address']}}</p>
        
        @if ($sentData['ghichu'] != "")
        <p>Ghi chú: {{$sentData['ghichu']}}</p>
        @endif

        <div class="container">

     
            <table class="table table-striped table-inverse table-responsive">
                <thead class="thead-inverse">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Giá sản phẩm</th>
                        <th>Số lượng</th>
        
                        
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($sentData['chitietgiohang'] as $key => $value)
                            
                   
                        <tr>
                            <td scope="row">{{$value['item']['name']}}</td>
                            <td>@if ($value['item']['promotion_price'] === 0.0)
                              {{$value['item']['unit_price']}}
                              @else
                              {{$value['item']['promotion_price']}}
                          @endif</td>
                            <td>{{$value['qty']}}</td>

                        </tr>
                       
                        @endforeach
                    </tbody>
            </table>
            @isset($sentData['giachuakm'])
            <p>Tổng : {{number_format($sentData['giachuakm'])}} vnđ</p>
            @endisset 
         
            @isset($sentData['magiamgia'])
                <p>Mã giảm : - {{number_format($sentData['magiamgia'])}} vnđ</p>
                @endisset 
            
        <h5>Tổng giá trị đơn hàng: {{number_format($sentData['tonggia'])}} vnđ</h5>
    </div>   
       
      </div>
      @endif  

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>