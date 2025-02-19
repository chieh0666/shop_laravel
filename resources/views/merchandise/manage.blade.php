@extends('layout.dashboard')

@section('title', $title)

@section('content')

<h1 class="mt-4 border-bottom border-3">{{ $page_title }}</h1>
<div class="my-3">
    <a class="btn btn-primary" href="/merchandise/create">新增商品</a>
</div>
<div>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <td class="col-3">照片</td>
                <td class="col-5">品名</td>
                <td class="col-1">狀態</td>
                <td class="col-1">庫存</td>
                <td class="col-2">功能</td>
            </tr>
        </thead>
        <tbody>
            @foreach($merchandises as $merchandise)
            <tr>
                <td><img src="/{{ $merchandise->photo }}" alt="{{ $merchandise->name }}" height="50px"></td>
                <td>{{ $merchandise->name }}</td>
                <td>{{ $merchandise->status }}</td>
                <td>{{ $merchandise->remain_count }}</td>
                <td>
                    <a href="/merchandise/{{ $merchandise->id }}/edit" class="btn btn-secondary">管理</a>
                    <a href="" class="btn btn-danger">刪除</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection