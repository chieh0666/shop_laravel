@extends('layout.main')

@section('main-content')

<div class="text-center">
  <h2 class="py-1875">
    <span class="border-start border-top ps-2 pt-1 border-3">促銷活動</span>
  </h2>
</div>
<article id="promotion" class="mt-1875">
  <div class="f-carousel" id="mainCarousel">
    <div class="f-carousel__slide px-1">
      <img class="rounded-3" src="./images/banner1.jpg" alt="...">
    </div>
    <div class="f-carousel__slide px-1">
      <img class="rounded-3" src="./images/banner2.jpg" alt="...">
    </div>
    <div class="f-carousel__slide px-1">
      <img class="rounded-3" src="./images/banner3.jpg" alt="...">
    </div>
    <div class="f-carousel__slide px-1">
      <img class="rounded-3" src="./images/banner1.jpg" alt="...">
    </div>
  </div>
</article>
<article id="product-sales" class="mt-1875">
  <div class="text-center">
    <h2 class="py-1875">
      <span class="border-start border-top ps-2 pt-1 border-3">促銷商品</span>
    </h2>
  </div>
  <div class="f-carousel" id="salesCarousel">
    <div class="f-carousel__slide">
      <a href="#">
        <div class="card">
          <img src="images/14.jpg" class="card-img-top" alt="促銷商品圖1">
          <div class="card-body">
            <h4 class="card-title h5 text-center">二手phone二手phone</h4>
            <p class="card-text">
              超值入手！二手 iPhone 12 等你帶回家！📱想要高性能手機但又不想花大錢？🚀 現在入手 二手 iPhone 12，超值優惠等你來搶！詳情請點閱
            </p>
          </div>
          <div class="card-footer text-center">
            <small class="text-muted">刊登時間:2024-11-11</small>
          </div>
        </div>
      </a>
    </div>
    <div class="f-carousel__slide">
      <a href="#">
        <div class="card">
          <img src="images/15.jpg" class="card-img-top" alt="促銷商品圖2">
          <div class="card-body">
            <h4 class="card-title h5 text-center">八成新上衣</h4>
            <p class="card-text">
              還在找CP值超高的時尚單品嗎？🌟 精選二手上衣，價格親民、風格百搭，讓你用小資價格穿出大牌感！詳情請點閱
            </p>
          </div>
          <div class="card-footer text-center">
            <small class="text-muted">刊登時間:2024-10-11</small>
          </div>
        </div>
      </a>
    </div>
    <div class="f-carousel__slide">
      <a href="#">
        <div class="card">
          <img src="images/16.jpg" class="card-img-top" alt="促銷商品圖3">
          <div class="card-body">
            <h4 class="card-title h5 text-center">二手家具椅子，舒適品質再升級</h4>
            <p class="card-text">
              正在找一張高CP值的椅子嗎？💡 精選二手椅子，價格超甜、品質依舊，為你的空間增添溫度與風格！詳情請點閱
            </p>
          </div>
          <div class="card-footer text-center">
            <small class="text-muted">刊登時間:2024-9-11</small>
          </div>
        </div>
      </a>
    </div>
    <div class="f-carousel__slide">
      <a href="#">
        <div class="card">
          <img src="images/17.jpg" class="card-img-top" alt="促銷商品圖4">
          <div class="card-body">
            <h4 class="card-title h5 text-center">switch</h4>
            <p class="card-text">
              功能正常，使用流暢，遊戲體驗滿分！
              ✅ 價格划算，比新品更省錢！<br>
              ✅ 多款主機 & 配件可選，立即開玩！詳情請點閱
            </p>
          </div>
          <div class="card-footer text-center">
            <small class="text-muted">刊登時間:2024-8-11</small>
          </div>
        </div>
      </a>
    </div>
  </div>
</article>
@include('component.sales-slide')
@include('component.banner-slide')
@endsection