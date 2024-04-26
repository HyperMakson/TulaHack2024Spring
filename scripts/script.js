var offsetHeight = document.querySelector('.main-logo').offsetHeight;

window.addEventListener('scroll', () => {
    document.querySelector('.header').classList.toggle('header__change-color', window.scrollY > offsetHeight);
});