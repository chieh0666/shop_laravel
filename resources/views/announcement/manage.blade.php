@extends('layout.dashboard')

@section('title', $title)

@section('content')

@include('component.success')

<h1 class="mt-4 border-bottom border-3">{{ $page_title }}</h1>

<div class="my-3">
    <a class="btn btn-primary" href="/announcement/create"><i class="bi bi-plus-lg me-1"></i>新增公告</a>
</div>

<table class="table table-striped table-hover">
  <thead>
      <tr>
          <td class="col-5">標題</td>
          <td class="col-1">使用狀態</td>
          <td class="col-2">開始日期</td>
          <td class="col-2">結束日期</td>
          <td class="col-2">功能</td>
      </tr>
  </thead>
  <tbody>
      @forelse($announcements as $announcement)
      <tr>
          <td>
            {{ $announcement->title }}
          </td>
          <td>
            @if( $announcement->is_active == 1 )
            <span class="fs-4 text-success">
              <i class="bi bi-check-circle"></i>
            </span>
            @endif
            @if( $announcement->is_active == 0 )
            <span class="fs-4 text-danger">
              <i class="bi bi-ban"></i>
            </span>
            @endif
          </td>
          <td>
            {{ date('m/d, Y', strtotime($announcement->start_date)) }}
          </td>
          <td>
            {{ date('m/d, Y', strtotime($announcement->end_date)) }}
          </td>
          <td>
            <a href="/announcement/{{ $announcement->id }}/edit" class="btn btn-secondary py-1">
              <i class="bi bi-pencil"></i>
              <span class="d-none d-xl-inline-block ms-1">
                管理
              </span>
            </a>
          </td>
      </tr>
      @empty
      <tr class="text-center">
          <td colspan="5">
              沒有資料
          </td>
      </tr>
      @endforelse
  </tbody>
</table>

@endsection