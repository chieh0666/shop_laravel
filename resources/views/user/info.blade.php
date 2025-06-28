@extends('layout.profile')

@section('title', $title)

@section('content')

<h2 class="h5 m-3">個人資訊</h2>

<div class="mx-3 my-2">
  <ul>
    <li>姓氏：{{ $user->last_name }}</li>
    <li>名字：{{ $user->first_name }}</li>
    <li>電子郵件：{{ $user->email }}</li>
    <li>電話：{{ $user->phone }}</li>
    <li>照片：{{ $user->photo }}</li>
    <li>性別：{{ $user->gender }}</li>
    <li>暱稱：{{ $user->nickname }}</li>
  </ul>
</div>
@endsection