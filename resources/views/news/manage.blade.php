@extends('layout.dashboard')

@section('title', $title)

@section('content')

@include('component.success')

<h1 class="mt-4 border-bottom border-3">{{ $page_title }}</h1>

<div class="my-3">
    <a class="btn btn-primary" href="/news/create"><i class="bi bi-plus-lg me-1"></i>新增新聞</a>
</div>

<table class="table table-striped table-hover">
  <thead>
      <tr>
          <td class="col-5">標題</td>
          <td class="col-5">使用狀態</td>
          <td class="col-2">功能</td>
      </tr>
  </thead>
  <tbody>
      @forelse($newses as $news)
      <tr>
          <td>
            {{ $news->title }}
          </td>
          <td>
            @if( $news->is_active == 1 )
            <div class="fs-4 text-success">
              <i class="bi bi-check-circle"></i>
            </div>
            @endif

            @if( $news->is_active == 0 )
            <div class="fs-4 text-danger">
              <i class="bi bi-ban"></i>
            </div>
            @endif
          </td>
          <td>
            <div class="my-1">
              <a href="/news/{{ $news->id }}/edit" class="btn btn-secondary">
                <i class="bi bi-pencil"></i>
                <span class="d-none d-xl-inline-block ms-1">
                  管理
                </span>
              </a>
            </div>
            <div class="my-1">
              <!-- 新聞刪除按鈕 -->
              <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#delNews{{ $news->id }}">
                <i class="bi bi-trash"></i>
                <span class="d-none d-xl-inline-block ms-1">
                    刪除
                </span>
              </button>
              <!-- 新聞刪除確認 -->
              <div class="modal fade" id="delNews{{ $news->id }}" tabindex="-1" aria-labelledby="delNews" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                      <div class="modal-content">
                          <form action="/news/{{ $news->id }}/delete" method="POST">
                              @csrf
                              @method('DELETE')
                              <div class="modal-body fs-3 text-center">
                                  刪除[{{ $news->title }}]嗎？
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
          </td>
      </tr>
      @empty
      <tr class="text-center">
          <td colspan="3">
              沒有資料
          </td>
      </tr>
      @endforelse
  </tbody>
</table>

@endsection