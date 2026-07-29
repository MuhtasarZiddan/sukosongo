import './bootstrap';

import Alpine from 'alpinejs';

import Swiper from 'swiper';
import { Navigation, Autoplay } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/navigation';

window.Alpine = Alpine;
window.Swiper = Swiper;
window.SwiperModules = {
    Navigation,
    Autoplay,
};

Alpine.start();

document.addEventListener('DOMContentLoaded', () => {

    new Swiper(".strukturSwiper", {
    modules: [Navigation, Autoplay],
    slidesPerView: 4,
    spaceBetween: 24,
    loop: true,
    speed: 7000,
    autoplay: {
        delay: 0,
        disableOnInteraction: false,
        pauseOnMouseEnter: true,
    },
    // freeMode: {
    //     enabled: true,
    //     momentum: false,
    // },
    allowTouchMove: true,
    navigation: {
        nextEl: ".struktur-next",
        prevEl: ".struktur-prev",
    },
    breakpoints: {
        0:    { slidesPerView: 1 },
        640:  { slidesPerView: 2 },
        1024: { slidesPerView: 3 },
        1280: { slidesPerView: 4 },
    },
});

document.querySelectorAll('[data-slider]').forEach(slider => {
    const slides = slider.querySelectorAll('.bg-slide');
    let current = 0;

    setInterval(() => {
        slides[current].classList.remove('active');
        current = (current + 1) % slides.length;
        slides[current].classList.add('active');
    }, 3000); // ganti tiap 3 detik
});

});