<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    
    public function basket() {
        $orderId = session(key:'orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }
        return view('basket', compact('order'));
    }

    // Сохранение заказа
    public function basketConfirm(Request $request){
        $orderId = session(key:'orderId');
        if (is_null($orderId)) {
            return redirect()->route('home');
        }
        $order = Order::find($orderId);
        $success = $order->saveOrder($request->name, $request->phone);

        if ($success) {
            session()->flash('success','Ваш заказ принят в обработку');
        } else {
            session()->flash('warning','Произошла ошибка');
        }
        return redirect()->route('home');
    }
    
    public function basketPlace() {
        $orderId = session(key:'orderId');
        if (is_null($orderId)) {
            return redirect()->route('app');
        }
        $order = Order::find($orderId);
        return view('order',compact('order'));
    }

    // Добавление товара
    public function basketAdd($product_id) 
    {
        $orderId = session(key:'orderId');
        if (is_null($orderId)) {
            $order = Order::create();
            session(['orderId' => $order->id]);
        } else {
            $order = Order::find($orderId);
        }

        if ($order->products->contains($product_id)) {
            $pivotRow = $order->products()->where('product_id', $product_id)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($product_id);
        }

        if (Auth::check()) {
            $order->user_id = Auth::id();
            $order->save();
        }

        $product = Product::find($product_id);
        session()->flash('success','Добавлен товар:' . $product->title);

        return redirect()->route('basket');
    }


    // Удаление товара
    public function basketRemove($product_id)
    {
        $orderId = session(key:'orderId');
        if (is_null($orderId)) {
            return redirect()->route('basket');
        }
        $order = Order::find($orderId);

        if ($order->products->contains($product_id)) {
            $pivotRow = $order->products()->where('product_id', $product_id)->first()->pivot;
            if ($pivotRow->count < 2) {
                $order->products()->detach($product_id);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
        
        $product = Product::find($product_id);
        session()->flash('warning','Удален товар:' . $product->title);

        return redirect()->route('basket');
    }

    
}
