@extends('layouts.app')

@section('custom.css')

	<!-- Styles -->
    <link rel="stylesheet" href="/css/product.css">

@endsection


@section('content')

    <div class="product_details" style="z-index: 1;">
        <div class="container">
            <div class="row details_row">

                <!-- Картинка продукта -->
                <div class="col-lg-6">
                    <div class="details_image">
                        <div class="details_image_more">
                        <img src="{{$item->image}}" alt="{{$item->title}}">  
                        <!-- <img src="/img/cards/Капли в глаза 1.jpg" alt=""> -->
                        </div>
                    </div>
                </div>

                <!-- Содержание -->
                <div class="col-lg-6">
                    <div class="details_content">
                        <!-- <div class="details_name">Product 1</div> -->
                        <div class="details_name" data-id="{{$item->id}}">{{$item->title}}</div>
                        <!-- <div class="details_price">Цена:</div> -->
                        <div class="details_price">₽{{$item->price}}</div>

                        <!-- Описание о продукте -->

                        <div class="details_text">
                            <p>Какое-то описание товара</p>
                        </div>

                        <!-- Количество -->
                        <div class="product_qty_container">
                            <div class="product_qty clearfix">
                                <span>Кол-во</span>
                                <input id="qty_input" type="text" pattern="[0-9]*" value="1">
                                <div class="qty_buttons">
                                    <div id="qty_up_button" class="qty_up qty_control">+</div>
                                    <div id="qty_down_button" class="qty_down qty_control">-</i></div>
                                </div>
                            </div>
                                <form action="{{route('basket-add', $item)}}" method="POST">
                                    <button type="submit" class="btn" role="button" style="border: solid 2px #1b1b1b;">Добавить в корзину</button>
                                @csrf
                            </form>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection