<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\menu;

class MenuController extends Controller
{
    public function index()
    {
        $menus = menu::all();
        return view ('menus.index',compact('menus'));
    }
    public function cart(){
        return view('Cart.cart');
    }
    public function addTocart($id){
        $menu = menu::findorFail($id);

        $cart = session()->get('cart', []);
        if(isset($cart[$id])){
            $cart[$id]['quantity']++;
        }
        else{
            $cart[$id] = [
                'name' => $menu->name,
                'quantity' => 1,
                'price' => $menu->price,
                'description' => $menu->description,
                'image' => $menu->image,
                // 'total' => $cart['quantity'] * $cart['price']
            ];
        }
        session()->put('cart', $cart);
        return redirect()->back()->with('success', 'Menu added to cart successfully');
    }
    public function update(Request $request)
    {
        if($request->id && $request->quantity){
            $cart = session()->get('cart');
            $cart[$request->id]["quantity"] = $request->quantity;
            session()->put('cart', $cart);
            session()->flash('success', 'Cart updated successfully');
        }
    }
    public function remove(Request $request)
    {
        if($request->id) {
            $cart = session()->get('cart');
            if(isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Menu removed successfully');
            return redirect()->back();
        }
    }
}
