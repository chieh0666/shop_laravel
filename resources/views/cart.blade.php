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
    <form action="#" method="POST" id="cart-list-form">
      <table class="table text-center">
        <thead>
          <tr>
            <th scope="col"><span class="d-none">選取</span></th>
            <th class="col-7" scope="col">商品名稱</th>
            {{-- <th class="col-2" scope="col">規格</th> --}}
            <th class="col-1" scope="col">數量</th>
            <th class="col-2" scope="col">小計</th>
            <th class="col-2" scope="col">變更</th>
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
                <input class="form-check-input" type="checkbox" value="{{ $merchandise->id }}" name="cartCheck" id="cartCheck" @if($merchandise->id) checked @endif>
                <label class="form-check-label" for="cartCheck">
                  <span class="d-none">選取</span>
                </label>
              </div>
            </td>
            <!-- 商品圖與品名 -->
            <td class="align-middle">
              <a class="d-flex align-items-center" href="/merchandise/{{ $merchandise->id }}/detail" title="前往商品詳細說明頁">
                <div class="col-lg-3 col-md-4 me-3">
                  <img src="/{{ $merchandise->photo }}" alt="商品圖">
                </div>
                <h3 class="fs-6 text-start">{{ $merchandise->name }}</h3>
              </a>
            </td>
            <!-- 規格 -->
            {{-- <td class="align-middle">
              <select class="form-select border-0 border-bottom rounded-0 border-secondary-subtle bg-transparent" aria-label="select-list">
                <option disabled="" selected="">請選擇</option>
                <option value="1">A1</option>
                <option value="2">A2</option>
                <option value="3">A3</option>
              </select>
            </td> --}}
            <!-- 數量 -->
            <td class="align-middle">
              <div class="d-flex align-items-center">
                <select class="form-select border-0 border-bottom rounded-0 border-secondary-subtle bg-transparent quantity-select" aria-label="select-list" data-price="{{ $merchandise->price }}">
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
            <!-- 變更 -->
            <td class="align-middle">
              <button class="btn" type="button" title="加入收藏商品">
                <i class="bi bi-heart"></i>
                <span class="d-none">收藏</span>
              </button>
              <meta name="csrf-token" content="{{ csrf_token() }}">
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
        <span class="text-secondary fs-4">
          購物車沒有商品
        </span>
      </h2>
      <div class="fs-4">
        <a class="btn btn-light" href="/">再逛逛</a>
      </div>
    </div>
    @endif
  </div>
</article>

@push('scripts')

@if(session()->has('user_id'))
@include('component.cart')
@endif

<script>
  document.addEventListener("DOMContentLoaded", function () {
    function updateCartTotal() {
      let total = 0;

      // 取得所有已選取 (勾選) 的商品小計並加總
      document.querySelectorAll(".form-check-input[name='cartCheck']:checked").forEach(checkbox => {
        let cartRow = checkbox.closest("tr"); // 找到商品所在的 <tr>
        if (cartRow) {
          let subtotalElement = cartRow.querySelector(".cart-subtotal .subtotal");
          if (subtotalElement) {
            total += parseFloat(subtotalElement.textContent.replace(/,/g, "").replace("$", ""));
          }
        }
      });

      // 更新結帳金額
      document.getElementById("cart-total").textContent = total.toLocaleString();
    }

    // 監聽數量選擇變更事件
    document.querySelectorAll(".quantity-select").forEach(select => {
      select.addEventListener("change", function () {
        let price = parseFloat(this.getAttribute("data-price")); // 取得商品單價
        let quantity = parseInt(this.value); // 取得當前選擇的數量
        let subtotalElement = this.closest("td").nextElementSibling.querySelector(".subtotal"); // 找到對應小計元素

        // 計算新的小計並更新
        let newSubtotal = price * quantity;
        subtotalElement.textContent = `$${newSubtotal.toLocaleString()}`;

        // 重新計算總金額
        updateCartTotal();
      });
    });

    // 監聽刪除按鈕事件
    document.querySelectorAll(".delCartItem").forEach(button => {
      button.addEventListener("click", function () {
        let cartId = this.dataset.id;
        let csrfToken = document.querySelector('meta[name="csrf-token"]').content; // 獲取 CSRF token

        if (!cartId) {
                console.error('無效的 cartId');
                return;
        }

        this.disabled = true;

        fetch(`/cart/${cartId}/delete`, {
            method: 'DELETE', // 請求方法
            headers: {
                'X-CSRF-TOKEN': csrfToken
            }
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json(); // 解析回應為 JSON
        })
        .then(data => {
            console.log('成功:', data); // 處理成功的資料
            let cartItem = this.closest("tr"); // 找到對應的商品行 (假設商品在 <tr> 內)
            if (cartItem) {
                  cartItem.style.transition = 'opacity 0.3s'; // 添加淡出效果
                  cartItem.style.opacity = '0';
                  setTimeout(() => {
                    cartItem.remove(); // 移除該行商品
                    updateCartTotal(); // 重新計算總金額
                  }, 300);
              }
        })
        .catch(error => {
            console.log('錯誤:', error); // 處理錯誤
            alert('刪除失敗，請稍後再試');
        })
        .finally(() => {
            this.disabled = false;
        });
      });
    });

    // 監聽所有核取方塊的變化
    document.querySelectorAll(".form-check-input[name='cartCheck']").forEach(checkbox => {
      checkbox.addEventListener("change", function () {
        updateCartTotal(); // 更新結帳總金額
      });
    });

    // 頁面載入時先計算一次總金額
    updateCartTotal();
  });
</script>

@endpush

@endsection