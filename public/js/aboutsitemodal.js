/* Модальное окно о сайте*/
setTimeout(function () {
    let aboutModal = document.querySelector('.about-site-overlay');

    function openAboutModal() {
        aboutModal.classList.add('active');
        attachAboutEvents();
    }

    function closeAboutModal() {
        aboutModal.classList.remove('active');
        detachAboutEvents();
    }

    function attachAboutEvents() {
        document.querySelector('.about-site-overlay-close').addEventListener('click', closeAboutModal);
        document.addEventListener('keydown', closeEscape);
    }

    function detachAboutEvents() {
        document.querySelector('.about-site-overlay-close').removeEventListener('click', closeAboutModal);
        document.removeEventListener('keydown', closeAboutEscape);
    }

    function closeAboutEscape(event) {
        if (event.code === 'Escape') {
            closeAboutModal();
        }
    }

    openAboutModal();
}, 5000);



/* END Модальное окно*/
