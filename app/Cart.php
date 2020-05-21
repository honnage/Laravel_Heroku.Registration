<?php
namespace App;

use Illuminate\Validation\Rules\Exists;

class Cart{

    public $items;
    public $totalQuantity; //จำนวนสินค้าทั้งหมด
    public $totalPrice; //จำนวนราคารวม

    public function __construct($prevCart){
        //ตะแกร้าเก่า
        if($prevCart != null){
            $this->items = $prevCart->items;
            $this->totalQuantity = $prevCart->totalQuantity;
            $this->totalPrice = $prevCart->totalPrice;
        }else{
            //ตะกร้าใหม่
            $this->items=[];
            $this->totalQuantity=0;
            $this->totalPrice=0;
        }
    }

    public function addItem($id,$subject){
        $price=(int)($subject->price);
        if(array_key_exists($id,$this->items)){
            $subjectToAdd = $this->items[$id];
            $subjectToAdd['quantity']++;//เพื่มรายการในสินค้านั้นๆ
            $subjectToAdd['totalSingle']=$subjectToAdd['quantity']*$price;
        }else{
            $subjectToAdd = [
                'quantity'=>1,
                'totalSingle'=>$price,
                '$data'=>$subject
            ];
        }

        $this->items[$id]=$subjectToAdd;
        $this->totalQuantity++;
        $this->totalPrice=$this->totalPrice + $price;
    }
}
?>
