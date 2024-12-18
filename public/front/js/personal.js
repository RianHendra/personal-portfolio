document.querySelectorAll('.menu-btn').forEach((button) => {
    button.addEventListener('click', (e) => {
        document.querySelector('.menu-btn.active').classList.remove('active');
        e.target.classList.add('active');

        const category = e.target.textContent.toLowerCase();
        document.querySelectorAll('.portfolio-item').forEach((item) => {
            if (category === 'all' || item.dataset.category === category) {
                item.style.display = 'block';
            } else {
                item.style.display = 'none';
            }
        });
    });
});
