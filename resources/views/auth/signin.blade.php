@extends('layout.main')

@section('title', $title)

@section('main-content')
<div class="text-center">
  <h2 class="py-1875">
    <span class="border-start border-top ps-2 pt-1 border-3">{{ $pageTitle }}</span>
  </h2>
</div>
<!-- signin form -->
<div class="mt-1875">
  <div class="col-12 d-flex justify-content-center align-items-center">
    <form action="#" method="POST" novalidate>
      <div class="input-group has-validation mb-3">
        <div class="form-floating is-invalid">
          <input type="text" class="form-control is-invalid" name="account" id="account" placeholder="請輸入電子郵件地址" required>
          <label for="account">電子郵件地址</label>
        </div>
        <div class="invalid-feedback">
          沒有註冊資料。
        </div>
      </div>
      <div class="input-group has-validation mb-3">
        <div class="form-floating is-invalid">
          <input type="text" class="form-control is-invalid" name="password" id="password" placeholder="請輸入密碼" required>
          <label for="password">密碼</label>
        </div>
        <div class="invalid-feedback">
          密碼錯誤，必須8-20個字元長度。
        </div>
      </div>
      <div class="form-check mb-3">
        <input class="form-check-input " type="checkbox" name="rememberMe" id="rememberMe">
        <label class="form-check-label" for="rememberMe">
          保持登入
        </label>
      </div>
      <button type="submit" class="col-12 btn btn-primary mb-3">登入</button>
      <div>
        <a href="#" class="text-secondary">忘記密碼?</a>
      </div>
      <div>
        <a href="/user/auth/signup" class="text-916953">建立帳戶</a>
      </div>
    </form>
  </div>
</div>
@endsection