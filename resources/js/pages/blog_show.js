import Swiper, {Navigation} from 'swiper';
import 'swiper/css';
import 'swiper/css/navigation';

// init Swiper:
document.addEventListener('DOMContentLoaded', (e) => {
    let sliderNode = document.getElementsByClassName('slider');
    if (sliderNode.length !== 0) {
        const homeSlider = new Swiper(sliderNode[0], {
            // configure Swiper to use modules
            modules: [Navigation],
            navigation: {
                nextEl: '.slider .slider-btn-next',
                prevEl: '.slider .slider-btn-prev',
            },
            loop: true,
        });
    }
});

