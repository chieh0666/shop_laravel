// 首頁預載入js
$(document).ready(function(){
  $('.search-input').focus(function(){
    $('.search-form').removeClass('border-secondary-subtle').addClass('border-primary');
    $('.search-btn').removeClass('border-secondary-subtle').addClass('border-primary');
  })

  $('.search-input').blur(function(){
    $('.search-form').removeClass('border-primary').addClass('border-secondary-subtle');
    $('.search-btn').removeClass('border-primary').addClass('border-secondary-subtle');
  })

  /* 首頁商品分類選單 */
  $('.cat-item').each(function(index) {
    $(this).hover(
      function() { // 滑鼠進入
        $('.subcat').eq(index).toggleClass('d-none'); // 顯示對應的.subcat
      },
      function() { // 滑鼠離開
        $('.subcat').eq(index).toggleClass('d-none'); // 隱藏對應的.subcat
      }
    );
  });
  $('.subcat').each(function(index) {
    $(this).hover(
      function() { // 滑鼠進入
        $('.subcat').eq(index).toggleClass('d-none'); // 顯示對應的.subcat
      },
      function() { // 滑鼠離開
        $('.subcat').eq(index).toggleClass('d-none'); // 隱藏對應的.subcat
      }
    );
  });
});
