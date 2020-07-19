<?php

namespace App;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class Cart
{
    public $restaurant_id = 0;
    public $items = null;
    public $totalQuantity = 0;
    public $totalPrice = 0;

    /**
     * Undocumented function
     *
     * @param [type] $oldCart
     */
    public function __construct($oldCart)
    {
        // if there any products in my cart then i'll put it in my new instance of my cart when adding new one
        if ($oldCart) {
            $this->restaurant_id = $oldCart->restaurant_id;
            $this->items = $oldCart->items;
            $this->totalQuantity = $oldCart->totalQuantity;
            $this->totalPrice = $oldCart->totalPrice;
        }
        // here we dont have any products in our old cart
    }

    /**
     * function add to cart
     *
     * @param [Product object] $item
     * @param [Product object] $id
     * @return void
     */
    public function add($item, $id, Request $request)
    {
        // dd($request->all());
        $new_array = $request->more_additions;
        if ($request->more_additions != null) {
            $more_additions = [];
            foreach ($request->more_additions as $key => $addition_id) {
                $addition = Addition::find($addition_id);
                array_push($more_additions, $addition_id);
            }
        }
        // $storedItem is schema for what my cart items should be like

        $sizePrice = Size::find($request->size_id) == null ? 0 : Size::find($request->size_id)->price;

        $storedItem = [
            'item' => $item,
            'quantity' => 0,
            'main_additions' => $request->main_additions,
            'more_additions' => $new_array ? $new_array : null,
            'size' => $request->size_id,
            'price' => $request->totalFromPopUp,
        ];
        // dd($storedItem);


        /**  if there is any items in the old cart will check if the given product exists or not
         *    if so we will set the item to be stored in our schema and update it's attributs
         *    if does not exist we will save the new one.
         */

        if ($this->items) {
            if (array_key_exists($id, $this->items)) {
                $storedItem = $this->items[$id];
            }
        }
        // $storedItem['quantity']++;
        $storedItem['quantity'] += $request->quantity;
        $storedItem['price'] = $request->totalFromPopUp;
        $this->items[$id] = $storedItem;
        $this->items[$id]['more_additions'] = $new_array ? $new_array : null;
        $this->restaurant_id = $request->user_id;
        $this->totalQuantity++;
        // dd($this);
        $additionPrice = 0;
        if (isset($request->more_additions)) {
            foreach ($new_array as $key => $addition_id) {
                // dd($addition_id, $addition_quan);
                $additionPrice += (Addition::find($addition_id)->price);
            }
        }
        $this->totalPrice += $request->totalFromPopUp;
        // dd($this);
    }


    /**
     * delete item from cart function
     *
     * @param [item] $id
     * @return bool
     */
    public function removeItem($id)
    {
        // dd($id, $this->items[$id]);
        $this->totalQuantity -= $this->items[$id]['quantity'];
        $additionPrice = 0;
        if ($this->items[$id]['more_additions'] != null) {
            foreach ($this->items[$id]['more_additions'] as $key => $addition_id) {
                $additionPrice += (Addition::find($addition_id)->price);
            }
        }
        $this->totalPrice -= $this->items[$id]['price'] * $this->items[$id]['quantity'];
        $this->totalPrice -= ($additionPrice * $this->items[$id]['quantity']);
        // DD($additionPrice, $this->totalPrice);
        unset($this->items[$id]);
        // if (isset($this->items[$id])) {
        //     $back['del'] = false;
        //     $back['quan'] = $this->backQuan();
        //     return $back;
        // } else {
        $back['del'] = true;
        $back['quan'] = $this->backQuan();
        return $back;
        // }
    }

    /**
     * return quantity of cart
     *
     * @return void
     */
    public function backQuan()
    {
        if (count($this->items) > 0) {
            return true;
        } else {
            return false;
        }
    }
}
