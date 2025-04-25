@extends('layout.dashboard')

@section('title', $title)

@section('content')

@include('component.success')

<h1 class="mt-4 border-bottom border-3">{{ $page_title }}</h1>

<div class="my-3">
    <a class="btn btn-primary" href="/user/create"><i class="bi bi-plus-lg me-1"></i>新增使用者</a>
</div>

<div>
  <table class="table table-striped table-hover">
      <thead>
          <tr>
              <td class="col-3">使用者</td>
              <td class="col-4">電子郵件</td>
              <td class="col-4">帳號類型</td>
              <td class="col-1">功能</td>
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
                <span class="me-2">{{ $user->photo }}</span>
                <span>{{ $user->last_name }}&nbsp;{{ $user->first_name }}</span>
              </td>
              <td>
                {{ $user->email }}
              </td>
              <td>
                @if($user->account_type == 'A')
                <span><i class="bi bi-person-fill-check me-1"></i>網站管理員</span>
                @else
                <span><i class="bi bi-person-fill me-1"></i>客戶</span>
                @endif
              </td>
              <td>
                <div class="my-1">
                  <a href="/user/{{ $user->id }}/edit" class="btn btn-secondary">
                    <i class="bi bi-pencil"></i>
                    <span class="d-none d-xl-inline-block ms-1">
                      管理
                    </span>
                  </a>
                </div>
              </td>
          </tr>
          @empty
          <tr class="text-center">
              <td colspan="4">
                  沒有使用者資料
              </td>
          </tr>
          @endforelse
      </tbody>
  </table>
</div>

@endsection