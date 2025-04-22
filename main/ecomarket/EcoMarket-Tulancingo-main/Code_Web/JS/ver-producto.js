document.addEventListener('DOMContentLoaded', function() {
    const favoriteIcon = document.querySelector('.favorite-icon');
    const buyButton = document.querySelector('.buy-btn');
    const buyerInfo = document.querySelector('.buyer-info');

    favoriteIcon.addEventListener('click', function() {
        favoriteIcon.classList.toggle('active');
    });

    buyButton.addEventListener('click', function() {
        buyerInfo.classList.remove('hidden');
    });
});
