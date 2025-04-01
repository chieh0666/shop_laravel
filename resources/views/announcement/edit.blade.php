@extends('layout.dashboard')

@section('title', $title)

@section('content')

@include('component.success')

<div class="d-flex justify-content-between align-items-center border-bottom border-3 mt-4">
  <div class="fs-4">
    <a href="/announcement/manage"><i class="bi bi-chevron-left"></i>公告管理</a>
  </div>
  <h1>
    {{ $page_title }}
  </h1>
  <div class="fs-4">
    
  </div>
</div>

<div class="mt-3">
  <form action="/announcement/{{ $announcement->id }}/edit" method="POST">
      @csrf
      <div class="form-group row mb-2">
          <label for="is_active" class="col-sm-2 col-form-label">使用狀態</label>
          <div class="col-sm-10">
            <input type="radio" class="btn-check" name="is_active" id="active" value="1" @if($announcement->is_active == 1) checked @endif>
            <label class="btn btn-outline-success" for="active"><i class="bi bi-check-circle me-1"></i>使用</label>
            <input type="radio" class="btn-check" name="is_active" id="inactive" value="0" @if($announcement->is_active == 0) checked @endif>
            <label class="btn btn-outline-danger" for="inactive"><i class="bi bi-ban me-1"></i>不使用</label>
          </div>
      </div>
      <div class="form-group row mb-2">
          <label for="name" class="col-sm-2 col-form-label">標題</label>
          <div class="col-sm-10">
              <input type="text" class="form-control" id="title" name="title" placeholder="標題" value="{{ old('title', $announcement->title) }}">
          </div>
      </div>
      <div class="form-group row mb-2">
        <label for="name" class="col-sm-2 col-form-label">內容</label>
        <div class="col-sm-10">
          <textarea class="form-control" id="content" name="content" rows="5">{{ old('content', $announcement->content) }}</textarea>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <label for="start_date" class="col-sm-2 col-form-label">開始日期</label>
          <input type="date" name="start_date" id="start_date" class="form-control" placeholder="開始日期" value="{{ old('start_date', $announcement->start_date) }}">
        </div>
        <div class="col">
          <label for="end_date" class="col-sm-2 col-form-label">結束日期</label>
          <input type="date" name="end_date" id="end_date" class="form-control" placeholder="結束日期" value="{{ old('end_date', $announcement->end_date) }}">
        </div>
      </div>
      <button type="submit" class="btn btn-primary mt-2">儲存並更新</button>
  </form>
</div>

@endsection