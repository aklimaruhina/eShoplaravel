<header>
        <div class="header-top">
        <div class="container">
          <div class="row">
            <div class="col-sm-12">
              <div class="top-left pull-left">
                <div class="language">
                  <form action="#" method="post" enctype="multipart/form-data" id="language">
                    <div class="btn-group">
                      <button class="btn btn-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> 
                        <img src="{{ asset('image/flags/gb.png')}}" alt="English" title="English">English <i class="fa fa-caret-down"></i></button>
                      <ul class="dropdown-menu">
                        <li><a href="#"><img src="{{asset('image/flags/lb.png')}}" alt="Arabic" title="Arabic"> Arabic</a></li>
                        <li><a href="#"><img src="{{ asset('image/flags/gb.png') }}" alt="English" title="English"> English</a></li>
                      </ul>
                    </div>
                  </form>
                </div>
                <div class="currency">
                  <form action="#" method="post" enctype="multipart/form-data" id="currency">
                    <div class="btn-group">
                      <button class="btn btn-link dropdown-toggle" data-toggle="dropdown"> <strong>$</strong> <i class="fa fa-caret-down"></i> </button>
                      <ul class="dropdown-menu">
                        <li>
                          <button class="currency-select btn btn-link btn-block" type="button" name="EUR">€ Euro</button>
                        </li>
                        <li>
                          <button class="currency-select btn btn-link btn-block" type="button" name="GBP">£ Pound Sterling</button>
                        </li>
                        <li>
                          <button class="currency-select btn btn-link btn-block" type="button" name="USD">$ US Dollar</button>
                        </li>
                      </ul>
                    </div>
                  </form>
                </div>
              </div>

              <div class="top-right pull-right">
                <div id="top-links" class="nav pull-right">
                  <ul class="list-inline">
                    <!-- Authentication Link -->
                    @guest
                    <li class="nav-item">
                      <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                      <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                      </li>
                    @endif
                    @else
                    <li class="nav-item">
                      <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id)}}" class="img-circle" alt="">
                    </li>
                    <li class="nav-item dropdown">
                      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                          {{ Auth::user()->username }} <span class="caret"></span>
                      </a>

                      <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a href="{{ route('user.dashboard')}}" class="dropdown-item">Dashboard</a>
                          <a href="{{ route('user.profile')}}" class="dropdown-item">Profile</a>
                          <a class="dropdown-item" href="{{ route('logout') }}"
                             onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                              {{ __('Logout') }}
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              @csrf
                          </form>

                      </div>
                    </li>
                    @endguest
                    
                    <li><a href="#" id="wishlist-total" title="Wish List (0)"><i class="fa fa-heart"></i><span>Wish List</span><span> (0)</span></a></li>
                  </ul>
                  <div class="search-box">
                    <input class="input-text" placeholder="Search By Products.." type="text">
                    <button class="search-btn"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>

            </div>
          </div>
        </div>
        </div>
        <div class="container">
        <div class="header-inner">
          <div class="col-sm-4 col-xs-6 header-left">
            <div class="shipping">
              <div class="shipping-img"></div>
              <div class="shipping-text">(+91) 000-1233<br>
                <span class="shipping-detail">24/7 Online Support</span></div>
            </div>
          </div>
          <div class="col-sm-4 col-xs-12 header-middle">
            <div class="header-middle-top">
              <div id="logo"> <a href="{{ route('index') }}"><img src="{{asset('image/logo.png')}}" title="E-Commerce" alt="E-Commerce" class="img-responsive" /></a> </div>
            </div>
          </div>
          <div class="col-sm-4 col-xs-12 header-right">
            <div id="cart" class="btn-group btn-block">
              <!-- <button type="button" class="btn btn-inverse btn-block btn-lg dropdown-toggle cart-dropdown-button"> <span id="cart-total"><span class="cart-title">Shopping Cart</span><br> -->
              <!-- {{ App\Cart::totalItems() }} item(s) - $0.00</span> </button> -->
              <button type="button" class="btn btn-inverse btn-block btn-lg dropdown-toggle cart-dropdown-button"> <span id="cart-total"><span class="cart-title">Shopping Cart</span><br> 
              <span class="cart_total">{{Cart::getTotalQuantity()}} </span> item(s) - $<span class="subtotal">{{ Cart::getSubTotal() }}</span></span> </button>
              <ul class="dropdown-menu pull-right cart-dropdown-menu">
                <li>
                  <table class="table table-striped">
                    <tbody>
                       @foreach(Cart::getContent() as $product)

                     <tr id="cart_id_{{ $product->id }}">
                                           
                        @if( $product->attributes->has('image') )
                        
                          <td class="text-left"><img src="{{ asset('image/product-image/' . $product->attributes->image ) }}" alt="" width="100" class="image-responsive"></td>
                        
                          @endif
                        
                        
                        <td class="text-left">{{ $product->name }}</td>
                        <td class="text-right"> X {{ $product->quantity}}</td>
                        <td class="text-right">${{ $product->price}}</td>
                        <td class="text-center"><button class="btn btn-danger btn-xs remove" data-id="{{ $product->id }}" title="Remove"><i class="fa fa-times"></i></button></td>

                      </tr>

                      @endforeach
                      
                    </tbody>
                  </table>
                </li>
                <li>
                  <div>
                    <table class="table table-bordered">
                      <tbody>
                        <tr>
                          <td class="text-right"><strong>Sub-Total</strong></td>
                          <td class="text-right">${{ Cart::getSubTotal()}}</td>
                        </tr>
                        
                        <tr>
                          <td class="text-right"><strong>Total</strong></td>
                          <td class="text-right">${{ Cart::getTotal() }}</td>
                        </tr>
                      </tbody>
                    </table>
                    <p class="text-right"> <span class="btn-viewcart">
                      <a href="{{ route('carts.cartpage')}}"><strong><i class="fa fa-shopping-cart"></i> View Cart</strong></a></span> 
                      <span class="btn-checkout"><a href="{{ route('checkouts.index')}}"><strong><i class="fa fa-share"></i> Checkout</strong></a></span> </p>
                  </div>
                </li>
              </ul>
            </div>
          </div>
        </div>


        <nav id="menu" class="navbar">
          <div class="nav-inner">
            <div class="navbar-header"><span id="category" class="visible-xs">Categories</span>
              <button type="button" class="btn btn-navbar navbar-toggle" ><i class="fa fa-bars"></i></button>
            </div>
            <div class="navbar-collapse">
              <ul class="main-navigation">
                <li><a href="{{ route('index') }}"   class="parent"  >Home</a> </li>
                <li><a href="{{ route('products') }}"   class="parent"  >Collection</a> </li>
                <li><a href="category.html"   class="parent"  >Women</a> </li>
                <li><a href="category.html"   class="parent"  >Men</a> </li>
                <li><a href="category.html"   class="parent"  >Accessories</a> </li>
                <li><a href="#" class="active parent">Page</a>
                  <ul>
                    <li><a href="category.html">Category Page</a></li>
                    <li><a href="cart.html">Cart Page</a></li>
                    <li><a href="checkout.html">Checkout Page</a></li>
                    <li><a href="blog.html" >Blog Page</a></li>
                    <li><a href="singale-blog.html" >Singale Blog Page</a></li>
                    <li><a href="register.html">Register Page</a></li>
                    <li><a href="contact.html">Contact Page</a></li>
                  </ul>
                </li>
                <li><a href="blog.html" class="parent"  >Blog</a></li>
                <li><a href="about-us.html" >About us</a></li>
                <li><a href="contact.html" >Contact Us</a> </li>
              </ul>
            </div>
          </div>
        </nav>
        </div>
    </header>