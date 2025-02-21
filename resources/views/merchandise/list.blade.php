@extends('layout.main')

@section('main-content')

<!-- new product list -->
<div class="text-center">
  <h2 class="py-1875">
    <span class="border-start border-top ps-2 pt-1 border-3">所有商品</span>
  </h2>
</div>

<article id="merchandise" class="mt-1875">
  <div class="row align-items-top justify-content-center">
    <div class="d-none d-xxl-inline-block col-3">
      <div class="accordion sticky-top border border-5 border-white" id="merchandiseAccordion">

        <h3 class="fw-bolder py-2"><i class="bi bi-bookmarks"></i>商品分類</h3>

        @foreach($categories as $category)
        @if($category->id > 1 && $category->parent_id == 0 && $category->where('parent_id', $category->id)->count() > 0)
        <div class="accordion-item">
          <h3 class="accordion-header">
            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse{{ $category->id }}" aria-expanded="true" aria-controls="collapse{{ $category->id }}">
              {{ $category->name }}
            </button>
          </h3>
          <div id="collapse{{ $category->id }}" class="accordion-collapse collapse show" data-bs-parent="#merchandiseAccordion">
            <div class="accordion-body">
              <ul class="list-group list-group-flush ">
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
    <div  class="col-9 row row-cols-1 row-cols-md-2 row-cols-xl-3 g-2 mt-0">
      <div class="col mt-0">
        <div class="card h-100 border-0">
          <div class="position-relative overflow-hidden">
            <img src="/images/product4.jpg" class="card-img-top rounded-3" alt="商品圖">
            <span class="position-absolute top-0 end-0 bg-danger px-3 py-1 m-1 rounded-pill text-light fw-bold">HOT</span>
            <!-- 收藏、加入購物車、連結詳情頁 -->
            <ul class="list-unstyled d-flex align-items-center justify-content-between position-absolute start-0 end-0 mt -3 ms-3 me-3 bg-dark bg-opacity-75 rounded-start-pill rounded-end-pill overflow-hidden">
              <a class="col text-center" href="javascript:;" title="點擊加入喜歡清單">
                <li class="py-1">
                  <i class="bi bi-heart-fill text-light"></i>
                  <span class="d-none">加入喜歡清單</span>
                </li>
              </a>
              <a class="border-start border-end border-secondary border-opacity-75 col-6 text-center" href="javascript:;" title="點擊加入購物車">
                <li class="py-1">
                  <i class="bi bi-plus-lg text-light"></i>
                  <i class="bi bi-cart-fill text-light"></i>
                  <span class="d-none">加入購物車</span>
                </li>
              </a>
              <a class="col text-center" href="/product-detail.html" title="點擊前往商品詳情">
                <li class="py-1">
                  <i class="bi bi-info-circle-fill text-light"></i>
                  <span class="d-none">商品詳情</span>
                </li>
              </a>
            </ul>
          </div>
          <div class="card-body text-center">
            <h3 class="card-title h4">商品名稱</h3>
            <p class="price card-text fst-italic">
              <span class="sale fs-4 p-2">500</span>
              <span class="d-lg-none"><br/></span>
              <!-- <span class="text-decoration-line-through p-2">10000</span> -->
            </p>
          </div>
        </div>
      </div>
      <div class="col mt-0">
        <div class="card h-100 border-0">
          <div class="position-relative overflow-hidden">
            <img src="/images/product2.jpg" class="card-img-top rounded-3" alt="商品圖">
            <span class="position-absolute top-0 end-0 bg-danger px-3 py-1 m-1 rounded-pill text-light fw-bold">HOT</span>
            <!-- 收藏、加入購物車、連結詳情頁 -->
            <ul class="list-unstyled d-flex align-items-center justify-content-between position-absolute start-0 end-0 mt -3 ms-3 me-3 bg-dark bg-opacity-75 rounded-start-pill rounded-end-pill overflow-hidden">
              <a class="col text-center" href="javascript:;" title="點擊加入喜歡清單">
                <li class="py-1">
                  <i class="bi bi-heart-fill text-light"></i>
                  <span class="d-none">加入喜歡清單</span>
                </li>
              </a>
              <a class="border-start border-end border-secondary border-opacity-75 col-6 text-center" href="javascript:;" title="點擊加入購物車">
                <li class="py-1">
                  <i class="bi bi-plus-lg text-light"></i>
                  <i class="bi bi-cart-fill text-light"></i>
                  <span class="d-none">加入購物車</span>
                </li>
              </a>
              <a class="col text-center" href="/product-detail.html" title="點擊前往商品詳情">
                <li class="py-1">
                  <i class="bi bi-info-circle-fill text-light"></i>
                  <span class="d-none">商品詳情</span>
                </li>
              </a>
            </ul>
          </div>
          <div class="card-body text-center">
            <h3 class="card-title h4">商品名稱</h3>
            <p class="price card-text fst-italic">
              <span class="sale fs-4 p-2">500</span>
              <span class="d-lg-none"><br/></span>
              <!-- <span class="text-decoration-line-through p-2">10000</span> -->
            </p>
          </div>
        </div>
      </div>
      <div class="col mt-0">
        <div class="card h-100 border-0">
          <div class="position-relative overflow-hidden">
            <img src="/images/product4.jpg" class="card-img-top rounded-3" alt="商品圖">
            <span class="position-absolute top-0 end-0 bg-danger px-3 py-1 m-1 rounded-pill text-light fw-bold">HOT</span>
            <!-- 收藏、加入購物車、連結詳情頁 -->
            <ul class="list-unstyled d-flex align-items-center justify-content-between position-absolute start-0 end-0 mt -3 ms-3 me-3 bg-dark bg-opacity-75 rounded-start-pill rounded-end-pill overflow-hidden">
              <a class="col text-center" href="javascript:;" title="點擊加入喜歡清單">
                <li class="py-1">
                  <i class="bi bi-heart-fill text-light"></i>
                  <span class="d-none">加入喜歡清單</span>
                </li>
              </a>
              <a class="border-start border-end border-secondary border-opacity-75 col-6 text-center" href="javascript:;" title="點擊加入購物車">
                <li class="py-1">
                  <i class="bi bi-plus-lg text-light"></i>
                  <i class="bi bi-cart-fill text-light"></i>
                  <span class="d-none">加入購物車</span>
                </li>
              </a>
              <a class="col text-center" href="/product-detail.html" title="點擊前往商品詳情">
                <li class="py-1">
                  <i class="bi bi-info-circle-fill text-light"></i>
                  <span class="d-none">商品詳情</span>
                </li>
              </a>
            </ul>
          </div>
          <div class="card-body text-center">
            <h3 class="card-title h4">商品名稱</h3>
            <p class="price card-text fst-italic">
              <span class="sale fs-4 p-2">500</span>
              <span class="d-lg-none"><br/></span>
              <span class="text-decoration-line-through p-2">10000</span>
            </p>
          </div>
        </div>
      </div>
      <div class="col mt-0">
        <div class="card h-100 border-0">
          <div class="position-relative overflow-hidden">
            <img src="/images/product2.jpg" class="card-img-top rounded-3" alt="商品圖">
            <span class="position-absolute top-0 end-0 bg-danger px-3 py-1 m-1 rounded-pill text-light fw-bold">HOT</span>
            <!-- 收藏、加入購物車、連結詳情頁 -->
            <ul class="list-unstyled d-flex align-items-center justify-content-between position-absolute start-0 end-0 mt -3 ms-3 me-3 bg-dark bg-opacity-75 rounded-start-pill rounded-end-pill overflow-hidden">
              <a class="col text-center" href="javascript:;" title="點擊加入喜歡清單">
                <li class="py-1">
                  <i class="bi bi-heart-fill text-light"></i>
                  <span class="d-none">加入喜歡清單</span>
                </li>
              </a>
              <a class="border-start border-end border-secondary border-opacity-75 col-6 text-center" href="javascript:;" title="點擊加入購物車">
                <li class="py-1">
                  <i class="bi bi-plus-lg text-light"></i>
                  <i class="bi bi-cart-fill text-light"></i>
                  <span class="d-none">加入購物車</span>
                </li>
              </a>
              <a class="col text-center" href="/product-detail.html" title="點擊前往商品詳情">
                <li class="py-1">
                  <i class="bi bi-info-circle-fill text-light"></i>
                  <span class="d-none">商品詳情</span>
                </li>
              </a>
            </ul>
          </div>
          <div class="card-body text-center">
            <h3 class="card-title h4">商品名稱</h3>
            <p class="price card-text fst-italic">
              <span class="sale fs-4 p-2">500</span>
              <span class="d-lg-none"><br/></span>
              <!-- <span class="text-decoration-line-through p-2">10000</span> -->
            </p>
          </div>
        </div>
      </div>
      <div class="col mt-0">
        <div class="card h-100 border-0">
          <div class="position-relative overflow-hidden">
            <img src="/images/product4.jpg" class="card-img-top rounded-3" alt="商品圖">
            <span class="position-absolute top-0 end-0 bg-danger px-3 py-1 m-1 rounded-pill text-light fw-bold">HOT</span>
            <!-- 收藏、加入購物車、連結詳情頁 -->
            <ul class="list-unstyled d-flex align-items-center justify-content-between position-absolute start-0 end-0 mt -3 ms-3 me-3 bg-dark bg-opacity-75 rounded-start-pill rounded-end-pill overflow-hidden">
              <a class="col text-center" href="javascript:;" title="點擊加入喜歡清單">
                <li class="py-1">
                  <i class="bi bi-heart-fill text-light"></i>
                  <span class="d-none">加入喜歡清單</span>
                </li>
              </a>
              <a class="border-start border-end border-secondary border-opacity-75 col-6 text-center" href="javascript:;" title="點擊加入購物車">
                <li class="py-1">
                  <i class="bi bi-plus-lg text-light"></i>
                  <i class="bi bi-cart-fill text-light"></i>
                  <span class="d-none">加入購物車</span>
                </li>
              </a>
              <a class="col text-center" href="/product-detail.html" title="點擊前往商品詳情">
                <li class="py-1">
                  <i class="bi bi-info-circle-fill text-light"></i>
                  <span class="d-none">商品詳情</span>
                </li>
              </a>
            </ul>
          </div>
          <div class="card-body text-center">
            <h3 class="card-title h4">商品名稱</h3>
            <p class="price card-text fst-italic">
              <span class="sale fs-4 p-2">500</span>
              <span class="d-lg-none"><br/></span>
              <span class="text-decoration-line-through p-2">10000</span>
            </p>
          </div>
        </div>
      </div>
      <div class="col mt-0">
        <div class="card h-100 border-0">
          <div class="position-relative overflow-hidden">
            <img src="/images/product2.jpg" class="card-img-top rounded-3" alt="商品圖">
            <span class="position-absolute top-0 end-0 bg-danger px-3 py-1 m-1 rounded-pill text-light fw-bold">HOT</span>
            <!-- 收藏、加入購物車、連結詳情頁 -->
            <ul class="list-unstyled d-flex align-items-center justify-content-between position-absolute start-0 end-0 mt -3 ms-3 me-3 bg-dark bg-opacity-75 rounded-start-pill rounded-end-pill overflow-hidden">
              <a class="col text-center" href="javascript:;" title="點擊加入喜歡清單">
                <li class="py-1">
                  <i class="bi bi-heart-fill text-light"></i>
                  <span class="d-none">加入喜歡清單</span>
                </li>
              </a>
              <a class="border-start border-end border-secondary border-opacity-75 col-6 text-center" href="javascript:;" title="點擊加入購物車">
                <li class="py-1">
                  <i class="bi bi-plus-lg text-light"></i>
                  <i class="bi bi-cart-fill text-light"></i>
                  <span class="d-none">加入購物車</span>
                </li>
              </a>
              <a class="col text-center" href="/product-detail.html" title="點擊前往商品詳情">
                <li class="py-1">
                  <i class="bi bi-info-circle-fill text-light"></i>
                  <span class="d-none">商品詳情</span>
                </li>
              </a>
            </ul>
          </div>
          <div class="card-body text-center">
            <h3 class="card-title h4">商品名稱</h3>
            <p class="price card-text fst-italic">
              <span class="sale fs-4 p-2">500</span>
              <span class="d-lg-none"><br/></span>
              <!-- <span class="text-decoration-line-through p-2">10000</span> -->
            </p>
          </div>
        </div>
      </div>
      <div class="col mt-0">
        <div class="card h-100 border-0">
          <div class="position-relative overflow-hidden">
            <img src="/images/product4.jpg" class="card-img-top rounded-3" alt="商品圖">
            <span class="position-absolute top-0 end-0 bg-danger px-3 py-1 m-1 rounded-pill text-light fw-bold">HOT</span>
            <!-- 收藏、加入購物車、連結詳情頁 -->
            <ul class="list-unstyled d-flex align-items-center justify-content-between position-absolute start-0 end-0 mt -3 ms-3 me-3 bg-dark bg-opacity-75 rounded-start-pill rounded-end-pill overflow-hidden">
              <a class="col text-center" href="javascript:;" title="點擊加入喜歡清單">
                <li class="py-1">
                  <i class="bi bi-heart-fill text-light"></i>
                  <span class="d-none">加入喜歡清單</span>
                </li>
              </a>
              <a class="border-start border-end border-secondary border-opacity-75 col-6 text-center" href="javascript:;" title="點擊加入購物車">
                <li class="py-1">
                  <i class="bi bi-plus-lg text-light"></i>
                  <i class="bi bi-cart-fill text-light"></i>
                  <span class="d-none">加入購物車</span>
                </li>
              </a>
              <a class="col text-center" href="/product-detail.html" title="點擊前往商品詳情">
                <li class="py-1">
                  <i class="bi bi-info-circle-fill text-light"></i>
                  <span class="d-none">商品詳情</span>
                </li>
              </a>
            </ul>
          </div>
          <div class="card-body text-center">
            <h3 class="card-title h4">商品名稱</h3>
            <p class="price card-text fst-italic">
              <span class="sale fs-4 p-2">500</span>
              <span class="d-lg-none"><br/></span>
              <span class="text-decoration-line-through p-2">10000</span>
            </p>
          </div>
        </div>
      </div>
      <div class="col mt-0">
        <div class="card h-100 border-0">
          <div class="position-relative overflow-hidden">
            <img src="/images/product2.jpg" class="card-img-top rounded-3" alt="商品圖">
            <span class="position-absolute top-0 end-0 bg-danger px-3 py-1 m-1 rounded-pill text-light fw-bold">HOT</span>
            <!-- 收藏、加入購物車、連結詳情頁 -->
            <ul class="list-unstyled d-flex align-items-center justify-content-between position-absolute start-0 end-0 mt -3 ms-3 me-3 bg-dark bg-opacity-75 rounded-start-pill rounded-end-pill overflow-hidden">
              <a class="col text-center" href="javascript:;" title="點擊加入喜歡清單">
                <li class="py-1">
                  <i class="bi bi-heart-fill text-light"></i>
                  <span class="d-none">加入喜歡清單</span>
                </li>
              </a>
              <a class="border-start border-end border-secondary border-opacity-75 col-6 text-center" href="javascript:;" title="點擊加入購物車">
                <li class="py-1">
                  <i class="bi bi-plus-lg text-light"></i>
                  <i class="bi bi-cart-fill text-light"></i>
                  <span class="d-none">加入購物車</span>
                </li>
              </a>
              <a class="col text-center" href="/product-detail.html" title="點擊前往商品詳情">
                <li class="py-1">
                  <i class="bi bi-info-circle-fill text-light"></i>
                  <span class="d-none">商品詳情</span>
                </li>
              </a>
            </ul>
          </div>
          <div class="card-body text-center">
            <h3 class="card-title h4">商品名稱</h3>
            <p class="price card-text fst-italic">
              <span class="sale fs-4 p-2">500</span>
              <span class="d-lg-none"><br/></span>
              <!-- <span class="text-decoration-line-through p-2">10000</span> -->
            </p>
          </div>
        </div>
      </div>
      <div class="col mt-0">
        <div class="card h-100 border-0">
          <div class="position-relative overflow-hidden">
            <img src="/images/product4.jpg" class="card-img-top rounded-3" alt="商品圖">
            <span class="position-absolute top-0 end-0 bg-danger px-3 py-1 m-1 rounded-pill text-light fw-bold">HOT</span>
            <!-- 收藏、加入購物車、連結詳情頁 -->
            <ul class="list-unstyled d-flex align-items-center justify-content-between position-absolute start-0 end-0 mt -3 ms-3 me-3 bg-dark bg-opacity-75 rounded-start-pill rounded-end-pill overflow-hidden">
              <a class="col text-center" href="javascript:;" title="點擊加入喜歡清單">
                <li class="py-1">
                  <i class="bi bi-heart-fill text-light"></i>
                  <span class="d-none">加入喜歡清單</span>
                </li>
              </a>
              <a class="border-start border-end border-secondary border-opacity-75 col-6 text-center" href="javascript:;" title="點擊加入購物車">
                <li class="py-1">
                  <i class="bi bi-plus-lg text-light"></i>
                  <i class="bi bi-cart-fill text-light"></i>
                  <span class="d-none">加入購物車</span>
                </li>
              </a>
              <a class="col text-center" href="/product-detail.html" title="點擊前往商品詳情">
                <li class="py-1">
                  <i class="bi bi-info-circle-fill text-light"></i>
                  <span class="d-none">商品詳情</span>
                </li>
              </a>
            </ul>
          </div>
          <div class="card-body text-center">
            <h3 class="card-title h4">商品名稱</h3>
            <p class="price card-text fst-italic">
              <span class="sale fs-4 p-2">500</span>
              <span class="d-lg-none"><br/></span>
              <span class="text-decoration-line-through p-2">10000</span>
            </p>
          </div>
        </div>
      </div>
      <div class="col mt-0">
        <div class="card h-100 border-0">
          <div class="position-relative overflow-hidden">
            <img src="/images/product2.jpg" class="card-img-top rounded-3" alt="商品圖">
            <span class="position-absolute top-0 end-0 bg-danger px-3 py-1 m-1 rounded-pill text-light fw-bold">HOT</span>
            <!-- 收藏、加入購物車、連結詳情頁 -->
            <ul class="list-unstyled d-flex align-items-center justify-content-between position-absolute start-0 end-0 mt -3 ms-3 me-3 bg-dark bg-opacity-75 rounded-start-pill rounded-end-pill overflow-hidden">
              <a class="col text-center" href="javascript:;" title="點擊加入喜歡清單">
                <li class="py-1">
                  <i class="bi bi-heart-fill text-light"></i>
                  <span class="d-none">加入喜歡清單</span>
                </li>
              </a>
              <a class="border-start border-end border-secondary border-opacity-75 col-6 text-center" href="javascript:;" title="點擊加入購物車">
                <li class="py-1">
                  <i class="bi bi-plus-lg text-light"></i>
                  <i class="bi bi-cart-fill text-light"></i>
                  <span class="d-none">加入購物車</span>
                </li>
              </a>
              <a class="col text-center" href="/product-detail.html" title="點擊前往商品詳情">
                <li class="py-1">
                  <i class="bi bi-info-circle-fill text-light"></i>
                  <span class="d-none">商品詳情</span>
                </li>
              </a>
            </ul>
          </div>
          <div class="card-body text-center">
            <h3 class="card-title h4">商品名稱</h3>
            <p class="price card-text fst-italic">
              <span class="sale fs-4 p-2">500</span>
              <span class="d-lg-none"><br/></span>
              <!-- <span class="text-decoration-line-through p-2">10000</span> -->
            </p>
          </div>
        </div>
      </div>
      <div class="col mt-0">
        <div class="card h-100 border-0">
          <div class="position-relative overflow-hidden">
            <img src="/images/product4.jpg" class="card-img-top rounded-3" alt="商品圖">
            <span class="position-absolute top-0 end-0 bg-danger px-3 py-1 m-1 rounded-pill text-light fw-bold">HOT</span>
            <!-- 收藏、加入購物車、連結詳情頁 -->
            <ul class="list-unstyled d-flex align-items-center justify-content-between position-absolute start-0 end-0 mt -3 ms-3 me-3 bg-dark bg-opacity-75 rounded-start-pill rounded-end-pill overflow-hidden">
              <a class="col text-center" href="javascript:;" title="點擊加入喜歡清單">
                <li class="py-1">
                  <i class="bi bi-heart-fill text-light"></i>
                  <span class="d-none">加入喜歡清單</span>
                </li>
              </a>
              <a class="border-start border-end border-secondary border-opacity-75 col-6 text-center" href="javascript:;" title="點擊加入購物車">
                <li class="py-1">
                  <i class="bi bi-plus-lg text-light"></i>
                  <i class="bi bi-cart-fill text-light"></i>
                  <span class="d-none">加入購物車</span>
                </li>
              </a>
              <a class="col text-center" href="/product-detail.html" title="點擊前往商品詳情">
                <li class="py-1">
                  <i class="bi bi-info-circle-fill text-light"></i>
                  <span class="d-none">商品詳情</span>
                </li>
              </a>
            </ul>
          </div>
          <div class="card-body text-center">
            <h3 class="card-title h4">商品名稱</h3>
            <p class="price card-text fst-italic">
              <span class="sale fs-4 p-2">500</span>
              <span class="d-lg-none"><br/></span>
              <span class="text-decoration-line-through p-2">10000</span>
            </p>
          </div>
        </div>
      </div>
      <div class="col mt-0">
        <div class="card h-100 border-0">
          <div class="position-relative overflow-hidden">
            <img src="/images/product2.jpg" class="card-img-top rounded-3" alt="商品圖">
            <span class="position-absolute top-0 end-0 bg-danger px-3 py-1 m-1 rounded-pill text-light fw-bold">HOT</span>
            <!-- 收藏、加入購物車、連結詳情頁 -->
            <ul class="list-unstyled d-flex align-items-center justify-content-between position-absolute start-0 end-0 mt -3 ms-3 me-3 bg-dark bg-opacity-75 rounded-start-pill rounded-end-pill overflow-hidden">
              <a class="col text-center" href="javascript:;" title="點擊加入喜歡清單">
                <li class="py-1">
                  <i class="bi bi-heart-fill text-light"></i>
                  <span class="d-none">加入喜歡清單</span>
                </li>
              </a>
              <a class="border-start border-end border-secondary border-opacity-75 col-6 text-center" href="javascript:;" title="點擊加入購物車">
                <li class="py-1">
                  <i class="bi bi-plus-lg text-light"></i>
                  <i class="bi bi-cart-fill text-light"></i>
                  <span class="d-none">加入購物車</span>
                </li>
              </a>
              <a class="col text-center" href="/product-detail.html" title="點擊前往商品詳情">
                <li class="py-1">
                  <i class="bi bi-info-circle-fill text-light"></i>
                  <span class="d-none">商品詳情</span>
                </li>
              </a>
            </ul>
          </div>
          <div class="card-body text-center">
            <h3 class="card-title h4">商品名稱</h3>
            <p class="price card-text fst-italic">
              <span class="sale fs-4 p-2">500</span>
              <span class="d-lg-none"><br/></span>
              <!-- <span class="text-decoration-line-through p-2">10000</span> -->
            </p>
          </div>
        </div>
      </div>
    </div>

  </div>
</article>

@endsection