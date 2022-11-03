<?php
namespace App;

class Cart{
    public $items = null;
    public $totalQty = 0;
    public $totalPrice = 0;
    public function __construct($oldcart)
    {
       if ($oldcart) {
            $this->items = $oldcart->items;
            $this->totalQty = $oldcart->totalQty;
            $this->totalPrice = $oldcart->totalPrice;
       } 
    }
    public function add($product,$id)
    {
        // dd($product->promotion_price);
        if ($product->promotion_price === 0.0) {
            $giohang = ['qty'=>0,'price'=>$product->unit_price , 'item'=>$product];
        }
        else {
            $giohang = ['qty'=>0,'price'=>$product->promotion_price , 'item'=>$product];

        }   
      
        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $giohang = $this->items[$id];
            }
        }

        $giohang['qty']++;
        
        if ($product->promotion_price === 0.0) {
            $giohang['price'] = $product->unit_price * $giohang['qty'];
        }
        else {
            $giohang['price'] = $product->promotion_price * $giohang['qty'];

        }   
       
        $this->items[$id] = $giohang;
        $this->totalQty++;
        if ($product->promotion_price === 0.0) {
            //$giohang['price'] = $product->unit_price * $giohang['qty'];
            $this->totalPrice += $product->unit_price; 
        }
        else {
           //$giohang['price'] = $product->promotion_price * $giohang['qty'];
           $this->totalPrice += $product->promotion_price;

        }   
      
    }
    //xóa 1
    public function reduceByOne($id)
    {
        $this->items[$id]['qty']--;
        $this->items[$id]['price'] -= $this->items[$id]['item']['price'];
        $this->totalQty--;
    //dd($this->items[$id]['item']['promotion_price']);
        if ($this->items[$id]['item']['promotion_price'] === 0.0) {
            $this->totalPrice = $this->totalPrice - $this->items[$id]['item']['unit_price'];
        }
        else {
            $this->totalPrice =  $this->totalPrice - $this->items[$id]['item']['promotion_price'];
        }
        //dd($this->totalPrice);
        //dd($this->items[$id]['item']['unit_price']);
        //dd($this->totalPrice);
        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }
    public function Raiseonecart($id)
    {
        $this->items[$id]['qty']++;
        if ($this->items[$id]['item']['promotion_price'] === 0.0) {
            $this->items[$id]['price'] = $this->items[$id]['item']['unit_price'];
        }
        else {
            $this->items[$id]['price'] = $this->items[$id]['item']['promotion_price'];
        }
        $this->items[$id]['price'] += $this->items[$id]['item']['price'];
        $this->totalQty++;
        //dd($this->items[$id]['price']);
    //dd($this->items[$id]['item']['promotion_price']);
        if ($this->items[$id]['item']['promotion_price'] === 0.0) {
            $this->totalPrice = $this->totalPrice + $this->items[$id]['item']['unit_price'];
        }
        else {
            $this->totalPrice =  $this->totalPrice + $this->items[$id]['item']['promotion_price'];
        }
        //dd($this->totalPrice);
        // dd($this->items[$id]['item']['unit_price']);
        //dd($this->totalPrice);
        if ($this->items[$id]['qty'] <= 0) {
            unset($this->items[$id]);
        }
    }
    //xóa nhiều
    public function removeItem($id)
    {
        $this->totalQty -= $this->items[$id]['qty'];
        $this->totalPrice -= $this->items[$id]['price'];
        unset($this->items[$id]);
    }






}
?>