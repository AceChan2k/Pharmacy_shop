@extends('layouts.app')

@section('content')
<div class="BasketContainer">
    <div class="Basket_inner">
        <h2 class="Basket_title"> Корзина </h2>
        <p class="Basket_description">Оформление заказа</p>
    </div>
</div>

<div class="panel">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Название</th>
            <th>Кол-во</th>
            <th>Цена</th>
            <th>Общая стоимость товара</th>
        </tr>
        </thead>
        <tbody>
            @foreach ($order->products as $product)
            <tr>
                <td>
                    <a href="{{ route('showProduct', [$product->category['alias'], $product->id]) }}">
                        <div class="details_image_large">
                            <img src="{{$product->image}}" alt="{{$product->title}}">
                            {{ $product->title }}
                        </div>
                    </a>
                </td>
                <td>
                    <div class="qty">
                        <form action="{{ route('basket-add', $product) }}" method="POST">
                            <button type="submit" class="btn" href="">+</button>
                            @csrf
                        </form>
                        <span class="">{{$product->pivot->count}}</span>
                        <form action="{{ route('basket-remove', $product) }}" method="POST">
                            <button type="submit" class="btn" href="">-</button>
                            @csrf
                        </form>
                    </div>
                </td>
                <td style="padding-top: 35px;">₽{{$product->price}}</td>
                <td style="padding-top: 35px;">₽{{$product->getPriceForCount()}}</td>
            </tr>
            @endforeach
            <tr>
                <td colspan="3">Общая стоимость товара в корзине:</td>
                <td>₽{{$order->getFullPrice()}}</td>
            </tr>
        </tbody>
    </table>
    <div class="btn_order">
        <a type="button" class="btn" href="{{route('basket-place')}}">Оформить заказ</a>
    </div>
</div>
@endsection