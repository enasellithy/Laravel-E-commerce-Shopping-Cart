   <!-- Navigation -->
   <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="{{url('/')}}">
                    E-Commerce
                </a>
            </div>
  
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav"> 
                </ul>
                <ul class="nav navbar-nav navbar-right rtl">
                     <!-- Authentication Links -->
                        @if (Auth::guest())
                            <li><a href="{{ route('login') }}">
                              {{trans('message.Login')}} 
                            </a></li>
                             <li><a href="{{ route('register') }}">
                               {{trans('message.Register')}} 
                            </a></li>
                        @else
                        <li>
                            <a href="{{route('product.shoppingCart')}}">
                                <i class="fa fa-shopping-cart"></i>Shopping Cart
                                <span class="badge">
               {{Session::has('cart')?Session::get('cart')->totalQty:''}}
                                </span>
                            </a>
                        </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                @if (Auth::user()->admin == 1)
                                <li>
                                    <a href="{{url('/admin')}}">
                                        Admin Panel
                                    </a>
                                </li>
                                @endif
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif

                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            Lang<span class="caret"></span>
                        </a>


                        <ul class="language_bar_chooser dropdown-menu" role="menu">
                            @foreach(LaravelLocalization::getSupportedLocales() as $localeCode => $properties)
                                <li>
                                    <a rel="alternate" hreflang="{{$localeCode}}" href="{{LaravelLocalization::getLocalizedURL($localeCode) }}">
                                        {{ $properties['native'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>