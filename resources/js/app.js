
import Swiper from 'swiper';
import {Navigation,Pagination,Autoplay} from "swiper/modules";
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

import Swal from 'sweetalert2'
window.Swal = Swal

Swiper.use([Navigation, Pagination, Autoplay]);

window.Swiper = Swiper


import Quill from 'quill';
import { Delta } from 'quill';
import Link from 'quill/formats/link';
window.Quill = Quill;
window.Delta =Delta;
window.QuillLink = Link;

Quill.register(Link, true);


function initSwiper() {
    document.querySelectorAll('.swiper-initialized').forEach(swiperEl => {
        swiperEl.swiper.destroy(true, true);
    });


    new Swiper('.gallery-slider', {
        modules:[Navigation,Pagination, Autoplay],
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: {
            el: '.swiper-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.galeri-next',
            prevEl: '.galeri-prev',
        },
        breakpoints: {
            640: { slidesPerView: 2 },
            1024: { slidesPerView: 3 },
        },
        effect: 'fade',
        fadeEffect: {
            crossFade: true,
        },
        speed: 800,
        autoplay: {
            delay: 2000,
            disableOnInteraction: false,
        },
    });

    new Swiper('.banner-slider', {
        modules:[Navigation,Pagination],
        loop: true,
        slidesPerView: 1,
        spaceBetween: 20,
        pagination: {
            el: '.banner-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.banner-next',
            prevEl: '.banner-prev',
        },
        autoplay: {
            // delay: 5000,
            disableOnInteraction: false,
        },
        speed: 50,
    });
}

document.addEventListener('livewire:navigated', () => {
    setTimeout(initSwiper, 1000);
});

import Sortable from 'sortablejs';

// Core SortableJS (without default plugins)
import Sortable from 'sortablejs/modular/sortable.core.esm.js';

// Complete SortableJS (with all plugins)
import Sortable from 'sortablejs/modular/sortable.complete.esm.js';

