@extends('layout.main')

@section('title', $title)

@section('main-content')

<!-- checkout page -->
<div class="text-center">
  <h2 class="py-1875">
    <span class="border-start border-top ps-2 pt-1 border-3">{{ $page_title }}</span>
  </h2>
</div>

@include('component.errors')

<article id="checkout-page" class="mt-1875">
  <div class="col-xl-10 mx-auto">
    <form action="/checkout" method="POST">
      @csrf
      <!-- 區塊一：訂單商品 -->
      <div class="mt-4">
        <div class="card">
          <div class="card-header bg-light">
            <h3 class="mb-0 h5 fw-bolder">訂單商品</h3>
          </div>
          <div class="card-body p-0">
            <table class="table table-sm mb-0">
              <thead>
                <tr>
                  <th class="col-6 text-center" scope="col">商品名稱</th>
                  <th class="col-2" scope="col">單價</th>
                  <th class="col-2" scope="col">數量</th>
                  <th class="col-2" scope="col">小計</th>
                </tr>
              </thead>
              <tbody>
                @foreach($checkoutData as $data)
                <tr>
                  <!-- 商品圖與品名 -->
                  <td class="align-middle">
                    <a class="d-flex align-items-center" href="/merchandise/{{ $data['merchandise_id'] }}/detail" title="前往商品詳細說明頁">
                      <div class="me-3">
                        <img src="/{{ $data['photo'] }}" alt="{{ $data['name'] }}" class="img-fluid" style="max-width: 80px;">
                      </div>
                      <h3 class="fs-6 text-start mb-0">{{ $data['name'] }}</h3>
                      <input type="hidden" name="merchandise_id[]" id="merchandise_id" value="{{ $data['merchandise_id'] }}">
                    </a>
                  </td>
                  <!-- 單價 -->
                  <td class="align-middle">
                    <span>${{ number_format($data['price'], 0) }}</span>
                  </td>
                  <!-- 數量 -->
                  <td class="align-middle">
                    <span>{{ $data['quantity'] }}</span>
                    <input type="hidden" name="quantity[]" value="{{ $data['quantity'] }}">
                  </td>
                  <!-- 小計 -->
                  <td class="align-middle">
                    <span>${{ number_format($data['price'] * $data['quantity'], 0) }}</span>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <!-- 區塊二：運送方式 -->
      <div class="mt-4">
        <div class="card">
          <div class="card-header bg-light">
            <h3 class="mb-0 h5 fw-bolder">運送或取貨方式<i class="bi bi-asterisk text-danger fs-6"></i></h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="shipping_method" id="pickup" value="pickup" checked>
                  <label class="form-check-label" for="pickup">
                    來店自取
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="shipping_method" id="us_delivery" value="us_delivery">
                  <label class="form-check-label" for="us_delivery">
                    專車配送
                  </label>
                  <div class="bg-light p-3 rounded-3 shipping_info" data-target="us_delivery">
                    <p class="mb-1">
                      <span class="me-1">{{ $user->last_name }}&nbsp;{{ $user->first_name }}</span>
                      <span class="ms-1">{{ substr($user->phone, 0, 4) . '-' . substr($user->phone, 4, 3) . '-' . substr($user->phone, 7) }}</span>
                    </p>
                    <input class="form-control" type="text" name="shipping_address"  id="shipping_address" placeholder="例：台北市中山區南京東路三段123號">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 區塊三：付款方式 -->
      <div class="mt-4">
        <div class="card">
          <div class="card-header bg-light">
            <h3 class="mb-0 h5 fw-bolder">付款方式<i class="bi bi-asterisk text-danger fs-6"></i></h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="payment_method" id="credit_card" value="credit_card" checked>
                  <label class="form-check-label" for="credit_card">
                    信用卡
                  </label>
                  <div class="d-none bg-light p-3 rounded-3 payment_info" data-target="credit_card">
                    <p class="mb-1">卡號末四碼: ****-1234</p>
                    <p>到期日: 12/2026</p>
                  </div>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="payment_method" id="pay_on_site" value="pay_on_site">
                  <label class="form-check-label" for="pay_on_site">
                    來店現場付款
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="payment_method" id="cash" value="cash" >
                  <label class="form-check-label" for="cash">
                    貨到付款
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="payment_method" id="linepay" value="linepay" >
                  <label class="form-check-label" for="linepay">
                    LINE Pay
                  </label>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 區塊四：發票資訊 -->
      <div class="mt-4">
        <div class="card">
          <div class="card-header bg-light">
            <h3 class="mb-0 h5 fw-bolder">發票資訊<i class="bi bi-asterisk text-danger fs-6"></i></h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="invoice_type" id="personal" value="personal" checked>
                  <label class="form-check-label" for="personal">
                    手機載具
                  </label>
                  <div class="bg-light p-3 rounded-3 invoice_info" data-target="personal">
                    <input type="text" class="form-control invoice_carrier" name="invoice_carrier" data-target="personal" placeholder="/1ABCDE2" maxlength="8">
                  </div>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="invoice_type" id="company" value="company">
                  <label class="form-check-label" for="company">
                    公司發票
                  </label>
                  <div class="bg-light p-3 rounded-3 invoice_info" data-target="company">
                    <div class="mb-3">
                      <label for="company_name" class="form-label">公司抬頭</label>
                      <input type="text" class="form-control" name="company_name" data-target="company" placeholder="公司名稱">
                    </div>
                    <div class="mb-3">
                      <label for="invoice_carrier" class="form-label">統一編號</label>
                      <input type="text" class="form-control invoice_carrier" name="invoice_carrier" data-target="company" placeholder="12345678" maxlength="8">
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 區塊五：備註 -->
      <div class="mt-4">
        <div class="card">
          <div class="card-header bg-light">
            <h3 class="mb-0 h5 fw-bolder">備註</h3>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12">
                <input type="text" class="form-control" name="note" id="note" placeholder="例：門牌號碼、幾號出入口、放保管室">
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- 下訂單 -->
      <div class="check-out text-end bg-white p-2 sticky-bottom bg-opacity-50 rounded-3 fs-4">
        <span class="fw-bolder">結帳金額：$</span>
        <span class="fw-bolder" id="checkout-total">{{ number_format($totalAmount, 0) }}</span>
        <!-- 下訂單btn -->
        <div class="text-end mt-2">
          <button type="submit" class="btn btn-primary text-light px-5 py-3">下訂單</button>
        </div>
      </div>
    </form>
  </div>
