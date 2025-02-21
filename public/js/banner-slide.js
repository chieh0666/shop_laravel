// 首頁banner
const mainContainer = document.getElementById("mainCarousel");
const mainOptions = {
  infinite: true,
  Autoplay: {
    timeout: 3000,
  showProgress: false
  }
};
new Carousel(mainContainer, mainOptions, { Autoplay });