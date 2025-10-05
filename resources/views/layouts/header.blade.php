<nav class="fh5co-nav" role="navigation">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-xs-2">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Shop Logo" class="img-responsive"
                        style="max-height:50px; width:auto;">
                </a>
            </div>
            <div class="col-md-6 col-xs-6 text-center menu-1">
                <ul>
                    <li class="has-dropdown">
                        <a href="">Shop</a>
                        <ul class="dropdown">
                            <li><a href="">Single Shop</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('about') }}">About</a></li>
                    <li class="has-dropdown">
                         <a href="{{ route('services') }}">Services</a>
                        <ul class="dropdown">
                            <li><a href="#">Home Solutions</a></li>
                            <li><a href="#">Branding</a></li>
                            <li><a href="#">Car Washing</a></li>
                        </ul>
                    </li>
                    <li><a href="{{ route('product') }}">Products</a></li>
                    <li><a href="{{ route('contact') }}">Contact</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-xs-4 text-right hidden-xs menu-2">
                <ul>
                    <li class="search">
                        <div class="input-group">
                            <input type="text" placeholder="Search..">
                            <span class="input-group-btn">
                                <button class="btn btn-primary" type="button"><i class="icon-search"></i></button>
                            </span>
                        </div>
                    </li>
                    <li class="shopping-cart"><a href="#" class="cart"><span><small>0</small><i
                                    class="icon-shopping-cart"></i></span></a></li>
                </ul>
            </div>
        </div>

    </div>
</nav>
