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
        <div class="list-group-item-action fs-6 cat-1">
          <div class="d-flex align-items-center justify-content-between">
            <div class="px-4 py-1"><a href="#">種類一</a></div>
            <div class="px-2 py-1"><i class="bi bi-caret-right"></i></div>
          </div>
        </div>
        <div class="list-group-item-action fs-6 cat-2">
          <div class="d-flex align-items-center justify-content-between">
            <div class="px-4 py-1"><a href="#">種類二</a></div>
            <div class="px-2 py-1"><i class="bi bi-caret-right"></i></div>
          </div>
        </div>
        <div class="list-group-item-action fs-6 cat-3">
          <div class="d-flex align-items-center justify-content-between">
            <div class="px-4 py-1"><a href="#">種類三</a></div>
            <div class="px-2 py-1"><i class="bi bi-caret-right"></i></div>
          </div>
        </div>
        <div class="list-group-item-action fs-6 cat-4">
          <div class="d-flex align-items-center justify-content-between">
            <div class="px-4 py-1"><a href="#">種類四</a></div>
            <div class="px-2 py-1"><i class="bi bi-caret-right"></i></div>
          </div>
        </div>
        <div class="list-group-item-action fs-6 cat-5">
          <div class="d-flex align-items-center justify-content-between">
            <div class="px-4 py-1"><a href="#">種類五</a></div>
            <div class="px-2 py-1"><i class="bi bi-caret-right"></i></div>
          </div>
        </div>
        <div class="text-start">
          <div  class="bg-white position-absolute top-0 bottom-0 left-0 shadow p-4 z-2 d-none cat-1-ls bg-opacity-75 rounded-3 mt-5">
            <a href="#">12345</a><span class="px-1">/</span><a href="#">645456</a><span class="px-1">/</span><a href="#">56465464</a><span class="px-1">/</span><a href="#">86486</a><span class="px-1">/</span><a href="#">4684</a><span class="px-1">/</span><a href="#">4684</a><span class="px-1">/</span><a href="#">4684</a><span class="px-1">/</span>
          </div>
          <div  class="bg-white position-absolute top-0 bottom-0 left-0 shadow p-4 z-2 d-none cat-2-ls bg-opacity-75 rounded-3 mt-5">
            <a href="#">12345gfdgfd</a><span class="px-1">/</span><a href="#">645456</a><span class="px-1">/</span><a href="#">56465464</a><span class="px-1">/</span><a href="#">86486</a><span class="px-1">/</span><a href="#">4684</a><span class="px-1">/</span><a href="#">4684</a><span class="px-1">/</span><a href="#">4684</a><span class="px-1">/</span><a href="#">4684</a><span class="px-1">/</span><a href="#">4684</a><span class="px-1">/</span>
          </div>
          <div  class="bg-white position-absolute top-0 bottom-0 left-0 shadow p-4 z-2 d-none cat-3-ls bg-opacity-75 rounded-3 mt-5">
            <a href="#">12345gfdg</a><span class="px-1">/</span><a href="#">645456</a><span class="px-1">/</span><a href="#">56465464</a><span class="px-1">/</span><a href="#">86486</a><span class="px-1">/</span><a href="#">4684</a><span class="px-1">/</span><a href="#">4684</a><span class="px-1">/</span><a href="#">4684</a><span class="px-1">/</span><a href="#">4684</a><span class="px-1">/</span><a href="#">4684</a><span class="px-1">/</span><a href="#">4684</a><span class="px-1">/</span>
          </div>
          <div  class="bg-white position-absolute top-0 bottom-0 left-0 shadow p-4 z-2 d-none cat-4-ls bg-opacity-75 rounded-3 mt-5">
            <a href="#">12345fgfrrr</a><span class="px-1">/</span><a href="#">645456</a><span class="px-1">/</span><a href="#">56465464</a><span class="px-1">/</span><a href="#">86486</a><span class="px-1">/</span><a href="#">4684</a><span class="px-1">/</span>
          </div>
          <div  class="bg-white position-absolute top-0 bottom-0 left-0 shadow p-4 z-2 d-none cat-5-ls bg-opacity-75 rounded-3 mt-5">
            <a href="#">1234grfgfg5</a><span class="px-1">/</span><a href="#">645456</a><span class="px-1">/</span><a href="#">56465464</a><span class="px-1">/</span><a href="#">86486</a><span class="px-1">/</span><a href="#">4684</a><span class="px-1">/</span>
          </div>
        </div>
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
  <div class="row row-cols-2 row-cols-md-3 row-cols-xxl-6 g-2">
    <div class="col">
      <div class="card h-100 border-0">
        <div class="position-relative overflow-hidden">
          <img src="./images/product2.jpg" class="card-img-top rounded-3" alt="商品圖">
          <span class="position-absolute top-0 end-0 bg-primary px-3 py-1 m-1 rounded-pill text-light fw-bolder">sale</span>
          <!-- 收藏、加入購物車、連結詳情頁 -->
          <ul class="list-unstyled d-flex align-items-center justify-content-between position-absolute start-0 end-0 mt-3 ms-3 me-3 bg-dark bg-opacity-75 rounded-start-pill rounded-end-pill overflow-hidden">
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
            <a class="col text-center" href="./product-detail.html" title="點擊前往商品詳情">
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
            <span class="fs-4 p-2">500</span>
            <span class="d-lg-none"><br/></span>
            <span class="text-decoration-line-through p-2">10000</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 border-0">
        <div class="position-relative overflow-hidden">
          <img src="./images/product4.jpg" class="card-img-top rounded-3" alt="商品圖">
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
            <a class="col text-center" href="./product-detail.html" title="點擊前往商品詳情">
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
    <div class="col">
      <div class="card h-100 border-0">
        <div class="position-relative overflow-hidden">
          <img src="./images/product2.jpg" class="card-img-top rounded-3" alt="商品圖">
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
            <a class="col text-center" href="./product-detail.html" title="點擊前往商品詳情">
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
    <div class="col">
      <div class="card h-100 border-0">
        <div class="position-relative overflow-hidden">
          <img src="./images/product4.jpg" class="card-img-top rounded-3" alt="商品圖">
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
            <a class="col text-center" href="./product-detail.html" title="點擊前往商品詳情">
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
    <div class="col">
      <div class="card h-100 border-0">
        <div class="position-relative overflow-hidden">
          <img src="./images/product2.jpg" class="card-img-top rounded-3" alt="商品圖">
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
            <a class="col text-center" href="./product-detail.html" title="點擊前往商品詳情">
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
    <div class="col">
      <div class="card h-100 border-0">
        <div class="position-relative overflow-hidden">
          <img src="./images/product4.jpg" class="card-img-top rounded-3" alt="商品圖">
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
            <a class="col text-center" href="./product-detail.html" title="點擊前往商品詳情">
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
  </div>
