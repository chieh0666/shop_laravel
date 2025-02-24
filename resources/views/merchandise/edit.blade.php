@extends('layout.dashboard')

@section('title', $title)

@section('content')

@include('component.success')

<h1 class="mt-4 border-bottom border-3">{{ $page_title }}</h1>

<form action="/merchandise/{{ $merchandise->id }}/edit" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group row mb-2">
      <label for="category_id" class="col-sm-2 col-form-label">類別</label>
      <div class="col-sm-10">
          <select class="form-select" id="category_id" name="category_id">
              @foreach($categories as $category)
              @if($category->parent_id !== 0)
              <option value="{{ $category->id }}" @if($merchandise->category_id == $category->id) selected @endif>{{ $category->name }}</option>              
              @endif
              @endforeach
          </select>
      </div>
  </div>
  <div class="form-group row mb-2">
      <label for="status" class="col-sm-2 col-form-label">狀態</label>
      <div class="col-sm-10">
          <select class="form-select" id="status" name="status">
              <option value="C" @if(old('status', $merchandise->status) == 'c') selected @endif>建立中</option>
              <option value="S" @if(old('status', $merchandise->status) == 'S') selected @endif>可販售</option>
          </select>
      </div>
  </div>
  <div class="form-group row mb-2">
      <label for="name" class="col-sm-2 col-form-label">名稱</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $merchandise->name) }}">
      </div>
  </div>
  <div class="form-group row mb-2">
      <label for="name_en" class="col-sm-2 col-form-label">英文名稱</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" id="name_en" name="name_en" value="{{ old('name', $merchandise->name_en) }}">
      </div>
  </div>
  <div class="form-group row mb-2">
      <label for="introduction" class="col-sm-2 col-form-label">介紹</label>
      <div class="col-sm-10">
          <textarea class="form-control" id="introduction" name="introduction" rows="3">{{ old('name', $merchandise->introduction) }}</textarea>
      </div>
  </div>
  <div class="form-group row mb-2">
      <label for="introduction_en" class="col-sm-2 col-form-label">英文介紹</label>
      <div class="col-sm-10">
          <textarea class="form-control" id="introduction_en" name="introduction_en" rows="3">{{ old('name', $merchandise->introduction_en) }}</textarea>
      </div>
  </div>
  <div class="form-group row mb-2">
      <label for="photo" class="col-sm-2 col-form-label">照片</label>
      <div class="col-sm-10">
        <input type="file" class="form-control" id="photo" name="photo">
        <img class="mt-1" src="/{{ $merchandise->photo }}" alt="{{ $merchandise->name }}" width="200px">
      </div>
  </div>
  <div class="form-group row mb-2">
      <label for="price" class="col-sm-2 col-form-label">價格</label>
      <div class="col-sm-10">
          <input type="number" class="form-control" id="price" name="price" value="{{ old('name', $merchandise->price) }}">
      </div>
  </div>
  <div class="form-group row mb-2">
      <label for="remain_count" class="col-sm-2 col-form-label">剩餘數量</label>
      <div class="col-sm-10">
          <input type="number" class="form-control" id="remain_count" name="remain_count" value="{{ old('name', $merchandise->remain_count) }}">
      </div>
  </div>
  <div class="form-group row mb-2">
      <div class="col-sm-10 offset-sm-2">
          <button type="submit" class="btn btn-primary">儲存並更新</button>
      </div>
  </div>
</form>

@endsection