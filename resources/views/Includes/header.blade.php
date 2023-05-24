
<header class="header">

	<div class="header-one">

        <div class="container-one">	

            <div class="header-logo">
                <div class="logo">
                    <a href="/home"><img src="/img/logo2.svg" style="width: 130px"></a>
                </div>
            </div>
                    
                    
            <div class="header-search">
                <form class="search">
                    <label class="search-label">
                        <input class="search-input" type="text"  placeholder="Нажмите для поиска" />
                        <a class="search-btn" href="#">Найти</a>
                    </label>
                </form>
            </div>
                    
                    
            <div class="header-links-one">
                <nav class="nav-header-one">
                    <ul class="nav-header-list-one">
                        <li class="nav-header-link-icon">
                            <img src="/img/icons/massage.png" style="width: 20px;"/></img>
                        </li>
                        <li class="nav-header-link-icon-text">
                            <a href="/ContactUs">Написать нам</a>
                        </li>
                        <li class="nav-header-link-icon">
                            <img src="/img/icons/basket.svg"/></img>
                        </li>
                        <li class="nav-header-link-icon-text">
                            <a href="/basket">Корзина</a>
                        </li>
                    </ul>
                </nav>
            </div>
            
        </div>
    </div>
			
	<div class="header-two">
			
        <div class="container-two">			
            <div class="header-links-two">
                <nav class="nav-header-two">
                    <ul class="nav-header-list-two">
                        <li class="nav-header-link-text"><a href="/home">Главная</a></li>
                        <li class="nav-header-link-text"><a href="/home">Все категории &blacktriangledown;</a>
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{route('showCategory',$category->alias)}}">{{$category->title}}</a></li>
                        @endforeach
                    </ul>
                        </li>
                        <!-- <li class="nav-header-link-text"><a href="#">Оплата и доставка</a></li> -->
                        <!-- <li class="nav-header-link-text"><a href="#">Дополнительные услуги</a></li> -->
                        <li class="nav-header-link-text"><a href="/aboutus">О нас</a></li>
                        <li class="nav-header-link-text"><a href="/contacts">Контакты</a></li>
                    </ul>
                </nav>
            </div>
        </div>	
	</div>

</header>