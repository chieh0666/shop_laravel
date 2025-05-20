@extends('layout.main')

@section('title', $title)

@section('main-content')

<div class="text-center">
  <h2 class="py-1875">
    <span class="border-start border-top ps-2 pt-1 border-3">{{ $page_title }}</span>
  </h2>
</div>

<article id="profile" class="mt-1875">
  <div class="row g-3">
    <div class="col-md-3 col-12 mx-auto">
      <div class="list-group">
        <a href="/user/profile" class="list-group-item list-group-item-action" title="個人資訊">個人資訊</a>
        <a href="#" class="list-group-item list-group-item-action">???</a>
        <a href="/user/auth/signout" class="list-group-item list-group-item-action" title="使用者登出">登出</a>
      </div>
    </div>
    <div class="col-md-7 col-12 mx-auto shadow-sm rounded-3">
      @yield('content')
    </div>
  </div>
</article>

@endsection
