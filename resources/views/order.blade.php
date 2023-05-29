@extends('layouts.app')

@section('content')
    <div class='template'>
    <h1>Подтверждение заказа</h1>
    <div class="container">
        <div class="row-order justify-content-center">
            <p>Общая стоимость заказа: <b>₽{{ $order->getFullPrice() }}</b></p>
            <form action="{{route('basket-confirm')}}" method="POST">
                <div class="main_panel">
                    <p>Укажите свое имя и номер телефона, для связи с Вами:</p>

                    <div class="container">
                        <div class="form-group">
                            <label for="name" class="control-label col-lg-offset-3 col-lg-2">Имя: </label>
                            <div class="col-lg-4">
                                <input type="text" name="name" id="name" value="" class="form-control">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div class="form-group">
                            <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Номер телефона: </label>
                            <div class="col-lg-4">
                                <input type="text" name="phone" id="phone" value="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <br>
                    @csrf
                    <input type="submit" class="btn btn-success" value="Подтвердите заказ" style="background-color: black;">    
                </div>
            </form>
        </div>
    </div>
    </div>
@endsection