@extends('layout.dashboard')

@section('title', $title)

@section('content')

@include('component.success')

<div class="d-flex justify-content-between align-items-center border-bottom border-3 mt-4">
    <div class="fs-4">
        <a href="/news/manage"><i class="bi bi-chevron-left"></i>新聞管理</a>
    </div>
    <h1>
        {{ $page_title }}
    </h1>
    <div class="fs-4">
        
    </div>
</div>

<div class="mt-3">
    <form action="/news/{{ $news->id }}/edit" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group row mb-2">
          <label for="is_active" class="col-sm-2 col-form-label">使用狀態</label>
          <div class="col-sm-10">
            <input type="radio" class="btn-check" name="is_active" id="active" value="1" @if($news->is_active == 1) checked @endif>
            <label class="btn btn-outline-success" for="active"><i class="bi bi-check-circle me-1"></i>使用</label>
            <input type="radio" class="btn-check" name="is_active" id="inactive" value="0" @if($news->is_active == 0) checked @endif>
            <label class="btn btn-outline-danger" for="inactive"><i class="bi bi-ban me-1"></i>不使用</label>
          </div>
        </div>
        <div class="form-group row mb-2">
          <label for="image" class="col-sm-2 col-form-label">照片</label>
          <div class="col-sm-10">
              <input type="file" class="form-control" id="image" name="image">
              <img class="mt-1" src="/{{ $news->image }}" alt="{{ $news->image }}" width="200px">
          </div>
        </div>
        <div class="form-group row mb-2">
            <label for="title" class="col-sm-2 col-form-label">標題</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $news->title) }}">
            </div>
        </div>
        <div class="form-group row mb-2">
            <label for="content" class="col-sm-2 col-form-label">內容</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="content" name="content" rows="5">{{ old('content', $news->content) }}</textarea>
            </div>
        </div>
        <div class="form-group row mb-2">
            <label for="content" class="col-sm-2 col-form-label">連結</label>
            <div class="col-sm-10">
              <input class="form-control" type="text" value="{{ $news->link }}" aria-label="news-link" readonly>
            </div>
        </div>
        <div class="form-group row mb-2">
            <div class="col-sm-10 offset-sm-2">
              <button type="submit" class="btn btn-primary">儲存並更新</button>
            </div>
        </div>
    </form>
</div>

@endsection
