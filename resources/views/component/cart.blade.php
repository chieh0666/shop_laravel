<script>
// 購物車
$(document).ready(function() {
  let spanText = $('.cartItem span').text(); // 獲取 span 的文字內容
  let cartCount = 0;

  const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 1800,
    timerProgressBar: true,
    didOpen: (toast) => {
      toast.onmouseenter = Swal.stopTimer;
      toast.onmouseleave = Swal.resumeTimer;
    }
  });

  $('.addToCartBtn').click(function() {
      let itemId = $(this).data('id'); // 取得商品 ID
      let csrfToken = '{{ csrf_token() }}';
      
      $.ajax({
          url: '/cart/add',
          method: 'POST',
          data: {
              _token: csrfToken,
              toCartItem: itemId
          },
          success: function(response) {
            Toast.fire({
              icon: "success",
              title: response.msg // 顯示成功訊息
            });
            updateCartUI() // 更新購物車 UI
          },
          error: function(xhr) {
            Toast.fire({
              icon: "error",
              title: '加入購物車失敗！' // 顯示錯誤訊息
            });
          }
      });
  });

  function updateCartUI() {
    fetch('/cart/getdata', { //新增路由來獲取購物車資料。
      method: 'get',
      headers: {
          'Content-Type': 'application/json',
          'X-CSRF-TOKEN': '{{ csrf_token() }}'
      },
    })
    .then(response => response.json())
    .then(data => {
      //在此處理如何刷新購物車UI，例如將資料渲染到畫面上。
        console.log('購物車資料更新:', data.cartItemCount);
        if(data.cartItemCount > 99){
            $('.cartItem span').text("99+");
        }else{
            $('.cartItem span').text(data.cartItemCount);
        }
    })
    .catch(error => {
        console.error('發生錯誤:', error);
    });
  }
  updateCartUI();//初始化購物車顯示數量。

});
</script>