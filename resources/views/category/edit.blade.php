@extends('layout.dashboard')

@section('title', $title)

@section('content')

@include('component.success')

<div class="d-flex justify-content-between align-items-center border-bottom border-3 mt-4">
    <div class="fs-4">
        <a href="/category/manage"><i class="bi bi-chevron-left"></i>類別管理</a>
    </div>
    <h1>
        {{ $page_title }}
    </h1>
    <div class="fs-4">
        
    </div>
</div>

<div class="mt-3">
    <form action="/category/{{ $thisCategory->id }}/edit" method="POST">
        @csrf
        <div class="form-group row mb-2">
            <label for="name" class="col-sm-2 col-form-label">類別名稱</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $thisCategory->name) }}">
            </div>
        </div>
        <div class="form-group row mb-2">
            <label for="parent_id" class="col-sm-2 col-form-label">父分類</label>
            <div class="col-sm-10">
                <select class="form-select" id="parent_id" name="parent_id">
                    @foreach($categories as $category)
                    @if($category->parent_id == 0)
                    <option value="{{ $category->id }}" @if($category->id == $thisCategory->parent_id) selected @endif>{{ $category->name }}</option>
                    @endif
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group row mb-2">
            <label for="description" class="col-sm-2 col-form-label">描述</label>
            <div class="col-sm-10">
                <textarea class="form-control" id="description" name="description" rows="3">{{ old('description', $thisCategory->description) }}</textarea>
            </div>
        </div>
        <div class="form-group row mb-2">
            <div class="col-sm-10 offset-sm-2">
                <span>
                    <input type="checkbox" class="btn-check" id="to_parent_id" name="to_parent_id" value="0" autocomplete="off">
                    <label class="btn btn-outline-success" for="to_parent_id"><span class="border border-success rounded-1"><i class="bi bi-check-lg text-white me-1"></i></span>變更為父分類</label>
                </span>
                <button type="submit" class="btn btn-primary">儲存並更新</button>
            </div>
        </div>
    </form>
</div>

@endsection