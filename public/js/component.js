// 首頁預載入js
$(document).ready(function(){
  $('.search-box').focus(function(){
    $('.search-form').removeClass('border-secondary-subtle').addClass('border-success');
    $('.search-btn').removeClass('border-secondary-subtle').addClass('border-success');
  })

  $('.search-box').blur(function(){
    $('.search-form').removeClass('border-success').addClass('border-secondary-subtle');
    $('.search-btn').removeClass('border-success').addClass('border-secondary-subtle');
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

  // 搜尋框清除X動作
  const input = document.querySelector(".search-box");
  const clearBtn = document.querySelector(".clear-btn");

  input.addEventListener("input", () => {
    clearBtn.style.display = input.value ? "block" : "none";
  });

  clearBtn.addEventListener("click", () => {
    input.value = "";
    clearBtn.style.display = "none";
  });
  
});
