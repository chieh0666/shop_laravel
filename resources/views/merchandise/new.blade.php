@extends('layout.main')

@section('title', $title)

@section('main-content')

<!-- new merchandise list -->
<div class="text-center">
  <h2 class="py-1875">
    <span class="border-start border-top ps-2 pt-1 border-3">{{ $page_title }}</span>
  </h2>
</div>

<article id="new-merchandise" class="mt-1875">
  <div class="row row-cols-2 row-cols-md-3 row-cols-xxl-4 g-2">
    
    @foreach($newMerchandises as $newMerchandise)
    <div class="col mt-0">
      <div class="card h-100 border-0">
        <div class="position-relative overflow-hidden shadow-sm rounded-3">
          <div class="img-box">
            <img src="/{{ $newMerchandise->photo }}" class="card-img-top object-fit-cover h-100" alt="{{ $newMerchandise->name }}">
          </div>
          <span class="position-absolute top-0 end-0 bg-warning px-3 py-1 m-1 rounded-pill text-light fw-bold">NEW</span>
          <!-- 收藏、加入購物車、連結詳情頁 -->
          <ul class="list-unstyled d-flex align-items-center justify-content-between mb-0 bg-light">
            <a class="col text-center" href="#" title="點擊加入喜歡清單">
              <li class="py-1">
                <i class="bi bi-heart"></i>
                <span class="d-none">加入喜歡清單</span>
              </li>
            </a>

            <button type="button" class="border-start border-end border-secondary border-opacity-75 col-6 text-center p-0 addToCartBtn" title="點擊加入購物車" data-id="{{ $newMerchandise->id }}">
              <li class="py-1">
                <i class="bi bi-plus-lg" style="color: #008B8B !important;"></i>
                <i class="bi bi-cart" style="color: #008B8B !important;"></i>
                <span class="d-none">加入購物車</span>
              </li>
            </button>

            <a class="col text-center" href="/merchandise/{{ $newMerchandise->id }}/detail" title="點擊前往商品詳情">
              <li class="py-1">
                <i class="bi bi-info-circle"></i>
                <span class="d-none">商品詳情</span>
              </li>
            </a>
          </ul>
        </div>
        <div class="card-body text-center">
          <h3 class="card-title h4">{{ $newMerchandise->name }}</h3>
          <p class="price card-text fst-italic">
            <span class="sale fs-4 px-1">{{ number_format($newMerchandise->price, 0) }}</span>
            <span class=""><br/></span>
            <span class="text-decoration-line-through px-1">10000</span>
          </p>
        </div>
      </div>
    </div>
    @endforeach

  </div>
</article>

@push('scripts')
@if(session()->has('user_id'))
@include('component.cart')
@endif
@endpush

@endsection
