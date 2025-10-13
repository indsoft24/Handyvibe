<!-- Responsive, accessible Blade navbar (no external libraries) -->
<header class="hv-header">
  <nav class="hv-nav" aria-label="Main">
    <div class="hv-container">
      <!-- Brand -->
      <div class="hv-left">
        <a href="{{ url('/') }}" class="hv-brand" aria-label="Home">
          <img src="{{ asset('images/logo.jpg') }}" alt="Shop Logo" class="hv-logo">
        </a>
      </div>

      <!-- Mobile toggle -->
      <button class="hv-toggle" id="navToggle"
              aria-label="Toggle menu"
              aria-controls="mobileMenu"
              aria-expanded="false">
        <!-- Hamburger icon -->
        <svg width="24" height="24" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M3 6h18v2H3zM3 11h18v2H3zM3 16h18v2H3z"/></svg>
      </button>

      <!-- Primary menu (desktop) -->
      <div class="hv-center">
        <ul class="hv-menu" role="menubar" aria-label="Primary">
          <li class="hv-item hv-has-dropdown">
            <button class="hv-link hv-dropdown-toggle" aria-haspopup="true" aria-expanded="false" aria-controls="shopDropdown">
              Shop
              <svg class="hv-caret" width="14" height="14" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M7 10l5 5 5-5z"/></svg>
            </button>
            <ul id="shopDropdown" class="hv-dropdown" role="menu" aria-label="Shop submenu">
              <li role="none"><a role="menuitem" href="">Single Shop</a></li>
            </ul>
          </li>

          <li class="hv-item">
            <a class="hv-link" href="{{ route('about') }}">About</a>
          </li>

          <li class="hv-item hv-has-dropdown">
            <button class="hv-link hv-dropdown-toggle" aria-haspopup="true" aria-expanded="false" aria-controls="servicesDropdown">
              Services
              <svg class="hv-caret" width="14" height="14" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M7 10l5 5 5-5z"/></svg>
            </button>
            <ul id="servicesDropdown" class="hv-dropdown" role="menu" aria-label="Services submenu">
              <li role="none"><a role="menuitem" href="#">Home Solutions</a></li>
              <li role="none"><a role="menuitem" href="#">Branding</a></li>
              <li role="none"><a role="menuitem" href="#">Car Washing</a></li>
            </ul>
          </li>

          <li class="hv-item">
            <a class="hv-link" href="{{ route('product') }}">Products</a>
          </li>
          <li class="hv-item">
            <a class="hv-link" href="{{ route('contact') }}">Contact</a>
          </li>
        </ul>
      </div>

      <!-- Right utilities (desktop) -->
      <div class="hv-right">
        <form class="hv-search" role="search" aria-label="Site search">
          <input type="search" class="hv-search-input" placeholder="Search.." aria-label="Search">
          <button type="button" class="hv-search-btn" aria-label="Submit search">
            <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zM10 14a4 4 0 110-8 4 4 0 010 8z"/></svg>
          </button>
        </form>

        <a href="#" class="hv-cart" aria-label="Cart">
          <span class="hv-cart-badge">0</span>
          <svg width="22" height="22" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M7 4h-2l-1 2v2h2l3.6 7.59L8.25 18H19v-2H9.42l1.1-2h7.45a1 1 0 00.92-.62l3-7A1 1 0 0021 4H7z"/></svg>
        </a>

        @auth
          <div class="hv-user hv-has-dropdown">
            <button class="hv-user-btn hv-dropdown-toggle" aria-haspopup="true" aria-expanded="false" aria-controls="userDropdown">
              <svg width="22" height="22" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M12 12a5 5 0 100-10 5 5 0 000 10zm0 2c-5 0-9 2.5-9 5.5V22h18v-2.5C21 16.5 17 14 12 14z"/></svg>
              <span class="hv-user-name">{{ Auth::user()->name }}</span>
              <svg class="hv-caret" width="14" height="14" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M7 10l5 5 5-5z"/></svg>
            </button>
            <ul id="userDropdown" class="hv-dropdown" role="menu" aria-label="User menu">
              <li role="none">
                <a role="menuitem" href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                   Logout
                </a>
              </li>
            </ul>
          </div>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display:none;">
            @csrf
          </form>
        @else
          <a class="hv-auth hv-link" href="{{ route('login') }}">Login</a>
          <a class="hv-auth hv-link" href="{{ route('register') }}">Register</a>
        @endauth
      </div>
    </div>

    <!-- Mobile panel -->
    <div class="hv-mobile" id="mobileMenu" hidden>
      <div class="hv-mobile-inner">
        <div class="hv-mobile-head">
          <span>Menu</span>
          <button class="hv-close" id="navClose" aria-label="Close menu">
            <svg width="22" height="22" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M18.3 5.71L12 12.01l-6.29-6.3-1.41 1.42 6.29 6.29-6.3 6.29 1.42 1.41 6.29-6.29 6.29 6.3 1.41-1.42-6.29-6.29 6.3-6.29z"/></svg>
          </button>
        </div>

        <form class="hv-search hv-mobile-search" role="search" aria-label="Site search">
          <input type="search" class="hv-search-input" placeholder="Search.." aria-label="Search">
          <button type="button" class="hv-search-btn" aria-label="Submit search">
            <svg width="18" height="18" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M15.5 14h-.79l-.28-.27A6.471 6.471 0 0016 9.5 6.5 6.5 0 109.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zM10 14a4 4 0 110-8 4 4 0 010 8z"/></svg>
          </button>
        </form>

        <ul class="hv-mobile-menu" aria-label="Primary">
          <li class="hv-m-item hv-m-has-dropdown">
            <button class="hv-m-link hv-m-toggle" aria-haspopup="true" aria-expanded="false" aria-controls="mShop">
              Shop
              <svg class="hv-caret" width="14" height="14" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M7 10l5 5 5-5z"/></svg>
            </button>
            <ul id="mShop" class="hv-m-dropdown" hidden>
              <li><a href="">Single Shop</a></li>
            </ul>
          </li>

          <li class="hv-m-item"><a class="hv-m-link" href="{{ route('about') }}">About</a></li>

          <li class="hv-m-item hv-m-has-dropdown">
            <button class="hv-m-link hv-m-toggle" aria-haspopup="true" aria-expanded="false" aria-controls="mServices">
              Services
              <svg class="hv-caret" width="14" height="14" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M7 10l5 5 5-5z"/></svg>
            </button>
            <ul id="mServices" class="hv-m-dropdown" hidden>
              <li><a href="#">Home Solutions</a></li>
              <li><a href="#">Branding</a></li>
              <li><a href="#">Car Washing</a></li>
            </ul>
          </li>

          <li class="hv-m-item"><a class="hv-m-link" href="{{ route('product') }}">Products</a></li>
          <li class="hv-m-item"><a class="hv-m-link" href="{{ route('contact') }}">Contact</a></li>

          @auth
            <li class="hv-m-item hv-m-has-dropdown">
              <button class="hv-m-link hv-m-toggle" aria-haspopup="true" aria-expanded="false" aria-controls="mUser">
                {{ Auth::user()->name }}
                <svg class="hv-caret" width="14" height="14" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M7 10l5 5 5-5z"/></svg>
              </button>
              <ul id="mUser" class="hv-m-dropdown" hidden>
                <li>
                  <a href="{{ route('logout') }}"
                     onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                     Logout
                  </a>
                </li>
              </ul>
            </li>
          @else
            <li class="hv-m-item"><a class="hv-m-link" href="{{ route('login') }}">Login</a></li>
            <li class="hv-m-item"><a class="hv-m-link" href="{{ route('register') }}">Register</a></li>
          @endauth
        </ul>

        <div class="hv-mobile-footer">
          <a href="#" class="hv-cart hv-cart-mobile" aria-label="Cart">
            <span class="hv-cart-badge">0</span>
            <svg width="22" height="22" viewBox="0 0 24 24" aria-hidden="true"><path fill="currentColor" d="M7 4h-2l-1 2v2h2l3.6 7.59L8.25 18H19v-2H9.42l1.1-2h7.45a1 1 0 00.92-.62l3-7A1 1 0 0021 4H7z"/></svg>
          </a>
        </div>
      </div>
    </div>
  </nav>
