(function() {
    "use strict";

    window.addEventListener('scroll', function() {
        if (window.pageYOffset >= document.querySelector('.wsuheader').offsetHeight) {
            document.getElementById('panel').style.marginTop = document.querySelector('.menu-top-container .row.flex').offsetHeight + 'px';
            document.querySelector('.menu-top-container').classList.add('w-full');
            document.querySelector('.menu-top-container').classList.add('fixed');
            document.querySelector('.menu-top-container').classList.add('pin-t');
            document.querySelector('.menu-top-container').classList.add('z-10');
        } else if(window.pageYOffset < document.querySelector('.wsuheader').offsetHeight) {
            document.getElementById('panel').style.marginTop = '0px';
            document.querySelector('.menu-top-container').classList.remove('w-full');
            document.querySelector('.menu-top-container').classList.remove('fixed');
            document.querySelector('.menu-top-container').classList.remove('pin-t');
            document.querySelector('.menu-top-container').classList.remove('z-10');
        }
    });
})();
