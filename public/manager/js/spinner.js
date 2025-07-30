window.addEventListener('load', function () {
    const spinner = document.getElementById('page-load-spinner');
    if (spinner) {
        spinner.classList.add('hide');
        setTimeout(() => spinner.remove(), 500);
    }
});