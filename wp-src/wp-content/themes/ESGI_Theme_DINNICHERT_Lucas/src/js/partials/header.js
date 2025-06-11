document.addEventListener('DOMContentLoaded', function () {
  const burger = document.getElementById('burger');
  const menu = document.getElementById('mobileMenu');
  const headerTop = document.getElementById('headerTop');
  const menuClose = document.getElementById('menuClose');

  burger.addEventListener('click', function () {
    const isOpen = menu.classList.toggle('open');
    menu.classList.toggle('d-none');
    burger.classList.toggle('active');

    if (isOpen) {
      headerTop.classList.add('d-none');
    } else {
      headerTop.classList.remove('d-none');
    }
  });

  menuClose.addEventListener('click', function () {
    menu.classList.remove('open');
    menu.classList.add('d-none');
    burger.classList.remove('active');
    headerTop.classList.remove('d-none');
  });
});