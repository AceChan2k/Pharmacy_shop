@extends('layouts.app')

@section('content')
<main class="main" style="backgroung-color: white; margin-top: 1px; ">
			<h1>Контакты</h1>
			<div class="container-xl">
                <div class="contacts-row row">
                    <div class="contacts-info" style="padding-left: 0px">
                            <h6 style="font-size: 16px;">
                                Если вам необходима помощь службы поддержки, то напишите на электронную почту или обратитесь по указанным ниже номерам телефона.
                            </h6>
                        <div class="row" style="padding-left: 0px">  
                            <div class="col-md-12">
                                <div class="contacts" >
                                    <h5 style="font-size: 20px;">Наши телефоны:</h5>
                                <p style="display: block; font-size: 16px;">
                                    Cправочная: +7(952) 999-99-00
                                </p>
								<p style="display: block; font-size: 16px;">
									Интернет-аптека: +7(952) 999-99-01
								</p>
								<p style="display: block; font-size: 16px;">
									Склад: +7(952) 999-99-02	
								</p>
									<h5 style="font-size: 20px;">Наша почта:</h5>
                                <p style="display: block; font-size: 16px;">
                                    info@pharmacy.com
                                </p>
									<h5 style="font-size: 20px;">Наш адрес:</h5>
                                <p style="display: block; font-size: 16px;">
                                    Офис Pharmacy Shop расположен по адресу: Пермский край, Пермь, ул. Ленина, 45
                                </p>
                                </div>
                            </div> 
                            <div class="maps">   
                                <p class="map" style="display: block;">
									<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1056.7940165863035!2d56.236394431744024!3d58.01174363335457!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x43e8c72705fba3a7%3A0x94e5c6f9bd4d1769!2z0YPQuy4g0JvQtdC90LjQvdCwLCA0NSwg0J_QtdGA0LzRjCwg0J_QtdGA0LzRgdC60LjQuSDQutGA0LDQuSwgNjE0MDAw!5e0!3m2!1sru!2sru!4v1684912311132!5m2!1sru!2sru" width="980" height="500" style="border:0; border-radius: 20px;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                </p>
                            </div>
                        </div>     
                    </div>
                </div>
            </div>
</main>
@endsection
 


