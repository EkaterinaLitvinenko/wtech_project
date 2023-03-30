
const detailBtns = document.querySelectorAll('.detail-btn');


detailBtns.forEach(btn => {
  btn.addEventListener('click', () => {
    const productItem = btn.closest('.product-item');
    const productDetail = productItem.nextElementSibling;
    productDetail.querySelector('.collapse').classList.toggle('show');
  });
});
