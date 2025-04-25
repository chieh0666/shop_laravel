@extends('layout.dashboard')

@section('title', $title)

@section('content')

@include('component.success')

<div class="d-flex justify-content-between align-items-center border-bottom border-3 mt-4">
    <div class="fs-4">
        <a href="/user/manage"><i class="bi bi-chevron-left"></i>使用者管理</a>
    </div>
    <h1>
        {{ $page_title }}
    </h1>
    <div class="fs-4">
        
    </div>
</div>

<div class="mt-3">
    <form action="/user/{{ $user->id }}/edit" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row mb-2">
          <label for="photo" class="col-sm-2 col-form-label">照片</label>
          <div class="col-sm-10">
            @if($user->photo)
            <img src="/{{ $user->photo }}" alt="{{ $user->first_name }}" width="100px" height="100px">
            @else
            <img src="{{ asset('images/user/default_user_img.jpg') }}" alt="{{ $user->first_name }}" width="100px" height="100px">
            @endif
          </div>
        </div>
        <div class="form-group row mb-2">
            <label for="email" class="col-sm-2 col-form-label">電子郵件</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $user->email) }}">
            </div>
        </div>
        <div class="form-group row mb-2">
            <label for="last_name" class="col-sm-2 col-form-label">姓氏</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="last_name" name="last_name" value="{{ old('last_name', $user->last_name) }}">
            </div>
        </div>
        <div class="form-group row mb-2">
            <label for="first_name" class="col-sm-2 col-form-label">名字</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="first_name" name="first_name" value="{{ old('first_name', $user->first_name) }}">
            </div>
        </div>
        <div class="form-group row mb-2">
            <label for="nickname" class="col-sm-2 col-form-label">暱稱</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nickname" name="nickname" value="{{ old('nickname', $user->nickname) }}">
            </div>
        </div>
        <div class="form-group row mb-2">
            <label for="phone" class="col-sm-2 col-form-label">電話</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="phone" name="phone" value="{{ old('phone', $user->phone) }}">
            </div>
        </div>
        <div class="form-group row mb-2">
          <label for="gender" class="col-sm-2 col-form-label">性別</label>
          <div class="col-sm-10">
            <input type="radio" class="btn-check" name="gender" id="male" value="M" @if($user->gender == 'M') checked @endif>
            <label class="btn btn-outline-primary" for="male">男性</label>
            <input type="radio" class="btn-check" name="gender" id="female" value="F" @if($user->gender == 'F') checked @endif>
            <label class="btn btn-outline-danger" for="female">女性</label>
            <input type="radio" class="btn-check" name="gender" id="other" value="O" @if($user->gender == 'O') checked @endif>
            <label class="btn btn-outline-secondary" for="other">其他</label>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label for="account_type" class="col-sm-2 col-form-label">帳號類型</label>
          <div class="col-sm-10">
              <select class="form-select" id="account_type" name="account_type">
                <option value="U" @if($user->account_type == 'U') selected @endif>客戶</option>
                <option value="A" @if($user->account_type == 'A') selected @endif>網站管理員</option>
              </select>
          </div>
        </div>
        <div class="form-group row mb-2">
            <label for="password" class="col-sm-2 col-form-label">新密碼</label>
            <div class="col-sm-10">
              <button class="btn btn-outline-primary" type="button" data-bs-toggle="collapse" data-bs-target="#collapsePassword" aria-expanded="false" aria-controls="collapsePassword">
                設定新密碼
              </button>
              <div class="collapse" id="collapsePassword">
                <div class="card card-body border-0 ps-0">
                  <input type="text" class="form-control" id="password" name="password" placeholder="請輸入新密碼(8-20碼)" minlength="8" maxlength="20">
                </div>
              </div>
            </div>
        </div>
        <div class="form-group row mb-2">
            <label for="created_at" class="col-sm-2 col-form-label">帳號始於</label>
            <div class="col-sm-10">
              <input type="text" readonly class="form-control-plaintext" id="created_at" value="{{ $user->created_at->format('Y/m/d') }}">
            </div>
        </div>
        <div class="form-group row mb-2">
            <div class="col-sm-10 offset-sm-2">
              <button type="submit" class="btn btn-primary">儲存並更新</button>
              <!-- 使用者刪除按鈕 -->
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delUser">
                <span>
                  <i class="bi bi-trash-fill"></i>
                  刪除此使用者
                </span>
              </button>
            </div>
        </div>
    </form>
    <!-- 使用者刪除確認 -->
    <div class="modal fade" id="delUser" tabindex="-1" aria-labelledby="delUser" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
          <div class="modal-content">
              <form action="/user/{{ $user->id }}/delete" method="POST">
                  @csrf
                  @method('DELETE')
                  <div class="modal-body fs-3 text-center">
                      刪除[{{ $user->last_name }}&nbsp;{{ $user->first_name }}]使用者嗎？
                  </div>
                  <div class="modal-footer border-0">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">取消</button>
                      <button type="submit" class="btn btn-danger">刪除</button>
                  </div>
              </form>
          </div>
      </div>
    </div>
</div>

@endsection
