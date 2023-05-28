@extends('layouts.app')

@section('custom.css')

	<!-- Styles -->
	<link rel="stylesheet" href="/css/footer.css"/>
	<link rel="stylesheet" href="/css/header.css"/>

@endsection

@section('content')
  
	<main class="main">

		<h1>{{$cat->title}}</h1>

		<div class="container">
				
			<div class="row">
					@foreach($cat->products as $product) 
					<div class="cardnum col-lg-3 col-sm-6" style="width: 300px;">
					<div class="card">
						<div class="product-thumb">
							<a href="{{route('showProduct',[$product->category['alias'] , $product->id])}}"><img src="{{$product->image}}" alt="Product"></a>
						</div>
						<h1>{{$product->title}}</h1>
						<p class="price">₽{{$product->price}}</p>
						<p class="about_product">{{$product->description}}</p>
						<p class="card_button"><a href="{{route('showProduct',[$product->category['alias'] , $product->id])}}">Подробнее</a></p>
					</div>
				</div>
				@endforeach

			</div>
		</div>

	</main>
       
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>


@endsection



