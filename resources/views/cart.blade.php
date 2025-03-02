@extends('layout.main')

@section('title', $title)

@section('main-content')

<!-- cart list -->
<div class="text-center">
  <h2 class="py-1875">
    <span class="border-start border-top ps-2 pt-1 border-3">{{ $pageTitle }}</span>
  </h2>
</div>

<article id="cart-list" class="mt-1875">
  <div class="col-xl-10 mx-auto">
    @if($cartItems->where('user_id', session()->get('user_id'))->count() !== 0)
    <form action="/checkout" method="POST" id="cart-list-form">
      @csrf
      <table class="table text-center">
        <thead>
          <tr>
            <th scope="col"><span class="d-none">選取</span></th>
            <th class="col-6" scope="col">商品名稱</th>
            <th class="col-1" scope="col">單價</th>
            <th class="col-1" scope="col">數量</th>
            <th class="col-2" scope="col">小計</th>
            <th class="col-2" scope="col">功能</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($cartItems as $cartItem)
          @foreach($merchandises as $merchandise)
          @if($cartItem->merchandise_id == $merchandise->id)
          <tr>
            <!-- 選取 -->
            <td>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="{{ $cartItem->merchandise_id }}" name="cartCheck[]" id="cartCheck_{{ $cartItem->merchandise_id }}" @if($cartItem->merchandise_id) checked @endif>
                <label class="form-check-label" for="cartCheck_{{ $cartItem->merchandise_id }}">
                  <span class="d-none">選取</span>
                </label>
              </div>
            </td>
            <!-- 商品圖與品名 -->
            <td class="align-middle">
              <a class="d-flex align-items-center" href="/merchandise/{{ $cartItem->merchandise_id }}/detail" title="前往商品詳細說明頁">
                <div class="col-lg-3 col-md-4 me-3">
                  <img src="/{{ $merchandise->photo }}" alt="商品圖">
                </div>
                <h3 class="fs-6 text-start">{{ $merchandise->name }}</h3>
              </a>
            </td>
            <!-- 單價 -->
            <td class="align-middle text-end">
              <span class="price" data-price="{{ $merchandise->price }}">${{ number_format($merchandise->price, 0) }}</span>
            </td>
            <!-- 數量 -->
            <td class="align-middle">
              <div class="d-flex align-items-center">
                <select class="form-select border-0 border-bottom rounded-0 border-secondary-subtle bg-transparent quantity-select" name="quantity[]" data-id="{{ $cartItem->id }}">
                  @for($i = 1; $i <= min(10, $merchandise->remain_count); $i++)
                  <option value="{{ $i }}" @if($cartItem->quantity == $i) selected @endif>{{ $i }}</option>
                  @endfor
                </select>
              </div>
            </td>
            <!-- 小計 -->
            <td class="align-middle text-end cart-subtotal">
              <span class="subtotal">${{ number_format($merchandise->price * $cartItem->quantity, 0) }}</span>
            </td>
            <!-- 功能 -->
            <td class="align-middle">
              <button class="btn" type="button" title="加入收藏商品">
                <i class="bi bi-heart"></i>
                <span class="d-none">收藏</span>
              </button>
              <button class="btn delCartItem" type="button" title="刪除商品" data-id="{{ $cartItem->id }}">
                <i class="bi bi-trash-fill"></i>
                <span class="d-none">刪除</span>
              </button>
            </td>
          </tr>
          @endif
          @endforeach
          @endforeach

        </tbody>
      </table>
      <!-- 結帳 -->
      <div class="check-out text-end bg-white p-2 sticky-bottom bg-opacity-50 rounded-3">
        <span>結帳金額：</span>
        $<span id="cart-total">0</span>
        <!-- 結帳btn -->
        <div class="text-end mt-2">
          <button type="submit" class="btn btn-primary text-light px-5">結帳</button>
        </div>
      </div>
    </form>
    @else
    <div class="text-center">
      <h2 class="py-1875">
        <span class="d-block text-secondary fs-3">
          購物車沒有商品
        </span>
        <a class="btn btn-light" href="/">再逛逛</a>
      </h2>
    </div>
    @endif
  </div>
</article>

@push('scripts')

@if(session()->has('user_id'))
@include('component.cart')
@endif

@endpush

@endsection