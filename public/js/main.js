let $app = $('#app');

const setMobileVersionHookFunctions = [];
const setPcVersionHookFunctions = [];
const resizeDeviceHookFunctions = [];
const DOMLoadedFunctions = [];
const pressEscapeKeyHookFunctions = [];
const documentClickHookFunctions = [];

const DEVICE_PC = 'pc';
const DEVICE_MOBILE = 'mobile';

const helper = {
    device: undefined,
    hooks: {
        DOMContentLoaded: () => {
            DOMLoadedFunctions.map((functionObject, index) => {
                functionObject.call(functionObject.params);
            });
        },
        resize: () => {
            resizeDeviceHookFunctions.map((functionObject, index) => {
                functionObject.call(functionObject.params);
            });
        },
        setMobileVersion: () => {
            setMobileVersionHookFunctions.map((functionObject, index) => {
                functionObject.call(functionObject.params);
            });

            $app.removeClass(`${DEVICE_PC}`);
            $app.addClass(`${DEVICE_MOBILE}`);
        },
        setPcVersion: () => {
            setPcVersionHookFunctions.map((functionObject, index) => {
                functionObject.call(functionObject.params);
            });

            $app.removeClass(`${DEVICE_MOBILE}`);
            $app.addClass(`${DEVICE_PC}`);
        },
        pressEscape: () => {
            pressEscapeKeyHookFunctions.map((functionObject, index) => {
                functionObject.call(functionObject.params);
            });
        },
        documentClick: (event) => {
            documentClickHookFunctions.map((functionObject, index) => {
                functionObject.call(functionObject.params, event);
            });
        }
    }
};


$(document).ready(() => {
    helper.hooks.DOMContentLoaded();


    function initDevice() {
        const windowInnerWidth = window.innerWidth;
        /* Если будет необходимость точно идентифицировать устройство юзера
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            if (windowInnerWidth < 1201) {
                return "mobile";
            }
        }*/

        if (windowInnerWidth < 1024) {
            return {
                type: DEVICE_MOBILE,
                width: windowInnerWidth
            };
        }

        return {
            type: DEVICE_PC,
            width: windowInnerWidth
        };
    }
    helper.device = initDevice();

    function adaptive() {
        if (helper.device.type === DEVICE_PC && !document.querySelector('#app').classList.contains(DEVICE_PC)) {
            helper.hooks.setPcVersion();
        }
        else if (helper.device.type === DEVICE_MOBILE && !document.querySelector('#app').classList.contains(DEVICE_MOBILE)) {
            helper.hooks.setMobileVersion();
        }

        helper.hooks.resize();
    }
    adaptive();


    window.addEventListener('resize', (event) => {
        helper.device = initDevice();
        adaptive();
    });

    window.addEventListener('click', (e) => {
        helper.hooks.documentClick(e);
    });

    $(document).on('keyup', function(e) {
        if ( e.key == "Escape" ) {
            helper.hooks.pressEscape();
        }
    });
});


setPcVersionHookFunctions.push({
    call: () => {
        // Навигация в шапке сайта
        let timer;
        $headerNavItem = $('.header__secondary-nav__item');
        $headerNavItem.unbind('mouseenter');
        $headerNavItem.unbind('mouseout');
        $headerNavItem.unbind('click');

        $headerNavItem.bind('mouseenter', (e) => {
            /**
             * Начать отсчёт таймера, и если пользователь не навёл на область submenu в течение пары секунд - закрыть.
             * Если навёл - удаляем таймер, и если курсор вне области меню - закрываем его также
             */
            let $currentNavItem = $(e.currentTarget);
            let $submenu = $currentNavItem.find('.header__submenu');
            if ($submenu.length !== 0) {
                $submenu.addClass('open');
            }
        });
        $headerNavItem.bind('mouseout', (e) => {
            let $currentNavItem = $(e.currentTarget);
            let $submenu = $currentNavItem.find('.header__submenu');
            if ($submenu.length !== 0) {
                timer = setTimeout(function() {
                    if ($currentNavItem.is(':hover')) {
                        clearTimeout(timer);
                    } else {
                        $submenu.removeClass('open');
                    }
                }, 2000);
            }
        });

        // Удаление кнопки гамбургера
        $app.find('.header__hamburger').off().remove();
    }
});

setMobileVersionHookFunctions.push({
    call: () => {
        let $headerNav = $('.header__nav');

        function openMobileMenu() {
            $headerNav.addClass('open');
            $headerNav.removeClass('closed');

            $app.addClass('scroll-locked');
        }
        function closeMobileMenu() {
            $headerNav.addClass('closed');
            $app.removeClass('scroll-locked');
            setTimeout(() => {
                $headerNav.removeClass('open');
            }, 400);
            // setTimeout(function() {
            //     $headerNav.removeClass('open');
            // }, 400);
        }

        // Отключение действий, которые отрабатывают на пк
        $headerNavItem = $('.header__secondary-nav__item');
        $headerNavItem.unbind('mouseenter');
        $headerNavItem.unbind('mouseout');
        $headerNavItem.unbind('click');
        $headerNavItem.find('.header__submenu').removeClass('open');

        // Формирование мобильного меню
        let $header = $('header.header');
        if ($header.find('.header__hamburger').length === 0) {
            $header.append(`<div class="header__hamburger">
                menu
            </div>`);

            $app.find('.header__hamburger').bind('click', (e) => {
                if ($headerNav.hasClass('open')) {
                    closeMobileMenu();
                } else {
                    openMobileMenu();
                }
            });

            pressEscapeKeyHookFunctions.push({
                call: () => {
                    closeMobileMenu();
                }
            });
        }


        $headerNavItem.bind('click', (e) => {
            let $currentItem = $(e.currentTarget);
            $currentItem.find('.header__submenu').toggleClass('open');
        });
    }
});
