@extends('layout.main')

@section('title', $title)

@section('main-content')

<div class="text-center">
  <h2 class="py-1875">
    <span class="border-start border-top ps-2 pt-1 border-3">{{ $page_title }}</span>
  </h2>
</div>
<!-- signin form -->
<div class="mt-1875">
  <div class="col-lg-4 col-12 mx-auto">
    <form action="/user/auth/signin" method="POST" novalidate>
      @csrf
      @include('component.errors')
      <div class="input-group mb-3">
        <div class="form-floating">
          <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="請輸入電子郵件地址" required>
          <label for="email">電子郵件地址</label>
        </div>
      </div>
      <div class="input-group mb-3">
        <div class="form-floating">
          <input type="password" class="form-control" name="password" id="password" value="{{ old('password') }}" placeholder="請輸入密碼" required>
          <label for="password">密碼</label>
        </div>
      </div>
      <button type="submit" class="col-12 btn btn-primary mb-3">登入</button>
      <div>
        <a href="#" class="text-secondary">忘記密碼?</a>
      </div>
      <div>
        <a href="/user/auth/signup">建立帳戶</a>
      </div>
      <div class="position-relative">
        <hr/>
        <span class="position-absolute top-50 start-50 translate-middle px-2 bg-white">其他登入方式</span>
      </div>
      <div class="text-center">
        <a class="btn" href="/google/auth" role="button">
          <i class="bi bi-google text-secondary fs-3"></i>
        </a>
      </div>
    </form>
  </div>
</div>

@endsection