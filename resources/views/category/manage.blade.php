@extends('layout.dashboard')

@section('title', $title)

@section('content')

@include('component.success')

<h1 class="mt-4 border-bottom border-3">{{ $page_title }}</h1>

<div class="my-3">
    <a class="btn btn-primary" href="/category/create"><i class="bi bi-plus-lg"></i>&nbsp;新增類別</a>
</div>

<div class="row g-1">
    @foreach($categories as $category)
    <div class="col-md-4 col-12">
    @if($category->id >= 1 && $category->parent_id == 0)
    <ul class="list-group">
        <li class="list-group-item list-group-item-info d-flex justify-content-between align-items-center">
            <span class="fw-bolder"><i class="bi bi-caret-down-fill"></i>&nbsp;{{ $category->name }}({{ $category->where('parent_id', $category->id)->count() }})</span>
            <div>
                <a href="/category/{{ $category->id }}/edit" class="btn btn-secondary py-1">
                    <i class="bi bi-pencil"></i>
                    <span class="d-none d-xl-inline-block">
                        &nbsp;管理
                    </span>
                </a>
                <!-- 類別刪除 -->
                <button type="button" class="btn btn-danger py-1" data-bs-toggle="modal" data-bs-target="#delCategory{{ $category->id }}">
                    <i class="bi bi-trash"></i>
                    <span class="d-none d-xl-inline-block">
                        &nbsp;刪除
                    </span>
                </button>
                <!-- 類別刪除確認 -->
                <div class="modal fade" id="delCategory{{ $category->id }}" tabindex="-1" aria-labelledby="delCategory{{ $category->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="/category/{{ $category->id }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body fs-3 text-center">
                                    刪除{{ $category->name }}嗎？
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
        </li>
        @foreach($categories as $subcategory)
        @if($subcategory->parent_id == $category->id)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <i class="bi bi-arrow-return-right">&nbsp;{{ $subcategory->name }}</i>
            <div>
                <a href="/category/{{ $subcategory->id }}/edit" class="btn btn-secondary py-1">
                    <i class="bi bi-pencil"></i>
                    <span class="d-none d-xl-inline-block">
                        &nbsp;管理
                    </span>
                </a>
                <!-- 類別刪除 -->
                <button type="button" class="btn btn-danger py-1" data-bs-toggle="modal" data-bs-target="#delCategory{{ $subcategory->id }}">
                    <i class="bi bi-trash"></i>
                    <span class="d-none d-xl-inline-block">
                        &nbsp;刪除
                    </span>
                </button>
                <!-- 類別刪除確認 -->
                <div class="modal fade" id="delCategory{{ $subcategory->id }}" tabindex="-1" aria-labelledby="delCategory{{ $subcategory->id }}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <form action="/category/{{ $subcategory->id }}/delete" method="POST">
                                @csrf
                                @method('DELETE')
                                <div class="modal-body fs-3 text-center">
                                    刪除{{ $subcategory->name }}嗎？
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
        </li>
        @endif
        @endforeach
    </ul>
    @endif
    </div>
    @endforeach
</div>

@endsection