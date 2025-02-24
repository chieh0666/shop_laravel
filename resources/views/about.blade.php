@extends('layout.main')

@section('main-content')

<div class="text-center">
  <h2 class="py-1875">
    <span class="border-start border-top ps-2 pt-1 border-3">關於我們</span>
  </h2>
</div>
<!-- about-1 -->
<article class="mt-1875">
  <div class="row">
    <div class="col-lg-7 col-md-12 p-2">
      <img class="rounded-2" src="./images/about1.jpg" alt="這裡要關於我們的相關文字">
    </div>
    <div class="col-lg-5 col-md-12 p-2">
      <h3 class="fw-bolder mb-4">各式各樣的二手商品陳列其中，營造出溫馨舒適的購物氛圍！</h3>
      <p class="fs-5 lh-base">「我們是一家致力於推廣永續生活理念的二手商鋪。我們相信，每一件物品都承載著獨特的故事和價值，值得被再次珍惜。在這裡，您不僅能找到各式各樣保存良好的二手商品，更能體驗到尋寶的樂趣，為您的生活增添一份環保與風格。我們嚴選每一件商品，確保品質與清潔，讓您安心選購，共同為地球盡一份心力。」</p>
    </div>
  </div>
</article>
<!-- about-2 -->
<article class="mt-1875">
  <div class="row">
    <div class="col-lg-5 col-md-12 p-2 order-2 order-lg-1">
      <h3 class="fw-bolder mb-4">展現團隊的專業形象和熱情服務，增加顧客的信任感！</h3>
      <p class="fs-5 lh-base">「我們的團隊由一群對二手商品充滿熱情的夥伴組成。我們深入了解每一件商品的背景，並以專業知識提供顧客最完善的服務。無論您是尋找獨特的復古家具、時尚服飾，或是經典的收藏品，我們都能為您提供專業的建議和協助。我們重視每一位顧客的感受，致力於打造一個溫馨舒適的購物環境，讓您享受愉快的購物體驗。」</p>
    </div>
    <div class="col-lg-7 col-md-12 p-2 order-1 order-lg-2">
      <img class="rounded-2" src="./images/about2.jpg" alt="這裡要關於我們的相關文字">
    </div>
  </div>
</article>

@endsection