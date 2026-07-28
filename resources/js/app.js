import "./bootstrap";

import Alpine from "alpinejs";

import Swiper from "swiper";
import { Navigation } from "swiper/modules";

import "swiper/css";
import "swiper/css/navigation";

window.Alpine = Alpine;
window.Swiper = Swiper;
window.SwiperModules = {
    Navigation,
};

Alpine.start();
