DOMLoadedFunctions.push({
    call: () => {
        let sliderNode = $('.slider');
        if (sliderNode.length !== 0) {
            const homeSlider = new Swiper(sliderNode[0], {
                navigation: {
                    nextEl: '.slider .slider-btn-next',
                    prevEl: '.slider .slider-btn-prev',
                },
                loop: true,
                speed: 500,
                on: {
                    init: function () {
                        sliderNode[0].classList.add('loaded');
                        setTimeout(() => {
                            sliderNode[0].classList.add('hide-overlay');
                        }, 400);
                    }
                }
            });
        }
    }
})