</header>

<style>
:root{
  --hv-bg:#ffffff;
  --hv-fg:#0f172a;
  --hv-muted:#6b7280;
  --hv-accent:#2563eb;
  --hv-border:#e5e7eb;
  --hv-shadow:0 6px 24px rgba(15,23,42,.06), 0 2px 6px rgba(15,23,42,.06);
  --hv-radius:14px;
}
*{box-sizing:border-box}
.hv-header{position:sticky;top:0;z-index:50;background:var(--hv-bg);box-shadow:var(--hv-shadow)}
.hv-nav{max-width:1200px;margin:0 auto;padding:10px 16px}
.hv-container{display:flex;align-items:center;gap:16px}
.hv-left{flex:0 0 auto}
.hv-logo{max-height:44px;width:auto;display:block}
.hv-toggle{display:none;align-items:center;justify-content:center;border:1px solid var(--hv-border);background:transparent;color:var(--hv-fg);border-radius:10px;padding:8px;cursor:pointer}
.hv-center{flex:1 1 auto}
.hv-menu{display:flex;align-items:center;gap:8px;margin:0;padding:0;list-style:none}
.hv-item{position:relative}
.hv-link{display:inline-flex;align-items:center;gap:8px;padding:10px 12px;border-radius:10px;color:var(--hv-fg);text-decoration:none;line-height:1}
.hv-link:hover{background:#f8fafc}
.hv-caret{transition:transform .2s ease}
.hv-has-dropdown:focus-within .hv-caret,
.hv-has-dropdown:hover .hv-caret{transform:rotate(180deg)}
.hv-dropdown{position:absolute;top:100%;left:0;min-width:210px;background:var(--hv-bg);border:1px solid var(--hv-border);border-radius:12px;box-shadow:var(--hv-shadow);padding:8px 6px;list-style:none;margin:8px 0 0;display:none}
.hv-has-dropdown:hover > .hv-dropdown,
.hv-has-dropdown:focus-within > .hv-dropdown{display:block}
.hv-dropdown a{display:block;padding:10px 12px;border-radius:8px;color:var(--hv-fg);text-decoration:none}
.hv-dropdown a:hover{background:#f1f5f9}
.hv-right{flex:0 0 auto;display:flex;align-items:center;gap:12px}
.hv-search{display:flex;align-items:center;border:1px solid var(--hv-border);border-radius:12px;padding:6px 8px;background:#fafafa}
.hv-search-input{border:none;background:transparent;outline:none;min-width:160px;padding:4px 6px;color:var(--hv-fg)}
.hv-search-btn{border:none;background:var(--hv-accent);color:#fff;border-radius:10px;padding:7px 10px;cursor:pointer}
.hv-cart{position:relative;display:inline-flex;align-items:center;justify-content:center;color:var(--hv-fg);text-decoration:none;border:1px solid var(--hv-border);border-radius:12px;padding:8px;background:#fff}
.hv-cart-badge{position:absolute;top:-7px;right:-7px;background:var(--hv-accent);color:#fff;border-radius:999px;font-size:11px;padding:2px 6px}
.hv-user{position:relative}
.hv-user-btn{display:inline-flex;align-items:center;gap:8px;border:1px solid var(--hv-border);background:#fff;color:var(--hv-fg);border-radius:12px;padding:8px 10px;cursor:pointer}
.hv-user:hover .hv-dropdown,.hv-user:focus-within .hv-dropdown{display:block}
.hv-auth{padding:8px 10px;border:1px solid var(--hv-border);border-radius:12px}
.hv-auth:hover{background:#f8fafc}

/* Mobile panel */
.hv-mobile{position:fixed;inset:0;display:block;background:rgba(2,6,23,.5);backdrop-filter:saturate(120%) blur(2px);opacity:0;pointer-events:none;transition:opacity .2s ease}
.hv-mobile.open{opacity:1;pointer-events:auto}
.hv-mobile-inner{position:absolute;right:0;top:0;height:100%;width:min(92vw,400px);background:var(--hv-bg);box-shadow:var(--hv-shadow);display:flex;flex-direction:column;border-top-left-radius:16px;border-bottom-left-radius:16px;transform:translateX(100%);transition:transform .25s ease}
.hv-mobile.open .hv-mobile-inner{transform:translateX(0)}
.hv-mobile-head{display:flex;align-items:center;justify-content:space-between;padding:14px 16px;border-bottom:1px solid var(--hv-border);font-weight:600}
.hv-close{border:none;background:transparent;color:var(--hv-fg);padding:6px;cursor:pointer;border-radius:8px}
.hv-mobile-search{margin:12px 16px}
.hv-mobile-menu{list-style:none;margin:8px 0;padding:0 8px;display:flex;flex-direction:column;gap:4px}
.hv-m-item{border-bottom:1px dashed var(--hv-border)}
.hv-m-link{display:flex;align-items:center;justify-content:space-between;padding:12px 10px;text-decoration:none;color:var(--hv-fg);border-radius:10px}
.hv-m-link:hover{background:#f8fafc}
.hv-m-dropdown{list-style:none;margin:0;padding:4px 0 10px 10px;display:flex;flex-direction:column;gap:2px}
.hv-m-dropdown a{display:block;padding:10px;border-radius:10px;text-decoration:none;color:var(--hv-fg)}
.hv-m-dropdown a:hover{background:#f1f5f9}
.hv-mobile-footer{margin-top:auto;padding:14px 16px;border-top:1px solid var(--hv-border);display:flex;justify-content:flex-end}

@media (max-width: 992px){
  .hv-toggle{display:inline-flex}
  .hv-center{display:none}
  .hv-right{display:none}
}
@media (min-width: 993px){
  .hv-mobile{display:none}
  .hv-search-input{min-width:220px}
}

/* Focus styles */
:where(a,button,[role="menuitem"],input){outline-offset:2px}
:where(a,button,[role="menuitem"],input):focus{outline:2px solid var(--hv-accent)}
</style>

<script>
(function(){
  const body = document.body;
  const toggle = document.getElementById('navToggle');
  const panel  = document.getElementById('mobileMenu');
  const closeBtn = document.getElementById('navClose');

  function openPanel(){
    panel.hidden = false;
    requestAnimationFrame(()=>panel.classList.add('open'));
    toggle.setAttribute('aria-expanded','true');
    body.style.overflow = 'hidden';
  }
  function closePanel(){
    panel.classList.remove('open');
    toggle.setAttribute('aria-expanded','false');
    body.style.overflow = '';
    setTimeout(()=>{ panel.hidden = true; }, 200);
    toggle.focus();
  }

  toggle?.addEventListener('click', ()=>{
    const expanded = toggle.getAttribute('aria-expanded') === 'true';
    expanded ? closePanel() : openPanel();
  });
  closeBtn?.addEventListener('click', closePanel);
  panel?.addEventListener('click', (e)=>{ if(e.target === panel) closePanel(); });
  window.addEventListener('keydown', (e)=>{ if(e.key === 'Escape' && !panel.hidden) closePanel(); });
  window.addEventListener('resize', ()=>{ if(window.innerWidth >= 993 && !panel.hidden) closePanel(); });

  // Desktop dropdown toggles (keyboard + click)
  document.querySelectorAll('.hv-dropdown-toggle').forEach(btn=>{
    const menuId = btn.getAttribute('aria-controls');
    const menu = document.getElementById(menuId);
    const parent = btn.closest('.hv-has-dropdown');

    function open(){ btn.setAttribute('aria-expanded','true'); menu.style.display = 'block'; }
    function close(){ btn.setAttribute('aria-expanded','false'); menu.style.display = 'none'; }

    btn.addEventListener('click', (e)=>{
      e.preventDefault();
      const expanded = btn.getAttribute('aria-expanded') === 'true';
      expanded ? close() : open();
    });
    btn.addEventListener('keydown', (e)=>{
      if(e.key === 'ArrowDown'){ e.preventDefault(); open(); menu.querySelector('a')?.focus(); }
      if(e.key === 'Escape'){ close(); btn.focus(); }
    });
    document.addEventListener('click', (e)=>{ if(!parent.contains(e.target)) close(); });
  });

  // Mobile nested submenu toggles
  document.querySelectorAll('.hv-m-toggle').forEach(btn=>{
    const id = btn.getAttribute('aria-controls');
    const list = document.getElementById(id);
    btn.addEventListener('click', ()=>{
      const expanded = btn.getAttribute('aria-expanded') === 'true';
      btn.setAttribute('aria-expanded', expanded ? 'false' : 'true');
      list.hidden = expanded;
    });
  });
})();
</script>
