@extends('layout.main')

@section('title', $title)

@section('main-content')

<!-- checkout page -->
<div class="text-center">
  <h2 class="py-1875">
    <span class="border-start border-top ps-2 pt-1 border-3">{{ $pageTitle }}</span>
  </h2>
</div>

<article id="checkout-page" class="mt-1875">
  <div class="col-xl-10 mx-auto">
    <form action="#" method="POST" id="cart-list-form">
      @csrf
      <table class="table text-center">
        <thead>
          <tr>
            <th class="col-7" scope="col">商品名稱</th>
            <th class="col-2" scope="col">單價</th>
            <th class="col-1" scope="col">數量</th>
            <th class="col-2" scope="col">小計</th>
          </tr>
        </thead>
        <tbody>
          
          @foreach($cartItems as $cartItem)
          @foreach($merchandises as $merchandise)
          @if($cartItem->merchandise_id == $merchandise->id)
          <tr>
            <!-- 商品圖與品名 -->
            <td class="align-middle">
              <a class="d-flex align-items-center" href="/merchandise/{{ $merchandise->id }}/detail" title="前往商品詳細說明頁">
                <div class="col-lg-3 col-md-4 me-3">
                  <img src="/{{ $merchandise->photo }}" alt="商品圖">
                </div>
                <h3 class="fs-6 text-start">{{ $merchandise->name }}</h3>
              </a>
            </td>
            <!-- 數量 -->
            <td class="align-middle">
              <div class="d-flex align-items-center">
                <select class="form-select border-0 border-bottom rounded-0 border-secondary-subtle bg-transparent quantity-select" aria-label="select-list" data-price="{{ $merchandise->price }}" name="quantity[]">
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
  </div>
</article>

@push('scripts')

@if(session()->has('user_id'))
@include('component.cart')
@endif

@endpush

@endsection