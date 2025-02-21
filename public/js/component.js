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
  document.querySelectorAll('.cat-item').forEach(item => {
    // 添加滑鼠進入事件
    item.addEventListener('mouseenter', function() {
        const subcat = this.querySelector('.subcat');
        subcat.removeClass('d-none');
    });
    // 添加滑鼠離開事件
    item.addEventListener('mouseleave', function() {
        const subcat = this.querySelector('.subcat');
        subcat.addClass('d-none');
    });
  });

  // for (let i = 1; i <= 99; i++) {
  //   $('.cat-' + i).hover(
  //     function() {
  //       $('.cat-' + i + '-ls').removeClass('d-none');
  //     },
  //     function() {
  //       $('.cat-' + i + '-ls').addClass('d-none');
  //     }
  //   );
  //   $('.cat-' + i + '-ls').hover(
  //     function() {
  //     $('.cat-' + i + '-ls').removeClass('d-none');
  //   },
  //     function() {
  //       $('.cat-' + i + '-ls').addClass('d-none');
  //     }
  //   );
  // }
  
  // 首頁banner、促銷頁面輪播圖
  const container = document.getElementById("mainCarousel");
  const options = {
    infinite: true,
    Autoplay: {
      timeout: 3000,
    showProgress: false
    }
  };
  new Carousel(container, options, { Autoplay });

});

const container = document.getElementById("salesCarousel");
const options = {
  infinite: false
};
new Carousel(container, options);