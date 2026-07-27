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
    freeMode: {
        enabled: true,
        momentum: false,
    },
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

});