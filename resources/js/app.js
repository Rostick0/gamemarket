(function () {
    window.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('input[type="tel"]').forEach(function (input) {
            let keyCode;
            function mask(event) {
                event.keyCode && (keyCode = event.keyCode);
                let pos = this.selectionStart;

                if (pos < 3) event.preventDefault();

                let matrix = "+7 (___) ___ ____",
                    i = 0,
                    def = matrix.replace(/\D/g, ""),
                    val = this.value.replace(/\D/g, ""),
                    new_value = matrix.replace(/[_\d]/g, function (a) {
                        return i < val.length ? val.charAt(i++) || def.charAt(i) : a
                    });

                i = new_value.indexOf("_");
                if (i != -1) {
                    i < 5 && (i = 3);
                    new_value = new_value.slice(0, i)
                }

                let reg = matrix.substr(0, this.value.length).replace(/_+/g,
                    function (a) {
                        return "\\d{1," + a.length + "}"
                    }).replace(/[+()]/g, "\\$&");

                reg = new RegExp("^" + reg + "$");

                if (!reg.test(this.value) || this.value.length < 5 || keyCode > 47 && keyCode < 58) this.value = new_value;
            }

            if (!input.value.length) {
                input.value = '+7 ';
            }

            input.addEventListener("input", mask, false);
            input.addEventListener("keydown", mask, false);
        });
    });
})();

(function () {
    new Swiper(".catalog-game__swiper", {
        slidesPerView: 4,
        spaceBetween: 30,
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
})();