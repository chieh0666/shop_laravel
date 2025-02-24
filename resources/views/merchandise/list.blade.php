@extends('layout.main')

@section('title', $title)

@section('main-content')

<!-- new product list -->
<div class="text-center">
  <h2 class="py-1875">
    <span class="border-start border-top ps-2 pt-1 border-3">{{ $pageTitle }}</span>
  </h2>
</div>

<article id="merchandise" class="mt-1875">
  <div class="row align-items-top justify-content-center position-relative">
    <div class="d-none d-xxl-inline-block col-3">
      <div class="accordion sticky-top border border-5 border-white z-1" id="merchandiseAccordion">

        <h3 class="fw-bolder mt-5 pt-3"><i class="bi bi-bookmarks"></i>商品分類</h3>

        @foreach($categories as $category)
        @if($category->id > 1 && $category->parent_id == 0 && $category->where('parent_id', $category->id)->count() > 0)
        <div class="accordion-item shadow">
          <h3 class="accordion-header">
            <button class="accordion-button fw-bolder" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $category->id }}" aria-expanded="true" aria-controls="collapse{{ $category->id }}">
              {{ $category->name }}
            </button>
          </h3>
          <div id="collapse{{ $category->id }}" class="accordion-collapse collapse show" data-bs-parent="#merchandiseAccordion">
            <div class="accordion-body p-1">
              <ul class="list-group list-group-flush">
                @foreach($categories as $subcategory)
                @if($subcategory->parent_id == $category->id)
                <li class="list-group-item list-group-item-action">{{ $subcategory->name }}</li>
                @endif
                @endforeach
              </ul>
            </div>
          </div>
        </div>
        @endif
        @endforeach
        
      </div>
    </div>

    <div class="col-9 row row-cols-1 row-cols-md-2 row-cols-xl-3 g-2 mt-0">

      @foreach($merchandises as $merchandise)
      <div class="col mt-0">
        <div class="card h-100 border-0">
          <div class="position-relative overflow-hidden shadow-sm rounded-3">
            <div class="merchandise-img-box">
              <img src="/{{ $merchandise->photo }}" class="card-img-top rounded-3 object-fit-cover h-100" alt="{{ $merchandise->name }}">
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

              <button type="button" class="border-start border-end border-secondary border-opacity-75 col-6 text-center p-0 addToCartBtn" title="點擊加入購物車" data-id="{{ $merchandise->id }}">
                <li class="py-1">
                  <i class="bi bi-plus-lg text-light"></i>
                  <i class="bi bi-cart-fill text-light"></i>
                  <span class="d-none">加入購物車</span>
                </li>
              </button>

              <a class="col text-center" href="/merchandise/{{ $merchandise->id }}/detail" title="點擊前往商品詳情">
                <li class="py-1">
                  <i class="bi bi-info-circle-fill text-light"></i>
                  <span class="d-none">商品詳情</span>
                </li>
              </a>
            </ul>
          </div>
          <div class="card-body text-center">
            <h3 class="card-title h4">{{ $merchandise->name }}</h3>
            <p class="price card-text fst-italic">
              <span class="sale fs-4 px-1">{{ number_format($merchandise->price, 2) }}</span>
              <span class=""><br/></span>
              {{-- <span class="text-decoration-line-through px-1">10000</span> --}}
            </p>
          </div>
        </div>
      </div>
      @endforeach

    </div>
  </div>
</article>

@section('js')
@if(session()->has('user'))
@include('component.cart')
@endif
@endsection

@endsection