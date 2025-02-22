@extends('layout.main')

@section('title', $title)

@section('main-content')

<!-- cart list -->
<div class="text-center">
  <h2 class="py-1875">
    <span class="border-start border-top ps-2 pt-1 border-3">我的購物車</span>
  </h2>
</div>
<article id="cart-list-page" class="mt-1875">
  <div class="col-xl-10 mx-auto">
    <form action="#" method="POST" id="cart-list-form">
      <table class="table text-center">
        <thead>
          <tr>
            <th scope="col"><span class="d-none">選取</span></th>
            <th class="col-7" scope="col">商品名稱</th>
            <th class="col-2" scope="col">規格</th>
            <th class="col-1" scope="col">數量</th>
            <th class="col-1" scope="col">小計</th>
            <th class="col-1" scope="col">變更</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <!-- 選取 -->
            <td>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                  <span class="d-none">選取</span>
                </label>
              </div>
            </td>
            <!-- 商品圖與品名 -->
            <td class="align-middle">
              <a class="d-flex align-items-center" href="./product-detail.html" title="前往商品詳細說明頁">
                <div class="col-lg-3 col-md-4 me-3">
                  <img src="./images/product4.jpg" alt="商品圖">
                </div>
                <h3 class="text-916953 fs-6 text-start">華碩Vivobook 15</h3>
              </a>
            </td>
            <!-- 規格 -->
            <td class="align-middle">
              <select class="form-select border-0 border-bottom rounded-0 border-secondary-subtle bg-transparent" aria-label="select-list">
                <option disabled="" selected="">請選擇</option>
                <option value="1">A1</option>
                <option value="2">A2</option>
                <option value="3">A3</option>
              </select>
            </td>
            <!-- 數量 -->
            <td class="align-middle">
              <div class="d-flex align-items-center">
                <select class="form-select border-0 border-bottom rounded-0 border-secondary-subtle bg-transparent" aria-label="select-list">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3" selected="">3</option>
                </select>
              </div>
            </td>
            <!-- 小計 -->
            <td class="align-middle text-end cart-subtotal">
              <span class="">800</span>
            </td>
            <!-- 變更 -->
            <td class="align-middle">
              <button class="btn" type="button" title="加入收藏商品">
                <i class="bi bi-heart"></i>
                <span class="d-none">收藏</span>
              </button>
              <button class="btn" type="button" title="刪除商品">
                <i class="bi bi-trash-fill"></i>
                <span class="d-none">刪除</span>
              </button>
            </td>
          </tr>
          <tr>
            <!-- 選取 -->
            <td>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                  <span class="d-none">選取</span>
                </label>
              </div>
            </td>
            <!-- 商品圖與品名 -->
            <td class="align-middle">
              <a class="d-flex align-items-center" href="./product-detail.html" title="前往商品詳細說明頁">
                <div class="col-lg-3 col-md-4 me-3">
                  <img src="./images/product2.jpg" alt="商品圖">
                </div>
                <h3 class="text-916953 fs-6 text-start">華碩Vivobook 15</h3>
              </a>
            </td>
            <!-- 規格 -->
            <td class="align-middle">
              <select class="form-select border-0 border-bottom rounded-0 border-secondary-subtle bg-transparent" aria-label="select-list">
                <option disabled="" selected="">請選擇</option>
                <option value="1">A1</option>
                <option value="2">A2</option>
                <option value="3">A3</option>
              </select>
            </td>
            <!-- 數量 -->
            <td class="align-middle">
              <div class="d-flex align-items-center">
                <select class="form-select border-0 border-bottom rounded-0 border-secondary-subtle bg-transparent" aria-label="select-list">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3" selected="">3</option>
                </select>
              </div>
            </td>
            <!-- 小計 -->
            <td class="align-middle text-end cart-subtotal">
              <span class="">800</span>
            </td>
            <!-- 變更 -->
            <td class="align-middle">
              <button class="btn" type="button" title="加入收藏商品">
                <i class="bi bi-heart"></i>
                <span class="d-none">收藏</span>
              </button>
              <button class="btn" type="button" title="刪除商品">
                <i class="bi bi-trash-fill"></i>
                <span class="d-none">刪除</span>
              </button>
            </td>
          </tr>
          <tr>
            <!-- 選取 -->
            <td>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                  <span class="d-none">選取</span>
                </label>
              </div>
            </td>
            <!-- 商品圖與品名 -->
            <td class="align-middle">
              <a class="d-flex align-items-center" href="./product-detail.html" title="前往商品詳細說明頁">
                <div class="col-lg-3 col-md-4 me-3">
                  <img src="./images/product4.jpg" alt="商品圖">
                </div>
                <h3 class="text-916953 fs-6 text-start">華碩Vivobook 15</h3>
              </a>
            </td>
            <!-- 規格 -->
            <td class="align-middle">
              <select class="form-select border-0 border-bottom rounded-0 border-secondary-subtle bg-transparent" aria-label="select-list">
                <option disabled="" selected="">請選擇</option>
                <option value="1">A1</option>
                <option value="2">A2</option>
                <option value="3">A3</option>
              </select>
            </td>
            <!-- 數量 -->
            <td class="align-middle">
              <div class="d-flex align-items-center">
                <select class="form-select border-0 border-bottom rounded-0 border-secondary-subtle bg-transparent" aria-label="select-list">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3" selected="">3</option>
                </select>
              </div>
            </td>
            <!-- 小計 -->
            <td class="align-middle text-end cart-subtotal">
              <span class="">800</span>
            </td>
            <!-- 變更 -->
            <td class="align-middle">
              <button class="btn" type="button" title="加入收藏商品">
                <i class="bi bi-heart"></i>
                <span class="d-none">收藏</span>
              </button>
              <button class="btn" type="button" title="刪除商品">
                <i class="bi bi-trash-fill"></i>
                <span class="d-none">刪除</span>
              </button>
            </td>
          </tr>
          <tr>
            <!-- 選取 -->
            <td>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                  <span class="d-none">選取</span>
                </label>
              </div>
            </td>
            <!-- 商品圖與品名 -->
            <td class="align-middle">
              <a class="d-flex align-items-center" href="./product-detail.html" title="前往商品詳細說明頁">
                <div class="col-lg-3 col-md-4 me-3">
                  <img src="./images/product2.jpg" alt="商品圖">
                </div>
                <h3 class="text-916953 fs-6 text-start">華碩Vivobook 15</h3>
              </a>
            </td>
            <!-- 規格 -->
            <td class="align-middle">
              <select class="form-select border-0 border-bottom rounded-0 border-secondary-subtle bg-transparent" aria-label="select-list">
                <option disabled="" selected="">請選擇</option>
                <option value="1">A1</option>
                <option value="2">A2</option>
                <option value="3">A3</option>
              </select>
            </td>
            <!-- 數量 -->
            <td class="align-middle">
              <div class="d-flex align-items-center">
                <select class="form-select border-0 border-bottom rounded-0 border-secondary-subtle bg-transparent" aria-label="select-list">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3" selected="">3</option>
                </select>
              </div>
            </td>
            <!-- 小計 -->
            <td class="align-middle text-end cart-subtotal">
              <span class="">999,800</span>
            </td>
            <!-- 變更 -->
            <td class="align-middle">
              <button class="btn" type="button" title="加入收藏商品">
                <i class="bi bi-heart"></i>
                <span class="d-none">收藏</span>
              </button>
              <button class="btn" type="button" title="刪除商品">
                <i class="bi bi-trash-fill"></i>
                <span class="d-none">刪除</span>
              </button>
            </td>
          </tr>
          <tr>
            <!-- 選取 -->
            <td>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked="">
                <label class="form-check-label" for="flexCheckChecked">
                  <span class="d-none">選取</span>
                </label>
              </div>
            </td>
            <!-- 商品圖與品名 -->
            <td class="align-middle">
              <a class="d-flex align-items-center" href="./product-detail.html" title="前往商品詳細說明頁">
                <div class="col-lg-3 col-md-4 me-3">
                  <img src="./images/product2.jpg" alt="商品圖">
                </div>
                <h3 class="text-916953 fs-6 text-start">華碩Vivobook 15</h3>
              </a>
            </td>
            <!-- 規格 -->
            <td class="align-middle">
              <select class="form-select border-0 border-bottom rounded-0 border-secondary-subtle bg-transparent" aria-label="select-list">
                <option disabled="" selected="">請選擇</option>
                <option value="1">A1</option>
                <option value="2">A2</option>
                <option value="3">A3</option>
              </select>
            </td>
            <!-- 數量 -->
            <td class="align-middle">
              <div class="d-flex align-items-center">
                <select class="form-select border-0 border-bottom rounded-0 border-secondary-subtle bg-transparent" aria-label="select-list">
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3" selected="">3</option>
                </select>
              </div>
            </td>
            <!-- 小計 -->
            <td class="align-middle text-end cart-subtotal">
              <span class="">800</span>
            </td>
            <!-- 變更 -->
            <td class="align-middle">
              <button class="btn" type="button" title="加入收藏商品">
                <i class="bi bi-heart"></i>
                <span class="d-none">收藏</span>
              </button>
              <button class="btn" type="button" title="刪除商品">
                <i class="bi bi-trash-fill"></i>
                <span class="d-none">刪除</span>
              </button>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- 結帳 -->
      <div class="check-out text-end bg-white p-2 sticky-bottom bg-opacity-50 rounded-3">
        <span>結帳金額：</span>
        <span class="cart-subtotal">66,666</span>
        <!-- 結帳btn -->
        <div class="text-end mt-2">
          <button type="submit" class="btn btn-primary text-light px-5">結帳</button>
        </div>
      </div>
    </form>
  </div>
</article>

@endsection