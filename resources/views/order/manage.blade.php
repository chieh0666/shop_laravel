@extends('layout.dashboard')

@section('title', $title)

@section('content')

@include('component.success')

<h1 class="mt-4 border-bottom border-3">{{ $page_title }}</h1>

<div class="my-3">
    <a class="btn btn-primary" href="#"><i class="bi bi-plus-lg me-1"></i>新增訂單</a>
</div>

<div class="row g-2">
  @foreach($orders as $order)
  <div class="col-md-6 col-12">
    <div class="card">
      <div class="card-header"><span><i class="bi bi-hash"></i></span>{{ $order->order_number }}</div>
      <div class="card-body">
        <h2 class="card-title h5">@foreach($users as $user) @if($order->user_id == $user->id) {{ $user->last_name }}{{ $user->first_name }} @endif @endforeach</h2>
        <h3 class="card-subtitle mb-2 text-body-secondary h6">{{ $order->order_status }}</h3>
        <ul class="list-group list-group-flush">
          @foreach($order_details as $order_detail)
          @if($order->id == $order_detail->order_id)
          <li class="list-group-item list-group-item-light d-flex justify-content-between align-items-center">
            <div>
              <span><i class="bi bi-dash"></i></span>
              @foreach($merchandises as $merchandise)
              @if($order_detail->merchandise_id == $merchandise->id)
                {{ $merchandise->name }}
              @endif
              @endforeach
            </div>
            <div>
              {{ number_format($order_detail->price, 0) }}
              <span><i class="bi bi-x"></i></span>
              {{ $order_detail->quantity }}
              <span class="mx-1">=</span>
              {{ number_format($order_detail->quantity*$order_detail->price, 0) }}
            </div>
          </li>
          @endif
          @endforeach
        </ul>
        <p class="card-text"><span>備註：</span>{{ $order->notes }}</p>
        <a href="#" class="card-link">詳細內容</a>
        <div class="text-end fw-bolder d-flex justify-content-between align-items-center mt-2">
          <div class="text-secondary">
            {{ $order->created_at->format('Y-m-d') }}
          </div>
          <div>
            <span>總計：</span>
            {{ number_format($order->total_amount, 0) }}
          </div>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>

@endsection