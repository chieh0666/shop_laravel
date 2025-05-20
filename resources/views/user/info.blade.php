@extends('layout.profile')

@section('title', $title)

@section('content')

<h2 class="h5 m-3">個人資訊</h2>

<div class="mx-3 my-2">
  {{ $user->last_name }}
  {{ $user->first_name }}
  {{ $user->email }}
  {{ $user->phone }}
  {{ $user->photo }}
  {{ $user->gender }}
  {{ $user->nickname }}
  加入日期：{{ $user->created_at }}
</div>
@endsection