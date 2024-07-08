document.addEventListener("DOMContentLoaded", ready);


function ready() {
    (function ($) {


        searchOpenMobail();

        function sendForm() {
            const wpcf7Elm = document.querySelectorAll('.wpcf7');
            const popupFormSend = document.querySelector('.popup-form-send');
            for (let i = 0; i < wpcf7Elm.length; i++) {
                if (wpcf7Elm[i]) {
                    wpcf7Elm[i].addEventListener('wpcf7mailsent', function (event) {
                        popupFormSend.classList.add('open');
                        setTimeout(() => {
                            popupFormSend.classList.remove('open');
                        }, 2000)
                    }, false);
                }
            }
        }

        sendForm()

        function burger() {
            const js__headerBurgerClick = document.querySelectorAll('.js__header-burgerclick')
            const js__headerBurger = document.querySelectorAll('.js__header-burger');
            const headerContentJs = document.querySelector('.header-content-js');
            const headerBtn = document.querySelector('.header__btn span');
            const headerNav = document.querySelector('.header__nav');
            const headerTextCatalog = document.querySelector('.header__text-catalog');
            const headerCatalog = document.querySelector('.header__catalog');
            const headerCatalogFon = document.querySelector('.header__catalog-fon');
            const body = document.querySelector('body');
            const lockPaddingValue = window.innerWidth - body.offsetWidth + 'px'; //Получили ширину scroll


            function menuOpen() {
                for (let i = 0; i < 3; i++) {
                    js__headerBurger[i].classList.toggle('open');
                    body.classList.toggle('menu-lock');
                    headerCatalog.classList.toggle('open');
                    headerCatalogFon.classList.toggle('open');

                    if (headerBtn.innerHTML === 'Каталог') {
                        headerBtn.innerHTML = 'Закрыть'
                        headerNav.style.display = 'none';
                        headerTextCatalog.style.display = 'block';
                    } else {
                        headerBtn.innerHTML = 'Каталог'
                        headerNav.style.display = 'block';
                        headerTextCatalog.style.display = 'none';
                    }


                    if (!js__headerBurger[i].classList.contains('open')) {
                        bodyUnlock();
                    } else {
                        bodylock();
                    }
                }
            }

            for (let i = 0; i < js__headerBurgerClick.length; i++) {
                js__headerBurgerClick[i].addEventListener('click', () => {
                    menuOpen()
                });
                headerCatalogFon.addEventListener('click', () => {
                    menuOpen()
                });
            }

            function bodylock() {
                body.style.paddingRight = lockPaddingValue;
                headerContentJs.style.paddingRight = lockPaddingValue;
                body.classList.add('menu-lock')
            };


            function bodyUnlock() {
                body.style.paddingRight = '0px';
                headerContentJs.style.paddingRight = '0px';
                body.classList.remove('menu-lock');
            };
        }

        burger();

        function menuItems() {
            const item = document.querySelectorAll('.header__catalog-list > li.menu-item-has-children');
            const itemLink = document.querySelectorAll('.header__catalog-list > li.menu-item-has-children > a');
            const subMenu = document.querySelectorAll('.header__catalog-list > li > .sub-menu');
            const СatalogItem = document.querySelectorAll('.header__catalog-items li');
            const СatalogItemLink = document.querySelectorAll('.header__catalog-items li a');


            function addIconsMenu() {
                for (let i = 0; i < itemLink.length; i++) {
                    const element = document.createElement('span');
                    element.classList.add('header__catalog-icon');
                    itemLink[i].append(element);
                }
            }

            addIconsMenu();
            const headerCatalogIcon = document.querySelectorAll('.header__catalog-icon');

            for (let i = 0; i < item.length; i++) {
                if (item[i]) {
                    item[i].addEventListener('mouseenter', () => {
                        СatalogItem.forEach((Element => Element.classList.remove('active')));
                        СatalogItem[i].classList.add('active');
                    })
                    item[i].addEventListener('mouseleave', () => {
                        СatalogItem[i].classList.remove('active');
                    })

                    headerCatalogIcon[i].addEventListener('click', (e) => {
                        e.preventDefault();
                        headerCatalogIcon[i].classList.toggle('active')
                        subMenu[i].classList.toggle('open');
                    })
                }
            }

            for (let i = 0; i < itemLink.length; i++) {
                СatalogItemLink[i].innerText = itemLink[i].text;
            }
        }

        menuItems();

        function headerSlider() {
            new Swiper('.header__slider', {
                slidesPerView: 3,
                spaceBetween: 7,
                loop: false,
                /*breakpoints: {
                  // when window width is >= 320px
                  320: {
                    slidesPerView: 2,
                    spaceBetween: 20
                  },
                } */

            });
        }

        headerSlider();


        function homeSlider() {
            new Swiper('.home__slider', {
                // Optional parameters
                slidesPerView: 1,
                autoHeight: true,
                loop: false,
                pagination: {
                    el: '.home__pagination',
                    clickable: true
                },
                // Navigation arrows
                navigation: {
                    nextEl: '.home__next',
                    prevEl: '.home__prev',
                },
                effect: 'fade',
                fadeEffect: {
                    crossFade: true
                },
                /*breakpoints: {
                  // when window width is >= 320px
                  320: {
                    slidesPerView: 2,
                    spaceBetween: 20
                  },
                }*/

            });
        }

        homeSlider();

        function activeElementHover() {
            const box = document.querySelectorAll('.home__box');
            box.forEach((element) => {
                const item = element.querySelectorAll('.home__list-item');
                const img = element.querySelectorAll('.home__img');


                for (let i = 0; i < item.length; i++) {
                    if (item[i]) {
                        item[0].classList.add('active');
                        img[0].classList.add('active');
                        item[i].addEventListener("mouseenter", () => {
                            item.forEach((Element => Element.classList.remove('active')));
                            item[i].classList.add('active');
                            img.forEach((Element => Element.classList.remove('active')));
                            img[i].classList.add('active');
                        })
                    }
                }
            })

        }

        activeElementHover();

        function relatedProducts() {
            new Swiper('.related-products__slider', {
                // Optional parameters
                slidesPerView: 3.5,
                spaceBetween: 10,
                loop: false,
                pagination: {
                    el: '.related-products__pagination',
                    clickable: true
                },
                // Navigation arrows
                navigation: {
                    nextEl: '.related-products__next',
                    prevEl: '.related-products__prev',
                },
                breakpoints: {
                    // when window width is >= 320px
                    320: {
                        slidesPerView: 1.5,
                        spaceBetween: 5,
                    },

                    768: {
                        slidesPerView: 2,
                        spaceBetween: 5,
                    },

                    992: {
                        slidesPerView: 2,
                        spaceBetween: 5,
                    },

                    1200: {
                        slidesPerView: 3.5,
                        spaceBetween: 10,
                    },
                }

            });
        }

        relatedProducts();

        function newsSlider() {
            new Swiper('.news__slider', {
                // Optional parameters
                slidesPerView: 4,
                spaceBetween: 10,
                loop: false,
                pagination: {
                    el: '.news__pagination',
                    clickable: true
                },
                // Navigation arrows
                navigation: {
                    nextEl: '.news__next',
                    prevEl: '.news__prev',
                },
                breakpoints: {
                    // when window width is >= 320px
                    320: {
                        slidesPerView: 1.5,
                        spaceBetween: 8,
                    },

                    992: {
                        slidesPerView: 3,
                        spaceBetween: 10,
                    },

                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 10,
                    },
                }

            });
        }

        newsSlider();

        function certificatesAndLicensesSlider() {
            new Swiper('.certificates-and-licenses__slider', {
                // Optional parameters
                slidesPerView: 4,
                spaceBetween: 10,
                loop: false,
                pagination: {
                    el: '.certificates-and-licenses__pagination',
                    clickable: true
                },
                // Navigation arrows
                navigation: {
                    nextEl: '.certificates-and-licenses__next',
                    prevEl: '.certificates-and-licenses__prev',
                },
                breakpoints: {
                    // when window width is >= 320px
                    320: {
                        slidesPerView: 1.5,
                        spaceBetween: 8,
                    },

                    992: {
                        slidesPerView: 3,
                        spaceBetween: 10,
                    },

                    1200: {
                        slidesPerView: 4,
                        spaceBetween: 10,
                    },
                }

            });
        }

        certificatesAndLicensesSlider();

        function maskPhone() {
            const element = document.querySelectorAll('[type="tel"]');
            const maskOptions = {
                mask: '+7 (000) 000-00-00',
                lazy: false
            }

            for (let i = 0; i < element.length; i++) {
                const mask = new IMask(element[i], maskOptions);
            }
        }

        maskPhone();

        function searchOpenMobail() {
            const elements = document.querySelectorAll('.footer-navigation-mobail__item');
            const content = document.querySelector('.header__search-mobail');


            for (const element of elements) {
                if (element.innerText !== 'Поиск') {
                    continue
                }
                element.addEventListener('click', () => {
                    content.classList.toggle('open');
                })

            }

            for (const element of elements) {
                if (element.innerText !== 'Каталог') {
                    continue
                }
                element.classList.add('js__header-burgerclick');

            }
        }

        function cartPlitkaColumn() {
            const body = document.querySelector('body');


            body.addEventListener('click', (e) => {
                const content = document.querySelector('.products__items');
                const plitka = document.querySelector('.products__kind--plitka');
                const column = document.querySelector('.products__kind--column');
                const element = e.target;


                if (element.classList.contains('products__kind--plitka')) {
                    content.classList.remove(`products__items--column`);
                    content.classList.add(`products__items--tile`);
                    column.classList.remove('active');
                    plitka.classList.add('active');
                } else if (element.classList.contains('products__kind--column')) {
                    content.classList.add(`products__items--column`);
                    content.classList.remove(`products__items--tile`);
                    column.classList.add('active');
                    plitka.classList.remove('active');
                }

                $(document).on("ajaxSend", function () {
                }).on("ajaxComplete", function () {
                    const contentItem = document.querySelector('.products__items');
                    const plitka = document.querySelector('.products__kind--plitka');
                    const column = document.querySelector('.products__kind--column');

                    if (content) {
                        if (content.classList.contains('products__items--tile')) {
                            contentItem.classList.remove('products__items--column');
                            contentItem.classList.add(`products__items--tile`);
                            column.classList.remove('active');
                            plitka.classList.add('active');
                        } else {
                            contentItem.classList.add('products__items--column');
                            contentItem.classList.remove(`products__items--tile`);
                            column.classList.add('active');
                            plitka.classList.remove('active');
                        }
                    }

                });
            });


        }

        cartPlitkaColumn();


        function filterText() {
            const filterTextMore = document.querySelector('.products__sidebar .wpc-see-more-control');
            const filterTextLess = document.querySelector('.products__sidebar .wpc-see-less-control');


            if (filterTextMore) {
                filterTextMore.innerText = 'Еще';
                filterTextLess.innerText = 'Скрыть';
            }
            $(document).on("ajaxSend", function () {

            }).on("ajaxComplete", function () {
                const filterTextMore = document.querySelector('.products__sidebar .wpc-see-more-control');
                const filterTextLess = document.querySelector('.products__sidebar .wpc-see-less-control');
                if (filterTextMore) {
                    filterTextMore.innerText = 'Еще';
                    filterTextLess.innerText = 'Скрыть';
                }
            });
        }

        filterText();

        function sliderSingleProduct() {
            const cardSliderReviews = new Swiper('.product-single__slider-miniatures', {
                // Optional parameters
                slidesPerView: 4,
                spaceBetween: 10,
                grabCursor: true,
            });

            const cardSlider = new Swiper('.product-single__slider', {
                // Optional parameters
                slidesPerView: 1,
                effect: 'fade',
                navigation: {
                    nextEl: '.product-single__next',
                    prevEl: '.product-single__prev',
                },
                fadeEffect: {
                    crossFade: true
                },
                thumbs: {
                    swiper: cardSliderReviews,
                },

            });


        }

        sliderSingleProduct();

        function plusMinusValue() {
            $(document.body).on('click', '.quantity__plus, .quantity__minus', function () { // поле с количеством имеет класс .qty
                let qty = $(this).parent().parent('.quantity').find('.qty');
                let val = parseFloat(qty.val());
                let max = parseFloat(qty.attr('max'));
                let min = parseFloat(qty.attr('min'));
                let step = parseFloat(qty.attr('step'));

                if ($(this).is('.quantity__plus')) {
                    if (max && (max <= val)) {
                        qty.val(max).change();
                        $("[name='update_cart']").removeAttr("disabled").trigger("click");
                    } else {
                        qty.val(val + step).change();
                        $("[name='update_cart']").removeAttr("disabled").trigger("click");
                    }
                } else {
                    if (min && (min >= val)) {
                        qty.val(min).change();
                        $("[name='update_cart']").removeAttr("disabled").trigger("click");
                    } else if (val > 1) {
                        qty.val(val - step).change();
                        $("[name='update_cart']").removeAttr("disabled").trigger("click");
                    }
                }
            });

        }

        plusMinusValue();

        function customSelect() {
            var time = 300,
                trigger = null;
            $('body').on('click', '.select__trigger', function () {
                var drop = $(this).siblings('.select__drop');
                trigger = $(this);
                trigger.toggleClass('active');
                drop.fadeToggle(time);


                $(document).mouseup(function (e) {
                    if (!trigger.is(e.target)
                        && trigger.has(e.target).length === 0
                        && !drop.is(e.target)
                        && drop.has(e.target).length === 0) {
                        trigger.removeClass('active');
                        drop.fadeOut(time);
                    }
                });


            })

            $('.variations select').each(function (selectIndex, selectElement) {

                var select = $(selectElement);
                const selectTrigger = $('.select__trigger span');
                const resetVariations = $('.reset_variations');


                buildSelectReplacements(selectElement);

                resetVariations.on('click', () => {
                    selectTrigger.text('Выбрать опцию');
                })

                select.parent().on('click', '.radioControl', function () {
                    const elementValue = $(this).parent().parent().parent().find('.select__trigger span');


                    const selectDrop = $('.select__drop');
                    const selectTrigger2 = $('.select__trigger');
                    var selectedValue,
                        currentlyChecked = $(this).hasClass('checked');
                    $(this).parent().parent().find('.radioControl').removeClass('checked');
                    if (!currentlyChecked) {
                        $(this).addClass('checked');
                        selectedValue = $(this).data('value');
                        elementValue.text(selectedValue);
                        selectDrop.css('display', 'none');
                        selectTrigger2.removeClass('active');
                    } else {
                        selectedValue = '';
                    }

                    select.val(selectedValue);
                    select.find('option').each(function () {
                        $(this).prop('checked', ($(this).val() == selectedValue) ? true : false);
                    });
                    select.trigger('change');
                });
                $('.reset_variations').on('mouseup', function () {
                    $('.radioControl.checked').removeClass('checked');
                });

            });

            $('.variations_form').on('woocommerce_update_variation_values', function () {
                selectValues = {};
                $('.variations_form select').each(function (selectIndex, selectElement) {
                    var id = $(this).attr('id');
                    selectValues[id] = $(this).val();
                    $(this).parent().find('label').remove();

                    //Rebuild Select Replacement Spans
                    buildSelectReplacements(selectElement);

                    //Reactivate Selectd Values
                    $(this).parent().find('span').each(function () {
                        if (selectValues[id] == $(this).data('value')) {
                            $(this).addClass('checked');
                        }
                    });
                });
            });

            function buildSelectReplacements(selectElement) {
                var select = $(selectElement);
                var container = select.parent().hasClass('select__drop') ? select.parent() : $("<div class='select__drop' />");
                select.after(select.parent().hasClass('select__drop') ? '' : container);
                container.addClass(select.attr('id'));
                container.append(select);


                select.find('option').each(function (optionIndex, optionElement, e) {
                    if ($(this).val() == "") return;
                    var label = $("<label />");
                    container.append(label);

                    $("<span class='radioControl' data-value='" + $(this).val() + "'>" + $(this).text() + "</span>").appendTo(label);
                });
            }
        }

        customSelect();

       function checkbox () {
            const element = document.querySelector('.checkout__policy-input');
            if(element) {
                element.checked = true;
                element.parentElement.classList.add('active');

           element.addEventListener('click', function () {
               if(element.checked === true) {
                   element.parentElement.classList.add('active');
               } else {
                   element.parentElement.classList.remove('active');
               }
           });
            }
       }

        checkbox();

       function validationFieldsCheckout() {
           $( 'body' ).on( 'blur change', '#billing_last_name, #billing_first_name', function(){
               const wrapper = $(this).closest( '.form-row' );
               // you do not have to removeClass() because Woo do it in checkout.js
               if( /\d/.test( $(this).val() ) ) { // check if contains numbers
                   wrapper.addClass( 'woocommerce-invalid' ); // error
               } else {
                   wrapper.addClass( 'woocommerce-validated' ); // success
               }
           });

           $( 'body' ).on( 'blur change', '#billing_phone', function(){

               const wrapper = $(this).closest( '.form-row' );
               // you do not have to removeClass() because Woo do it in checkout.js
               if(/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){10,14}(\s*)?$/.test( $(this).val() ) ) { // check if contains numbers
                   wrapper.addClass( 'woocommerce-validated' ); // success
                   wrapper.removeClass( 'woocommerce-invalid' );
               } else {
                   wrapper.addClass( 'woocommerce-invalid' ); // error
                   wrapper.removeClass( 'woocommerce-validated' );
               }
           });
       }

        validationFieldsCheckout();

       function addProductsNotice () {
               const element = document.querySelector('.footer-navigation-mobail__hidden');
           if(element) {
               element.closest('.footer-navigation-mobail__number').style.display = 'none';
           }
           $(document).on("ajaxSend", function () {
               const element = document.querySelector('.footer-navigation-mobail__hidden');
               if(element) {
                   element.closest('.footer-navigation-mobail__number').style.display = 'flex';
               }
           }).on("ajaxComplete", function () {
               console.log('ajaxComplete')
           });


       }

        addProductsNotice();

        function loadMoreNews() {
            const button = $('#loadmore');
            const itemsElementsJs = $('.items-elements-js');
            let paged = button.attr("data-paged");
            let maxPages = button.attr("data-max-pages");

            button.click(function (event) {
                event.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: ajaxurl,
                    data: {
                        paged: paged,
                        action: 'loadmore'
                    },
                    beforeSend: function (xhr) {
                        button.text('Загрузка...');
                    },
                    success: function (data) {
                        paged++;
                        itemsElementsJs.append(data);
                        button.text('Загрузить ещё');
                        if (paged == maxPages) {
                            button.remove();
                        }
                    }
                });
            });
        }

        loadMoreNews();

        function popup() {
            const js__popupLink = document.querySelectorAll('.js__popup-link');
            const js__popupClose = document.querySelectorAll('.js__popup-close');
            const body = document.querySelector('body');


            let unlock = true;

            const timeout = 400;




            for (let i = 0; i < js__popupLink.length; i++) {
                js__popupLink[i].addEventListener('click', (event) => {
                    const popup__name = js__popupLink[i].dataset.modal;
                    const popupCurent = document.querySelector(`[data-popup="${popup__name}"]`);
                    popupOpen(popupCurent);
                    event.preventDefault();
                });
            };


            for (let i = 0; i < js__popupClose.length; i++) {
                js__popupClose[i].addEventListener('click', (event) => {
                    popupClose(js__popupClose[i].closest('.js__popup-open'));
                    event.preventDefault();
                });
            };



            function popupOpen(popupCurent) {
                if (popupCurent && unlock) {
                    const popupActive = document.querySelector('.js__popup-open.open');

                    if (popupActive) {
                        popupClose(popupActive, false);
                    } else {
                        bodylock();
                    }


                    popupCurent.classList.add('open');
                    popupCurent.addEventListener('click', (event) => {
                        if (!event.target.closest('.js__popup-content')) {
                            popupClose(event.target.closest('.js__popup-open'));
                            console.log(true);
                        } else {
                            console.log(false);
                        }
                    });
                };
            }


            function popupClose(popupActive, doUnlock = true) {
                if (unlock) {
                    popupActive.classList.remove('open');

                    if (doUnlock) {
                        bodyUnlock();
                    };
                };
            };


            function bodylock() {
                const lockPaddingValue = window.innerWidth - document.querySelector('body').offsetWidth + 'px'; //Получили ширину scrolla

                body.style.paddingRight = lockPaddingValue;
                body.classList.add('lock');

            };


            function bodyUnlock() {
                setTimeout(function () {
                    body.style.paddingRight = '0px';
                    body.classList.remove('lock');
                }, timeout)
            };
        }

        popup();

        function file() {
            let dropArea = document.getElementById('drop-area');
            let fileElem = document.querySelector('#fileElem');
            let filesDone = 0
            let filesToDo = 0
            let progressBar = document.getElementById('progress-bar')



            ;['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, preventDefaults, false)
            })
            function preventDefaults(e) {
                e.preventDefault()
                e.stopPropagation()
            }


            ;['dragenter', 'dragover'].forEach(eventName => {
                dropArea.addEventListener(eventName, highlight, false)
            })
            ;['dragleave', 'drop'].forEach(eventName => {
                dropArea.addEventListener(eventName, unhighlight, false)
            })
            function highlight(e) {
                dropArea.classList.add('highlight')
            }
            function unhighlight(e) {
                dropArea.classList.remove('highlight')
            }

            dropArea.addEventListener('drop', handleDrop, false)


            fileElem.addEventListener('input', (e) => {
                handleFiles(fileElem.files);
            })



            //Получили файл при перетаскивании
            function handleDrop(e) {
                let dt = e.dataTransfer
                let files = dt.files
                handleFiles(files)
            }
            //Сделали массив из files
            function handleFiles(files) {
                files = [...files]
                initializeProgress(files.length) // <- Добавили эту строку
                files.forEach(previewFile)
            }




            //Добавляем файл
            function previewFile(file) {
                let reader = new FileReader()
                reader.readAsDataURL(file)
                reader.onloadend = function () {
                    dropArea.innerText = file.name;
                }
            }


            function initializeProgress(numfiles) {
                progressBar.value = 0
                filesDone = 0
                filesToDo = numfiles
            }


            function progressDone() {
                filesDone++
                progressBar.value = filesDone / filesToDo * 100
            }

        }

        file();



    })(jQuery);

}






