@extends('layout.main')

@section('title', $title)

@section('main-content')
<div class="text-center">
  <h2 class="py-1875">
    <span class="border-start border-top ps-2 pt-1 border-3">{{ $pageTitle }}</span>
  </h2>
</div>
<!-- register form -->
<div class="mt-1875">
  <form action="/user/auth/signup" method="POST" novalidate>
    @csrf
    @include('component.errors')
    <div class="row justify-content-center">
      <div class="col-lg-3 col-md-6 mb-3">
        <label for="last_name" class="form-label">姓氏</label>
        <input type="text" class="form-control" name="last_name" id="last_name" placeholder="請輸入姓氏" value="{{ old('last_name') }}" required>
      </div>
      <div class="col-lg-3 col-md-6 col-12 mb-3">
        <label for="first_name" class="form-label">名字</label>
        <input type="text" class="form-control" name="first_name" id="first_name" placeholder="請輸入名字" value="{{ old('first_name') }}" required>
      </div>
      <div class="col-lg-3 col-md-6 col-12 mb-3">
        <label for="nickname" class="form-label">暱稱(選填)</label>
        <input type="text" class="form-control" name="nickname" id="nickname" placeholder="請輸入暱稱" value="{{ old('nickname') }}">
      </div>
      <div class="col-lg-3 col-md-6 col-12 mb-3">
        <label for="gender" class="form-label d-block">性別(選填)</label>
          <input type="radio" class="btn-check" name="gender" id="male" value="M">
          <label class="btn btn-outline-primary" for="male">男性</label>
          <input type="radio" class="btn-check" name="gender" id="female" value="F">
          <label class="btn btn-outline-danger" for="female">女性</label>
          <input type="radio" class="btn-check" name="gender" id="other" value="O">
          <label class="btn btn-outline-secondary" for="other">其他</label>
      </div>
      <div class="col-lg-6 col-12 mb-3">
        <label for="email" class="form-label">電子郵件地址</label>
        <input type="email" class="form-control" name="email" id="email" placeholder="請輸入電子郵件地址" value="{{ old('email') }}" required>
      </div>
      <div class="col-lg-3 col-md-6 col-12 mb-3">
        <label for="password" class="form-label">設定密碼</label>
        <input type="password" class="form-control" name="password" id="password" placeholder="請輸入密碼" required>
        <span id="password" class="form-text">
          必須8-20個字元長度。
        </span>
      </div>
      <div class="col-lg-3 col-md-6 col-12 mb-3">
        <label for="password_confirm" class="form-label">確認密碼</label>
        <input type="password" class="form-control" name="password_confirm" id="password_confirm" placeholder="請確認密碼" required>
      </div>
      <button type="submit" class="btn btn-primary col-3 mt-5">註冊</button>
    </div>
  </form>
</div>
@endsection