</article>

@push('scripts')

<script>
  // 購物車隱藏
  if (window.location.pathname === "/checkout/confirm") {
    document.querySelector(".cartItem").style.display = "none";
  }
</script>

<script>
  if (window.performance && window.performance.navigation.type === 2) {
    // 從瀏覽器歷史記錄導航返回
    window.location.replace('/'); // 跳轉到首頁
  }
</script>

<script>
const shippingMethods = document.querySelectorAll('input[name="shipping_method"]');
const paymentMethods = document.querySelectorAll('input[name="payment_method"]');
const invoiceTypes = document.querySelectorAll('input[name="invoice_type"]');
const shippingInfos = document.querySelectorAll('.shipping_info');
const paymentInfos = document.querySelectorAll('.payment_info');
const invoiceInfos = document.querySelectorAll('.invoice_info');
const invoiceCarriers = document.querySelectorAll('input[name="invoice_carrier"]');

// 初始化
updateShippingInfo();

// 監聽變化
shippingMethods.forEach(radio => {
  radio.addEventListener('change', updateShippingInfo);
});

function updateShippingInfo() {
  shippingInfos.forEach(info => {
    info.classList.add('d-none');
  });
    
  const selectedRadio = document.querySelector('input[name="shipping_method"]:checked');
  if (selectedRadio) {
    const targetInfo = document.querySelector(`.shipping_info[data-target="${selectedRadio.id}"]`);
    if (targetInfo) {
      targetInfo.classList.remove('d-none');
    }
  }
}

updatePaymentInfo();

paymentMethods.forEach(radio => {
  radio.addEventListener('change', updatePaymentInfo);
});

function updatePaymentInfo() {
  paymentInfos.forEach(info => {
    info.classList.add('d-none');
  });
    
  const selectedRadio = document.querySelector('input[name="payment_method"]:checked');
  if (selectedRadio) {
    const targetInfo = document.querySelector(`.payment_info[data-target="${selectedRadio.id}"]`);
    if (targetInfo) {
      targetInfo.classList.remove('d-none');
    }
  }
}

updateInvoiceInfo();

invoiceTypes.forEach(radio => {
  radio.addEventListener('change', updateInvoiceInfo);
});

function updateInvoiceInfo() {
  invoiceInfos.forEach(info => {
      info.classList.add('d-none');
  });

  invoiceCarriers.forEach(carrier => {
    carrier.removeAttribute('name');
  });

  // 顯示選中的 invoice_info 區塊並啟用 invoice_carrier 的 Attribute:name 
  const selectedRadio = document.querySelector('input[name="invoice_type"]:checked');
  if (selectedRadio) {
    const targetInfo = document.querySelector(`.invoice_info[data-target="${selectedRadio.id}"]`);
    const targetCarrier = document.querySelector(`.invoice_info[data-target="${selectedRadio.id}"] .invoice_carrier`);
    if (targetInfo) {
      targetInfo.classList.remove('d-none');
      targetCarrier.setAttribute('name', 'invoice_carrier');
      targetCarrier.setAttribute('required', '');
    }
  }
}
</script>

@endpush

@endsection
