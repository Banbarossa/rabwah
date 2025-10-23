// Import Swiper
// import Swiper from 'swiper/bundle';
// import 'swiper/css/bundle';

import Swiper from 'swiper';
import {Navigation,Pagination,Autoplay} from "swiper/modules";
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

Swiper.use([Navigation, Pagination, Autoplay]);

// baru expose ke window
window.Swiper = Swiper



function initSwiper() {
    document.querySelectorAll('.swiper-initialized').forEach(swiperEl => {
        swiperEl.swiper.destroy(true, true);
    });


    new Swiper('.gallery-slider', {
        modules:[Navigation,Pagination],
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
        }
    });

    new Swiper('.banner-slider', {
        modules:[Navigation,Pagination],
        loop: true,
        slidesPerView: 1,
        pagination: {
            el: '.banner-pagination',
            clickable: true,
        },
        navigation: {
            nextEl: '.banner-next',
            prevEl: '.banner-prev',
        },
        autoplay: {
            delay: 5000,
            disableOnInteraction: false,
        },
        speed: 300,
    });
    console.log(typeof Swiper);
}

document.addEventListener('livewire:navigated', () => {
    setTimeout(initSwiper, 1000);
    console.log('livewire navigated')
});

