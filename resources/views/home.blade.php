@extends('layout.main')

@section('main-content')

<!-- banner -->
<article id="banner">
  <div class="row g-1 justify-content-center position-relative">
    <!-- 商品分類側邊欄 -->
    <div class="col-lg-3 col-md-12 shadow p-3 d-none d-xl-inline-block rounded-start">
      <ul class="list-group list-group-flush p-3">
        <span class="fs-5 mb-3">
          <i class="bi bi-bookmarks"></i>
          商品分類
        </span>

        @foreach($categories as $category)
        @if($category->id > 1 && $category->parent_id == 0 && $category->where('parent_id', $category->id)->count() > 0)
        <div class="list-group-item-action fs-6 cat-item">
          <div class="d-flex align-items-center justify-content-between">
            <div class="px-4 py-1"><a href="#">{{ $category->name }}</a></div>
            <div class="px-2 py-1"><i class="bi bi-caret-right"></i></div>
          </div>
        </div>
        <div class="bg-white position-absolute top-0 bottom-0 left-0 shadow p-4 z-2 d-none bg-opacity-75 rounded-3 mt-5 subcat">
        @foreach($categories as $subcategory)
        @if($subcategory->parent_id == $category->id)
        <a href="#">{{ $subcategory->name }}</a><span class="px-1">/</span>
        @endif
        @endforeach
        </div>
        @endif
        @endforeach

      </ul>
    </div>
    <div class="col-lg-9 col-md-12 shadow">
      <!-- 行銷圖banner -->
      <div class="f-carousel" id="mainCarousel">
        <div class="f-carousel__slide"><img src="./images/banner1.jpg" alt="行銷圖"></div>
        <div class="f-carousel__slide"><img src="./images/banner2.jpg" alt="行銷圖"></div>
        <div class="f-carousel__slide"><img src="./images/banner3.jpg" alt="行銷圖"></div>
      </div>
    </div>
  </div>
</article>
<!-- hot-product -->
<article id="hot-product" class="mt-625">
  <div class="text-center py-3">
    <h2>
      <span class="border-start border-top ps-2 pt-1 border-3">熱銷商品</span>
    </h2>
  </div>
  <div class="row row-cols-2 row-cols-md-3 row-cols-xxl-5 g-2">

    @foreach($hotMerchandises as $hotMerchandise)
    @if($hotMerchandise->status == 'S')

    <div class="col mt-0">
      <div class="card h-100 border-0">
        <div class="position-relative overflow-hidden shadow-sm rounded-3">
          <div class="merchandise-img-box">
            <img src="/{{ $hotMerchandise->photo }}" class="card-img-top rounded-3 object-fit-cover h-100" alt="{{ $hotMerchandise->name }}">
          </div>
          <span class="position-absolute top-0 end-0 bg-danger px-3 py-1 m-1 rounded-pill text-light fw-bold">HOT</span>
          <!-- 收藏、加入購物車、連結詳情頁 -->
          <ul class="list-unstyled d-flex align-items-center justify-content-between position-absolute start-0 end-0 mt -3 ms-3 me-3 bg-dark bg-opacity-75 rounded-start-pill rounded-end-pill overflow-hidden">
            <a class="col text-center" href="#" title="點擊加入喜歡清單">
              <li class="py-1">
                <i class="bi bi-heart text-light"></i>
                <span class="d-none">加入喜歡清單</span>
              </li>
            </a>

            <button type="button" class="border-start border-end border-secondary border-opacity-75 col-6 text-center p-0 addToCartBtn" title="點擊加入購物車" data-id="{{ $hotMerchandise->id }}">
              <li class="py-1">
                <i class="bi bi-plus-lg text-light"></i>
                <i class="bi bi-cart-fill text-light"></i>
                <span class="d-none">加入購物車</span>
              </li>
            </button>

            <a class="col text-center" href="/merchandise/{{ $hotMerchandise->id }}/detail" title="點擊前往商品詳情">
              <li class="py-1">
                <i class="bi bi-info-circle-fill text-light"></i>
                <span class="d-none">商品詳情</span>
              </li>
            </a>
          </ul>
        </div>
        <div class="card-body text-center">
          <h3 class="card-title h4">{{ $hotMerchandise->name }}</h3>
          <p class="price card-text fst-italic">
            <span class="sale fs-4 px-1">{{ number_format($hotMerchandise->price, 2) }}</span>
            <span class=""><br/></span>
            {{-- <span class="text-decoration-line-through px-1">10000</span> --}}
          </p>
        </div>
      </div>
    </div>

    @endif
    @endforeach

  </div>
</article>

<!-- new-product -->
<article id="new-product" class="mt-625">
  <div class="d-flex justify-content-between align-items-center py-3">
    <h2>
      <span class="border-start border-top ps-2 pt-1 border-3">最新商品</span>
    </h2>
    <span class="fs-5"><a href="/merchandise/new">看更多<i class="bi bi-arrow-right"></i></a></span>
  </div>
  <div class="row row-cols-2 row-cols-md-3 row-cols-xxl-4 g-2">
    
    @foreach($newMerchandises as $newMerchandise)
    @if($newMerchandise->status == 'S')

    <div class="col mt-0">
      <div class="card h-100 border-0">
        <div class="position-relative overflow-hidden shadow-sm rounded-3">
          <div class="merchandise-img-box">
            <img src="/{{ $newMerchandise->photo }}" class="card-img-top rounded-3 object-fit-cover h-100" alt="{{ $newMerchandise->name }}">
          </div>
          <span class="position-absolute top-0 end-0 bg-warning px-3 py-1 m-1 rounded-pill text-light fw-bold">NEW</span>
          <!-- 收藏、加入購物車、連結詳情頁 -->
          <ul class="list-unstyled d-flex align-items-center justify-content-between position-absolute start-0 end-0 mt -3 ms-3 me-3 bg-dark bg-opacity-75 rounded-start-pill rounded-end-pill overflow-hidden">
            <a class="col text-center" href="#" title="點擊加入喜歡清單">
              <li class="py-1">
                <i class="bi bi-heart text-light"></i>
                <span class="d-none">加入喜歡清單</span>
              </li>
            </a>

            <button type="button" class="border-start border-end border-secondary border-opacity-75 col-6 text-center p-0 addToCartBtn" title="點擊加入購物車" data-id="{{ $newMerchandise->id }}">
              <li class="py-1">
                <i class="bi bi-plus-lg text-light"></i>
                <i class="bi bi-cart-fill text-light"></i>
                <span class="d-none">加入購物車</span>
              </li>
            </button>

            <a class="col text-center" href="/merchandise/{{ $newMerchandise->id }}/detail" title="點擊前往商品詳情">
              <li class="py-1">
                <i class="bi bi-info-circle-fill text-light"></i>
                <span class="d-none">商品詳情</span>
              </li>
            </a>
          </ul>
        </div>
        <div class="card-body text-center">
          <h3 class="card-title h4">{{ $newMerchandise->name }}</h3>
          <p class="price card-text fst-italic">
            <span class="sale fs-4 px-1">{{ number_format($newMerchandise->price, 2) }}</span>
            <span class=""><br/></span>
            {{-- <span class="text-decoration-line-through px-1">10000</span> --}}
          </p>
        </div>
      </div>
    </div>

    @endif
    @endforeach

  </div>
</article>
    
@section('js')
<script src="/js/banner-slide.js"></script>
@if(session()->has('user'))
@include('component.cart')
@endif
@endsection

@endsection