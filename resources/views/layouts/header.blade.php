<!-- Professional Responsive Navbar -->
<nav class="fh5co-nav" role="navigation">
  <div class="container">
    <div class="row">
      <div class="col-xs-2">
        <div id="fh5co-logo">
          <a href="{{ url('/') }}">
            <img src="{{ asset('images/logo.jpg') }}" alt="Handyvibe Logo" style="max-height: 50px; width: auto;">
          </a>
        </div>
      </div>
      
      <div class="col-xs-10 text-right menu-1">
        <ul>
          <li class="has-dropdown">
            <a href="#">Shop</a>
            <ul class="dropdown">
              <li><a href="#">Single Shop</a></li>
              <li><a href="#">Categories</a></li>
              <li><a href="#">Featured Products</a></li>
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
          
          <!-- Search -->
          <li class="search">
            <form class="search-form" role="search">
              <input type="text" placeholder="Search..." name="search">
              <button type="submit"><i class="icon-search"></i></button>
            </form>
          </li>
          
          <!-- Cart -->
          <li class="shopping-cart">
            <a href="{{ route('cart.index') }}" class="cart">
              <span><i class="icon-shopping-cart"></i></span>
              <span class="cart-count">{{ (session('cart.products') ? collect(session('cart.products'))->sum('quantity') : 0) + (session('cart.services') ? count(session('cart.services')) : 0) }}</span>
            </a>
          </li>
          
          <!-- User Authentication -->
          @auth
            <li class="has-dropdown">
              <a href="#">
                <i class="icon-user"></i> {{ Auth::user()->name }}
              </a>
              <ul class="dropdown">
                @if(Auth::user()->user_type === 'vendor')
                  <li><a href="{{ route('vendor.dashboard') }}">Vendor Panel</a></li>
                @else
                  <li><a href="{{ route('user.dashboard') }}">My Account</a></li>
                @endif
                <li><a href="{{ route('profile.edit') }}">Profile</a></li>
                <li><a href="{{ route('cart.index') }}">Cart</a></li>
                <li>
                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     Logout
                  </a>
                </li>
              </ul>
            </li>
          @else
            <li class="login-btn-wrapper">
              <a href="{{ route('login') }}" class="login-btn">
                <i class="icon-user"></i>
                Login
              </a>
            </li>
          @endauth
        </ul>
      </div>
    </div>
  </div>
</nav>

<!-- Logout Form -->
@auth
  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
    @csrf
  </form>
@endauth

<!-- Additional CSS for enhanced navbar styling -->
<style>
/* Enhanced navbar styling */
.fh5co-nav {
  background: #fff;
  box-shadow: 0 2px 10px rgba(0,0,0,0.1);
  position: sticky;
  top: 0;
  z-index: 1000;
  padding: 10px 0;
}

.fh5co-nav .container {
  max-width: 100%;
  padding-left: 20px;
  padding-right: 20px;
}

.fh5co-nav .row {
  margin: 0;
}

.fh5co-nav .col-xs-2,
.fh5co-nav .col-xs-10 {
  padding-left: 5px;
  padding-right: 5px;
}

.fh5co-nav ul li {
  margin: 0 2px;
}

.fh5co-nav ul li a {
  padding: 25px 6px;
  font-weight: 500;
  transition: all 0.3s ease;
}

.fh5co-nav ul li a:hover {
  color: #d8692a;
  background: rgba(216, 105, 42, 0.1);
}

/* Search form styling */
.fh5co-nav .search {
  position: relative;
  margin-left: 10px;
}

.fh5co-nav .search input[type="text"] {
  padding: 8px 40px 8px 12px;
  border: 1px solid #ddd;
  border-radius: 25px;
  width: 150px;
  font-size: 14px;
  transition: all 0.3s ease;
}

.fh5co-nav .search input[type="text"]:focus {
  width: 200px;
  border-color: #d8692a;
  outline: none;
}

.fh5co-nav .search button {
  position: absolute;
  right: 5px;
  top: 50%;
  transform: translateY(-50%);
  background: #d8692a;
  border: none;
  color: white;
  padding: 6px 10px;
  border-radius: 50%;
  cursor: pointer;
  transition: all 0.3s ease;
}

.fh5co-nav .search button:hover {
  background: #b8561f;
}

/* Cart styling */
.fh5co-nav .shopping-cart {
  margin-left: 8px;
}

.fh5co-nav .cart {
  position: relative;
  padding: 8px 12px;
  border-radius: 25px;
  background: #f8f9fa;
  transition: all 0.3s ease;
}

.fh5co-nav .cart:hover {
  background: #d8692a;
  color: white;
}

/* Professional Login Button Styling */
.fh5co-nav .login-btn-wrapper {
  margin-left: 10px;
}

