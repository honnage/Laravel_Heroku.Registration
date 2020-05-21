<?php
    namespace App;
    class Cart{
        //ตัวแปร จะมี $ แอดทิบิล ไม่ตรงมี
        public $items; //array เก็บข้อมูลสินค้า หลายรายการ
        public $totalQuantity; //จำนวนสินค้า
        public $totalPrice; //จำนวนราคารวม

        public function __construct($prevVart){
            if($prevVart != null ){ // ตะกร้าเก่า เป็นตร้าเก่ามีที่ข้อมูลอยู่
                $this->items = $prevVart->items;
                $this->totalQuantity = $prevVart->totalQuantity;
                $this->totalPrice = $prevVart->totalPrice;
            } else {   //ตะกร้าใหม่
                $this->items = [];
                $this->totalQuantity = 0;
                $this->totalPrice = 0;
            }
        }

        public function addItem($id, $subjects){
            $price = (int)($subjects->price);
            if(array_key_exists($id, $this->items)){ //เซ็ต ไอที ตรงกันหรือเปล่า
                $subjectToAdd = $this->items[$id];
                $subjectToAdd['quantity']++; //เพื่มจำนวนในรายการสินค้า ที่ซ้ำกัน ในรายการนั้นๆ
                $subjectToAdd['totalSingle'] = $subjectToAdd['quantity'] * $price; //คำนวนราคา จากจำนวนสินค้า * ราคา
            } else {
                $subjectToAdd = ['quantity'=>1, 'totalSingle'=>$price, 'data'=>$subjects];
            }

            $this->items[$id] = $subjectToAdd;
            $this->totalQuantity++;
            $this->totalPrice = $this->totalPrice + $price;
        }


    }

?>
