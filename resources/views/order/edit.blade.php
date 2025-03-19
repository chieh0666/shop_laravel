@extends('layout.dashboard')

@section('title', $title)

@section('content')

@include('component.success')

<h1 class="mt-4 border-bottom border-3">{{ $page_title }}</h1>

<form action="/order/{{ $order->id }}/edit" method="POST">
  @csrf
  <div class="mt-4 card">
    <div class="card-header bg-light text-center">
        <h1 class="mb-0 h2">{{ $user->last_name }}{{ $user->first_name }}</h1>
    </div>
    <div class="card-body">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th scope="row" class="w-25 bg-secondary bg-gradient bg-opacity-10">訂單編號</th>
                    <td>{{ $order->order_number }}</td>
                </tr>
                <tr>
                    <th scope="row" class="w-25 bg-secondary bg-gradient bg-opacity-10">訂單日期</th>
                    <td>{{ $order->created_at->format('Y/m/d') }}</td>
                </tr>
                <tr>
                    <th scope="row" class="w-25 bg-secondary bg-gradient bg-opacity-10">送貨地址</th>
                    <td>{{ $order->shipping_address }}</td>
                </tr>
                <tr>
                    <th scope="row" class="w-25 bg-secondary bg-gradient bg-opacity-10">付款方式</th>
                    <td>{{ $order->payment_method }}</td>
                </tr>
                <tr>
                    <th scope="row" class="w-25 bg-secondary bg-gradient bg-opacity-10">付款狀態</th>
                    <td>
                      <select name="payment_status" class="form-select">
                        <option value="unpaid" @if($order->payment_status == 'unpaid') selected @endif>未付款</option>
                        <option value="no_payment_requested" @if($order->payment_status == 'no_payment_requested') selected @endif>未請款</option>
                        <option value="paid" @if($order->payment_status == 'paid') selected @endif>已付款</option>
                      </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="w-25 bg-secondary bg-gradient bg-opacity-10">運送方式</th>
                    <td>{{ $order->shipping_method }}</td>
                </tr>
                <tr>
                    <th scope="row" class="w-25 bg-secondary bg-gradient bg-opacity-10">運送狀態</th>
                    <td>
                      <select name="shipping_status" class="form-select">
                        <option value="not_shipped" @if($order->shipping_status == 'not_shipped') selected @endif>未出貨</option>
                        <option value="tallying" @if($order->shipping_status == 'tallying') selected @endif>理貨</option>
                        <option value="processing" @if($order->shipping_status == 'processing') selected @endif>揀貨</option>
                        <option value="shipped" @if($order->shipping_status == 'shipped') selected @endif>已出貨</option>
                        <option value="arrived" @if($order->shipping_status == 'arrived') selected @endif>已送達</option>
                      </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="w-25 bg-secondary bg-gradient bg-opacity-10">訂單狀態</th>
                    <td>
                      <select name="order_status" class="form-select">
                        <option value="pending" @if($order->order_status == 'pending') selected @endif>待確認</option>
                        <option value="processing" @if($order->order_status == 'processing') selected @endif>處理中</option>
                        <option value="completed" @if($order->order_status == 'completed') selected @endif>已完成</option>
                        <option value="cancelled" @if($order->order_status == 'cancelled') selected @endif>已取消</option>
                      </select>
                    </td>
                </tr>
                <tr>
                    <th scope="row" class="w-25 bg-secondary bg-gradient bg-opacity-10">備註</th>
                    <td class="@if($order->note == null) text-secondary @endif">{{ $order->note ? $order->note : '-'}}</td>
                </tr>
                <tr>
                    <th scope="row" class="w-25 bg-secondary bg-gradient bg-opacity-10">發票類型</th>
                    <td>{{ $order->invoice_type }}</td>
                </tr>
                @if($order->invoice_type == 'company')
                <tr>
                    <th scope="row" class="w-25 bg-secondary bg-gradient bg-opacity-10"> 公司抬頭 </th>
                    <td>{{ $order->company_name }}</td>
                </tr>
                @endif
                <tr>
                    <th scope="row" class="w-25 bg-secondary bg-gradient bg-opacity-10">@if($order->invoice_type == 'personal') 手機載具 @endif @if($order->invoice_type == 'company') 統一編號 @endif</th>
                    <td>{{ $order->invoice_carrier }}</td>
                </tr>
            </tbody>
        </table>

        <table class="table">
          <thead>
            <tr>
              <th scope="col">商品</th>
              <th scope="col">售價</th>
              <th scope="col">數量</th>
              <th scope="col">小計</th>
            </tr>
          </thead>
          <tbody>
            @foreach($order_details as $order_detail)
              
              <tr>
                <td>@foreach($merchandises as $merchandise) @if($order_detail->merchandise_id == $merchandise->id) {{ $merchandise->name }} @endif @endforeach</td>
                <td>@foreach($merchandises as $merchandise) @if($order_detail->merchandise_id == $merchandise->id) ${{ number_format($merchandise->price, 0) }} @endif @endforeach</td>
                <td>{{ $order_detail->quantity }}</td>
                <td>${{ number_format($order_detail->price*$order_detail->quantity, 0) }}</td>
              </tr>
              
            @endforeach

              <tr class="fw-bolder border-bottom border-3">
                <td>小計</td>
                <td></td>
                <td></td>
                <td>${{ number_format($order->total_amount, 0) }}</td>
              </tr>

              <tr>
                <td>運費</td>
                <td></td>
                <td></td>
                <td>${{ number_format(0, 0) }}</td>
              </tr>

              <tr class="fw-bolder">
                <td>總計</td>
                <td></td>
                <td>{{ $order_details->sum('quantity') }}</td>
                <td>${{ number_format($order->total_amount + 0, 0) }}</td>
              </tr>

          </tbody>
        </table>
    </div>
    <div class="card-footer text-muted text-center">
        <small>如有問題，請聯繫客服：support@example.com</small>
    </div>
  </div>
  <button type="submit" class="btn btn-primary mt-2">儲存並更新</button>
</form>

@endsection