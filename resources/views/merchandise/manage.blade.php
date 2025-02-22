@extends('layout.dashboard')

@section('title', $title)

@section('content')

@include('component.success')

<h1 class="mt-4 border-bottom border-3">{{ $page_title }}</h1>

<div class="my-3">
    <a class="btn btn-primary" href="/merchandise/create"><i class="bi bi-plus-lg me-1"></i>新增商品</a>
</div>
<div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td class="col-2">照片</td>
                <td class="col-4 col-md-5">品名</td>
                <td class="col-1 d-none d-md-table-cell">類別</td>
                <td class="col-2 col-md-1">狀態</td>
                <td class="col-2 col-md-1">庫存</td>
                <td class="col-2">功能</td>
            </tr>
        </thead>
        <tbody>
            @forelse($merchandises as $merchandise)
            <tr>
                <td>
                    @if($merchandise->photo)
                    <img class="img-thumbnail" src="/{{ $merchandise->photo }}" alt="{{ $merchandise->name }}">
                    @else
                    沒有照片
                    @endif
                </td>
                <td>
                    {{ $merchandise->name }}
                </td>
                <td class=" d-none d-md-table-cell">
                    {{ $merchandise->category_id }}
                </td>
                <td>
                    {{ $merchandise->status }}
                </td>
                <td>
                    {{ $merchandise->remain_count }}
                </td>
                <td>
                    <a href="/merchandise/{{ $merchandise->id }}/edit" class="btn btn-secondary py-1">
                        <i class="bi bi-pencil me-1"></i>
                        <span class="d-none d-xl-inline-block">
                            管理
                        </span>
                    </a>
                    <!-- 商品刪除 -->
                    <button type="button" class="btn btn-danger py-1" data-bs-toggle="modal" data-bs-target="#delMerchandise">
                        <i class="bi bi-trash me-1"></i>
                        <span class="d-none d-xl-inline-block">
                            刪除
                        </span>
                    </button>
                    <!-- 商品刪除確認 -->
                    <div class="modal fade" id="delMerchandise" tabindex="-1" aria-labelledby="delMerchandise" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <form action="/merchandise/{{ $merchandise->id }}/delete" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <div class="modal-body fs-3 text-center">
                                        刪除{{ $merchandise->name }}嗎？
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
            @empty
            <tr class="text-center">
                <td colspan="5">
                    沒有資料
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection