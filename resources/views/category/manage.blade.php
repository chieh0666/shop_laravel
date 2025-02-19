@extends('layout.dashboard')

@section('title', $title)

@section('content')

@include('component.success')

<h1 class="mt-4 border-bottom border-3">{{ $page_title }}</h1>

<div class="my-3">
    <a class="btn btn-primary" href="/category/create"><i class="bi bi-plus-lg"></i>&nbsp;新增類別</a>
</div>
<div>
    <table class="table table-striped table-hover table-sm">
        <thead>
            <tr>
                <td class="col-4">類別名稱</td>
                <td class="col-3">分類</td>
                <td class="col-3">父分類</td>
                <td class="col-2">功能</td>
            </tr>
        </thead>
        <tbody>
        @foreach($categories as $category)
        <tr>
            <td>{{ $category->name }}</td>
            <td>{{ $category->id }}</td>
            <td>{{ $category->parent_id }}</td>
            <td>
                <a href="/category/{{ $category->id }}/edit" class="btn btn-secondary py-1">
                    <i class="bi bi-pencil"></i>&nbsp;
                    <span class="d-none d-xl-inline-block">
                        管理
                    </span>
                </a>
                <!-- 類別刪除 -->
                <button type="button" class="btn btn-danger py-1" data-bs-toggle="modal" data-bs-target="#delCategory">
                    <i class="bi bi-trash"></i>&nbsp;
                    <span class="d-none d-xl-inline-block">
                        刪除
                    </span>
                </button>
                <!-- 類別刪除確認 -->
                <div class="modal fade" id="delCategory" tabindex="-1" aria-labelledby="delCategory" aria-hidden="true">
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
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>

@endsection