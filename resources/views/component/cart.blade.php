<script>
// 購物車
$(document).ready(function() {
  let spanText = $('.cartItem span').text(); // 獲取 span 的文字內容
  let cartCount = 0;

  const Toast = Swal.mixin({
    toast: true,
    position: "top",
    showConfirmButton: false,
    timer: 1800,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    }
  });

  $('.addToCartBtn').click(function() {
    let itemId = this.dataset.id; // 取得商品 ID
    let csrfToken = '{{ csrf_token() }}';
    
    fetch(`/cart/add`, {
        method: 'POST', // 請求方法
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ // 要傳送的資料
          toCartItem: itemId
        })
    })
    .then(response => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json(); // 解析回應為 JSON
    })
    .then(data => {
      Toast.fire({
        icon: "success",
        title: data.msg // 顯示成功訊息
      });
      updateCartUI() // 更新購物車 UI
    })
    .catch(error => {
      Toast.fire({
        icon: "error",
        title: '加入購物車失敗！' // 顯示錯誤訊息
      });
    })
    .finally(() => {
      this.disabled = true;
      setTimeout(() => {
        this.disabled = false;
      }, 1500)
    });
  });

  function updateCartUI() {
    fetch(`/cart/getdata`, {
      method: 'GET',
      headers: {
          'Content-Type': 'application/json'
      },
    })
    .then(response => response.json())
    .then(data => {
      //在此處理如何刷新購物車UI，例如將資料渲染到畫面上。
      if(data.cartItemCount > 99){
          $('.cartItem span').text("99+");
      }else{
        $('.cartItem span').text(data.cartItemCount);
      }
    })
    .catch(error => {
      alert('發生錯誤');
    });
  }
  updateCartUI();//初始化購物車顯示數量。

});
</script>

<script>
// 購物車隱藏
if (window.location.pathname === "/cart/list") {
  document.querySelector(".cartItem").style.display = "none";
}
</script>

<script>
document.addEventListener("DOMContentLoaded", function () {
  function updateCartTotal() {
    let total = 0;

    // 取得所有已選取 (勾選) 的商品小計並加總
    document.querySelectorAll(".form-check-input[name='cartCheck[]']:checked").forEach(checkbox => {
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
      let itemId = this.getAttribute('data-id');
      let price = parseFloat(this.closest('tr').querySelector('.price').getAttribute('data-price')); // 從當前行獲取單價
      let quantity = parseInt(this.value); // 取得當前選擇的數量
      let subtotalElement = this.closest("td").nextElementSibling.querySelector(".subtotal"); // 找到對應小計元素
      let csrfToken = '{{ csrf_token() }}';

      fetch(`/cart/${itemId}/edit`, {
        method: 'PUT', // 請求方法
        headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': csrfToken
        },
        body: JSON.stringify({ // 要傳送的資料
          quantity: quantity
        })
      });

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
      let csrfToken = '{{ csrf_token() }}'; // 獲取 CSRF token

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
          alert('刪除失敗，請稍後再試'); // 處理錯誤
      })
      .finally(() => {
          this.disabled = false;
      });
    });
  });

  // 監聽所有核取方塊的變化
  document.querySelectorAll(".form-check-input[name='cartCheck[]']").forEach(checkbox => {
    checkbox.addEventListener("change", function () {
      updateCartTotal(); // 更新結帳總金額
    });
  });

  // 頁面載入時先計算一次總金額
  updateCartTotal();
});
</script>