</article>
<!-- new-product -->
<article id="new-product" class="mt-625">
  <div class="d-flex justify-content-between align-items-center py-3">
    <h2>
      <span class="border-start border-top ps-2 pt-1 border-3">最新商品</span>
    </h2>
    <span class="fs-5"><a href="#">看更多<i class="bi bi-arrow-right"></i></a></span>
  </div>
  <div class="row row-cols-2 row-cols-md-3 row-cols-xxl-4 g-2">
    <div class="col">
      <div class="card h-100 border-0">
        <div class="position-relative overflow-hidden">
          <img src="./images/product2.jpg" class="card-img-top rounded-3" alt="商品圖">
          <span class="position-absolute top-0 end-0 bg-primary px-3 py-1 m-1 rounded-pill text-light fw-bolder">sale</span>
          <!-- 收藏、加入購物車、連結詳情頁 -->
          <ul class="list-unstyled d-flex align-items-center justify-content-between position-absolute start-0 end-0 mt-3 ms-3 me-3 bg-dark bg-opacity-75 rounded-start-pill rounded-end-pill overflow-hidden">
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
            <a class="col text-center" href="./product-detail.html" title="點擊前往商品詳情">
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
            <span class="fs-4 p-2">500</span>
            <span class="d-lg-none"><br/></span>
            <span class="text-decoration-line-through p-2">10000</span>
          </p>
        </div>
      </div>
    </div>
    <div class="col">
      <div class="card h-100 border-0">
        <div class="position-relative overflow-hidden">
          <img src="./images/product4.jpg" class="card-img-top rounded-3" alt="商品圖">
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
            <a class="col text-center" href="./product-detail.html" title="點擊前往商品詳情">
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
    <div class="col">
      <div class="card h-100 border-0">
        <div class="position-relative overflow-hidden">
          <img src="./images/product2.jpg" class="card-img-top rounded-3" alt="商品圖">
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
            <a class="col text-center" href="./product-detail.html" title="點擊前往商品詳情">
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
    <div class="col">
      <div class="card h-100 border-0">
        <div class="position-relative overflow-hidden">
          <img src="./images/product4.jpg" class="card-img-top rounded-3" alt="商品圖">
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
            <a class="col text-center" href="./product-detail.html" title="點擊前往商品詳情">
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
    <div class="col">
      <div class="card h-100 border-0">
        <div class="position-relative overflow-hidden">
          <img src="./images/product2.jpg" class="card-img-top rounded-3" alt="商品圖">
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
            <a class="col text-center" href="./product-detail.html" title="點擊前往商品詳情">
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
    <div class="col">
      <div class="card h-100 border-0">
        <div class="position-relative overflow-hidden">
          <img src="./images/product4.jpg" class="card-img-top rounded-3" alt="商品圖">
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
            <a class="col text-center" href="./product-detail.html" title="點擊前往商品詳情">
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
  </div>
</article>

@endsection