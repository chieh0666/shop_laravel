@extends('layout.dashboard')

@section('title', $title)

@section('content')

@include('component.success')

<h1 class="mt-4 border-bottom border-3">{{ $page_title }}</h1>

<div class="my-3">
    <a class="btn btn-primary" href="#"><i class="bi bi-plus-lg me-1"></i>新增訂單</a>
</div>

<div>
  <table class="table table-striped table-hover">
      <thead>
          <tr>
              <td class="col-2">訂單</td>
              <td class="col-2">日期</td>
              <td class="col-2">狀態</td>
              <td class="col-3 d-none d-lg-table-cell">運送至</td>
              <td class="col-1 d-none d-lg-table-cell">總計</td>
              <td class="col-2">功能</td>
          </tr>
      </thead>
      <tbody>
          @forelse($orders as $order)
          <tr>
              <td>
                <a href="/order/{{ $order->id }}/edit">
                  <div>#{{ $order->order_number }}</div>
                  <div>@foreach($users as $user) @if($order->user_id == $user->id) {{ $user->last_name }}&nbsp;{{ $user->first_name }} @endif @endforeach</div>
                </a>
              </td>
              <td>
                {{ $order->created_at->format('m/d, Y') }}
              </td>
              <td>
                @if($order->order_status == 'pending') <span class="badge text-bg-primary">待確認</span> @endif
                @if($order->order_status == 'processing') <span class="badge text-bg-warning">處理中</span> @endif
                @if($order->order_status == 'completed') <span class="badge text-bg-success">已完成</span> @endif
                @if($order->order_status == 'cancelled') <span class="badge text-bg-secondary">已取消</span> @endif
              </td>
              <td class="d-none d-lg-table-cell">
                <div>{{ $order->shipping_address }}</div>
                <div class="text-secondary">{{ $order->shipping_method }}</div>
              </td>
              <td class="d-none d-lg-table-cell">
                  ${{ number_format($order->total_amount, 0) }}
              </td>
              <td>
                <a href="#">列印收據</a>
              </td>
          </tr>
          @empty
          <tr class="text-center">
              <td colspan="6">
                  沒有訂單
              </td>
          </tr>
          @endforelse
      </tbody>
  </table>
</div>

@endsection