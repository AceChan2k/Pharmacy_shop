@extends('layouts.app')

@section('custom.css')

	<!-- Styles -->
	<link rel="stylesheet" href="/css/contactus.css"/>

@endsection

@section('content')
<main class="main">
    <div class="formBox">
        <h2>Написать нам</h2>
        <p>Вы услышите о нас в ближайшее время!</p>
        <form action="{{route('msg-confirm')}}" method="POST">
        @csrf
        <div class="nameInp">
            <!-- <i class="fa fa-user icon"></i> -->
            <input type="text" placeholder="Полное имя" name="name" id="name">
        </div>
        <div class="mailInp">
            <!-- <i class="fa fa-envelope" aria-hidden="true"></i> -->
            <input type="email" name="mail" id="mail" placeholder="Почта">
        </div>
        <div class="phoneInp">
            <!-- <i class="fa-solid fa-phone"></i> -->
            <input type="text" name="phone" id="phone" placeholder="Телефон">
        </div>
        <div class="queryInp">
            <textarea name="msg" id="msg" cols="30" rows="5"
            placeholder="Напишите нам что-то..."></textarea>
        </div>
        <div class="submitBtn">
            <!-- <input type="submit" class="btn btn-success" value="Отправить"> -->
            <button id="btn" onclick="notif()">Отправить</button>
        </div>
        </form>
        <p class="extra" style="padding-bottom: 50px;">Вы также можете связаться с нами по +7(952) 999-99-01</p>
    </div>
</main>
@endsection


