@extends('layout.dashboard')

@section('title', $title)

@section('content')

@include('component.success')

<h1 class="mt-4 border-bottom border-3">{{ $page_title }}</h1>

<form action="/category/{{ $thisCategory->id }}/edit" method="POST" enctype="multipart/form-data">
  @csrf
  <div class="form-group row mb-2">
      <label for="name" class="col-sm-2 col-form-label">類別名稱</label>
      <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $thisCategory->name) }}">
      </div>
  </div>
  <div class="form-group row mb-2">
      <label for="category_parent_id" class="col-sm-2 col-form-label">分類</label>
      <div class="col-sm-10">
          <select class="form-select" id="category_parent_id" name="category_parent_id" @if($thisCategory->parent_id == 0 && $thisCategory->id ) disabled @endif>
              @foreach($categories as $category)
              @if($category->parent_id == 0)
              <option value="{{ $category->id }}" @if($thisCategory->parent_id == $category->id) selected @endif>{{ $category->name }}</option>
              @endif
              @endforeach
          </select>
      </div>
  </div>
  <div class="form-group row mb-2">
      <div class="col-sm-10 offset-sm-2">
          <button type="submit" class="btn btn-primary">儲存並更新</button>
      </div>
  </div>
</form>

@endsection