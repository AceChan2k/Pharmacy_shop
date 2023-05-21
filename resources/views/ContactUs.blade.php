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
        <form action="#">
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
            <textarea name="query" id="query" cols="30" rows="5"
            placeholder="Напишите нам что-то..."></textarea>
        </div>
        <div class="submitBtn">
            <button id="btn" onclick="notif()">Отправить</button>
        </div>
        </form>
        <p class="extra">Вы также можете связаться с нами по +71234567891</p>
    </div>
</main>
@endsection


