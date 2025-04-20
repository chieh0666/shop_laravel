@extends('layout.dashboard')

@section('title', $title)

@section('content')

@include('component.success')

<h1 class="mt-4 border-bottom border-3">{{ $page_title }}</h1>

<div class="my-3">
    <a class="btn btn-primary" href="#"><i class="bi bi-plus-lg me-1"></i>新增會員</a>
</div>

<div>
  <table class="table table-striped table-hover">
      <thead>
          <tr>
              <td class="col-4">使用者</td>
              <td class="col-4">電子郵件</td>
              <td class="col-4">帳號類型</td>
          </tr>
      </thead>
      <tbody>
          @forelse($users as $user)
          <tr>
              <td>
                @if($user->photo)
                <img src="/{{ $user->photo }}" alt="{{ $user->first_name }}" width="50" height="50">
                @else
                <img src="{{ asset('images/user/default_user_img.jpg') }}" alt="{{ $user->first_name }}" width="50" height="50">
                @endif
                {{ $user->photo }}
                {{ $user->last_name }} {{ $user->first_name }}
              </td>
              <td>
                {{ $user->email }}
              </td>
              <td>
                {{ $user->account_type }}
              </td>
          </tr>
          @empty
          <tr class="text-center">
              <td colspan="4">
                  沒有會員資料
              </td>
          </tr>
          @endforelse
      </tbody>
  </table>
</div>

@endsection