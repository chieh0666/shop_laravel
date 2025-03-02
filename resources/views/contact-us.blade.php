@extends('layout.main')

@section('main-content')

<!-- contacts us -->
<div class="text-center">
  <h2 class="py-1875">
    <span class="border-start border-top ps-2 pt-1 border-3">聯絡我們</span>
  </h2>
</div>

<!-- contact form -->
<article class="mt-1875">
  <div class="row">
    <div class="col-lg-6 col-md-12 p-2">
      <form action="#" method="POST">
        <div class="row g-3">
          <!-- 姓名 -->
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input type="text" class="form-control border-top-0 border-end-0 rounded-0 border-dark" id="for-name" placeholder="真實姓名" required="">
              <label class="text-primary" for="for-name">姓名</label>
            </div>
          </div>
          <!-- 電話 -->
          <div class="col-md-6">
            <div class="form-floating mb-3">
              <input type="tel" class="form-control border-top-0 border-end-0 rounded-0 border-dark" id="for-tel" placeholder="聯絡電話" required="">
              <label class="text-primary" for="for-tel">電話</label>
            </div>
          </div>
          <!-- 信箱 -->
          <div class="col-12">
            <div class="form-floating mb-3">
              <input type="email" class="form-control border-top-0 border-end-0 rounded-0 border-dark" id="for-email" placeholder="常用信箱" required="">
              <label class="text-primary" for="for-email">電子郵件</label>
            </div>
          </div>
          <!-- 留言 -->
          <div class="col-12">
            <div class="form-floating">
              <textarea class="form-control border-top-0 border-end-0 rounded-0 border-dark" placeholder="請在這裡留言" id="for-message"></textarea>
              <label class="text-primary" for="for-message">留言</label>
            </div>
          </div>
          <!-- 按鈕 -->
          <div class="col-12 text-center mt-3">
            <button class="btn btn-danger text-light px-4" type="reset">重填</button>
            <button class="btn btn-primary text-light px-4" type="submit">送出</button>
          </div>
        </div>
      </form>
    </div>
    <div class="col-lg-6 col-md-12 p-2">
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3672.3475575192415!2d120.19807799999998!3d23.0110076!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x346e765a2fc499f7%3A0x774930200ede55d8!2sChungnan!5e0!3m2!1sen!2stw!4v1738554665966!5m2!1sen!2stw" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade" class="rounded-2"></iframe>
    </div>
  </div>
</article>

@endsection