<header class="mb-03125">
  @if(session()->has('user'))
  <div class="py-03125">
    <div class="container">
      <div class="d-flex align-items-center justify-content-end">
        <a class="p-1" href="/merchandise/manage" title="前往管理主頁">
          <span class="text-dark">商店管理</span>
        </a>
        <a class="p-1" href="/user/auth/signout" title="會員登出">
          <span class="text-dark">登出</span>
        </a>
      </div>
    </div>
  </div>
  @endif
  <div class="container">
    <div class="d-flex align-items-center justify-content-center">
      <!-- mobile logo -->
      <div class="col-3 d-block d-lg-none my-2 border rounded-1">
        <h1 class="m-0">
          <a href="/" title="回首頁">
            <img src="/images/logo.png" alt="YUJ">
            <span class="d-none">YUJ網頁設計</span>
          </a>
        </h1>
      </div>
    </div>
    <div class="d-flex align-items-center justify-content-between">
      <!-- logo -->
      <div class="col-2 d-lg-block d-none m-2 border rounded-1">
        <h1 class="m-0">
          <a href="/" title="回首頁">
            <img src="/images/logo.png" alt="YUJ">
            <span class="d-none">YUJ網頁設計</span>
          </a>
        </h1>
      </div>
      <!-- mobile menu button -->
      <div class="col-1 mx-1 d-block d-lg-none">
        <button class="fs-1 btn" type="button" data-bs-toggle="collapse" data-bs-target="#m-menu" aria-expanded="false" aria-controls="m-menu">
          <i class="bi bi-list"></i>
        </button>
      </div>
      <!-- search form -->
      <div class="search-form border border-secondary-subtle rounded-pill w-50 h-auto ps-2 overflow-hidden">
        <form action="/search" method="get">
          <div class="d-flex align-items-center justify-content-between">
            <label for="for-search">
              <span class="d-none">搜尋</span>
            </label>
            <input type="search" class="w-100 p-2 search-box" name="q" id="q" value="{{ $searchTerm ?? '' }}" placeholder="搜尋" title="請輸入關鍵字">
            <i class="bi bi-x-lg clear-btn"></i>
            <button class="search-btn bg-light border-start border-secondary-subtle py-2 px-3" type="submit" title="搜尋按鈕">
              <i class="bi bi-search"></i>
            </button>
          </div>
        </form>
      </div>
      <!-- user、cart button -->
      <div class="d-flex me-2 px-2 align-items-center justify-content-center fs-4">
        <div class="mx-3">
          @if(session()->has('user'))
          <a href="#" title="前往會員主頁">
            <i class="bi bi-person-circle"></i>
            <span class="d-none d-md-inline-block">{{ session()->get('user')->nickname ? session()->get('user')->nickname : session()->get('user')->first_name }}</span>
          </a>
          @else
          <a href="/user/auth/signin" title="前往會員登入">
            <i class="bi bi-person-circle"></i>
            <span class="d-none d-md-inline-block">登入</span>
          </a>
          @endif
        </div>
        <div class="mx-3">
          <a class="position-relative" href="/cart-list.html" title="前往我的購物車">
            <i class="bi bi-cart fs-2"></i>
            <span class="position-absolute top-0 start-100 translate-middle rounded-pill badge bg-danger mt-2 p-1">
              99+
            </span>
          </a>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- nav -->
<nav class="py-1 d-lg-block d-none sticky-top bg-white z-3 bg-opacity-75 shadow-sm">
  <ul class="nav justify-content-center">
    <li class="nav-item">
      <a class="nav-link" href="/merchandise/list" title="前往所有商品">所有商品</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/merchandise/new" title="前往最新商品">最新商品</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/promotion" title="前往促銷活動">促銷活動</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/news" title="前往最新消息">最新消息</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/about" title="前往關於我們">關於我們</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/contact-us" title="前往聯絡我們">聯絡我們</a>
    </li>
  </ul>
</nav>
<!-- mobile、tablet menu -->
<div class="collapse" id="m-menu">
  <div class="card card-body border-0">
    <ul class="nav flex-column text-center align-items-center">
      <li class="nav-item w-50 border-bottom border-2 rounded-start rounded-end">
        <a class="nav-link" href="/merchandise/list" title="前往所有商品">所有商品</a>
      </li>
      <li class="nav-item w-50 border-bottom border-2 rounded-start rounded-end">
        <a class="nav-link" href="/merchandise/new" title="前往最新商品">最新商品</a>
      </li>
      <li class="nav-item w-50 border-bottom border-2 rounded-start rounded-end">
        <a class="nav-link" href="/promotion" title="前往促銷活動">促銷活動</a>
      </li>
      <li class="nav-item w-50 border-bottom border-2 rounded-start rounded-end">
        <a class="nav-link" href="/news" title="前往最新消息">最新消息</a>
      </li>
      <li class="nav-item w-50 border-bottom border-2 rounded-start rounded-end">
        <a class="nav-link" href="/about" title="前往關於我們">關於我們</a>
      </li>
      <li class="nav-item w-50 border-bottom border-2 rounded-start rounded-end">
        <a class="nav-link" href="/contact-us" title="前往聯絡我們">聯絡我們</a>
      </li>
    </ul>
  </div>
</div>
<!-- 廣告或重要事項通知時顯示 -->
<div class="notify text-center text-danger py-03125 fs-5">
  <span>公告訊息</span>
</div>