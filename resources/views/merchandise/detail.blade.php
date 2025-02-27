@extends('layout.main')

@section('title', $title)

@section('main-content')

<!-- merchandise detail -->
<article id="merchandise-detail-page" class="py-1875">
  <nav aria-label="breadcrumb" class="p-125">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">首頁</a></li>
      <li class="breadcrumb-item"><a href="#">{{ $thisMerchandiseOfRootCat->name }}</a></li>
      <li class="breadcrumb-item"><a href="#">{{ $thisMerchandiseOfCat->name }}</a></li>
      <li class="breadcrumb-item active" aria-current="page">{{ $thisMerchandise->name }}</li>
    </ol>
  </nav>
  <!-- 內容 -->
  <div class="px-4 px-lg-5">
    <div class="row gx-4 gx-lg-5 align-items-center">
      <div class="col-md-6">
        <img class="card-img-top mb-5 mb-md-0" src="/{{ $thisMerchandise->photo }}" alt="商品圖" /> <!-- 600*700 -->
      </div>
      <div class="col-md-6">
        <div class="small mb-1">SKU: {{ $thisMerchandiseOfRootCat->id }}{{ $thisMerchandiseOfCat->id }}{{ $thisMerchandise->id }}</div>
        <h1 class="display-5 fw-bolder">{{ $thisMerchandise->name }}</h1>
        <div class="fs-5 mb-5">
          {{-- <span class="text-decoration-line-through">$45.00</span> --}}
          <span>${{ number_format($thisMerchandise->price, 0) }}</span>
        </div>
        <p class="lead">{{ $thisMerchandise->introduction }}</p>
        <form action="#" method="POST">
          <div class="row g-3">
            {{-- <div class="col-md-5 col-lg-4">
              <label class="form-label fw-bolder">規格</label>
              <select class="form-select border-0 border-bottom rounded-0 border-secondary-subtle bg-transparent" aria-label="select-list">
                <option disabled selected>請選擇</option>
                <option value="1">A1</option>
                <option value="2">A2</option>
                <option value="3">A3</option>
              </select>
            </div> --}}
            <div class="col-md-4 col-lg-2">
              @if($thisMerchandise->remain_count === 0)
              <label class="form-label fw-bolder text-danger">已售完</label>
              @else
              <label class="form-label fw-bolder">數量</label>
              <select class="form-select border-0 border-bottom rounded-0 border-secondary-subtle bg-transparent" aria-label="select-list">
                @for($i = 1; $i <= $thisMerchandise->remain_count; $i++)
                <option value="{{ $i }}">{{ $i }}</option>
                @endfor
              </select>
              @endif
            </div>
            <div class="row g-5">
              <button class="btn btn-success text-light col-md-5 col-lg-4 m-2 @if($thisMerchandise->remain_count === 0) disabled @endif" type="button">
                <i class="bi bi-plus-lg"></i><i class="bi-cart me-1"></i>
                加入購物車
              </button>
              <button class="btn btn-primary text-light col-md-5 col-lg-4 m-2 @if($thisMerchandise->remain_count === 0) disabled @endif" type="button">
                <i class="bi bi-bag"></i>
                立即購買
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</article>

@endsection