@extends('layout.main')

@section('title', $title)

@section('main-content')

<!-- new product list -->
<div class="text-center">
  <h2 class="py-1875">
    <span class="border-start border-top ps-2 pt-1 border-3">{{ $pageTitle }}</span>
  </h2>
</div>

<article id="new-product" class="mt-1875">
  <div class="row row-cols-2 row-cols-md-3 row-cols-xxl-4 g-2">
    
    @foreach($newMerchandises as $newMerchandise)
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
            <span class="text-decoration-line-through px-1">10000</span>
          </p>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</article>

@section('js')
@include('component.cart')
@endsection

@endsection