.fh5co-nav .login-btn {
  background: linear-gradient(135deg, #d8692a 0%, #b8561f 100%);
  color: #fff !important;
  padding: 10px 20px;
  border-radius: 25px;
  font-weight: 600;
  font-size: 14px;
  text-transform: uppercase;
  letter-spacing: 0.5px;
  transition: all 0.3s ease;
  box-shadow: 0 2px 8px rgba(216, 105, 42, 0.3);
  border: none;
  display: inline-flex;
  align-items: center;
  gap: 6px;
  text-decoration: none;
}

.fh5co-nav .login-btn:hover {
  background: linear-gradient(135deg, #b8561f 0%, #9a4a1a 100%);
  transform: translateY(-2px);
  box-shadow: 0 4px 12px rgba(216, 105, 42, 0.4);
  color: #fff !important;
}

.fh5co-nav .login-btn:active {
  transform: translateY(0);
  box-shadow: 0 2px 6px rgba(216, 105, 42, 0.3);
}

.fh5co-nav .login-btn i {
  font-size: 16px;
  margin-right: 4px;
}

/* Dropdown icon styling for laptop screens */
@media screen and (min-width: 769px) and (max-width: 1500px) {
  .fh5co-nav .has-dropdown > a::after {
    content: '\e921';
    font-family: 'icomoon';
    margin-left: 8px;
    font-size: 14px;
    font-weight: bold;
    transition: transform 0.3s ease;
  }
  
  .fh5co-nav .has-dropdown:hover > a::after {
    transform: rotate(180deg);
  }
}

/* User dropdown styling */
.fh5co-nav .has-dropdown .dropdown {
  min-width: 180px;
  padding: 15px 0;
  border-radius: 8px;
  box-shadow: 0 5px 20px rgba(0,0,0,0.15);
}

.fh5co-nav .has-dropdown .dropdown li {
  margin: 0;
}

.fh5co-nav .has-dropdown .dropdown li a {
  padding: 10px 20px;
  font-size: 14px;
  transition: all 0.3s ease;
}

.fh5co-nav .has-dropdown .dropdown li a:hover {
  background: #f8f9fa;
  color: #d8692a;
}

/* Mobile responsiveness */
@media screen and (max-width: 768px) {
  .fh5co-nav .container {
    padding-left: 15px;
    padding-right: 15px;
  }
  
  .fh5co-nav .search {
    display: none;
  }
  
  .fh5co-nav .shopping-cart {
    margin-left: 5px;
  }
  
  .fh5co-nav ul li a {
    padding: 20px 4px;
    font-size: 12px;
  }
  
  .fh5co-nav .col-xs-2,
  .fh5co-nav .col-xs-10 {
    padding-left: 2px;
    padding-right: 2px;
  }
  
  .fh5co-nav .login-btn {
    padding: 8px 16px;
    font-size: 12px;
  }
  
  .fh5co-nav .login-btn-wrapper {
    margin-left: 5px;
  }
}

@media screen and (max-width: 480px) {
  .fh5co-nav ul li a {
    padding: 15px 3px;
    font-size: 11px;
  }
  
  .fh5co-nav .container {
    padding-left: 10px;
    padding-right: 10px;
  }
  
  .fh5co-nav .login-btn {
    padding: 6px 12px;
    font-size: 11px;
  }
  
  .fh5co-nav .login-btn i {
    font-size: 14px;
  }
}
</style>

<!-- Enhanced JavaScript for navbar functionality -->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // Search functionality
  const searchForm = document.querySelector('.search-form');
  if (searchForm) {
    searchForm.addEventListener('submit', function(e) {
      e.preventDefault();
      const searchTerm = this.querySelector('input[name="search"]').value;
      if (searchTerm.trim()) {
        // You can implement search functionality here
        console.log('Searching for:', searchTerm);
        // Example: window.location.href = '/search?q=' + encodeURIComponent(searchTerm);
      }
    });
  }

  // Cart count update functionality
  function updateCartCount(count) {
    const cartCountElement = document.querySelector('.cart-count');
    if (cartCountElement) {
      cartCountElement.textContent = count;
      cartCountElement.style.display = count > 0 ? 'flex' : 'none';
    }
  }

  // Smooth scroll for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute('href'));
      if (target) {
        target.scrollIntoView({
          behavior: 'smooth',
          block: 'start'
        });
      }
    });
  });

  // Navbar scroll effect
  let lastScrollTop = 0;
  const navbar = document.querySelector('.fh5co-nav');
  
  window.addEventListener('scroll', function() {
    const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
    
    if (scrollTop > lastScrollTop && scrollTop > 100) {
      // Scrolling down
      navbar.style.transform = 'translateY(-100%)';
    } else {
      // Scrolling up
      navbar.style.transform = 'translateY(0)';
    }
    
    lastScrollTop = scrollTop;
  });

  // Add transition for smooth navbar movement
  navbar.style.transition = 'transform 0.3s ease-in-out';

  // Initialize cart count (you can get this from your backend)
  updateCartCount(0);
});
</script>
