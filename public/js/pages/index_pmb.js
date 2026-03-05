document.addEventListener("DOMContentLoaded", function () {

    // Gabungkan semua element animasi
    const animatedElements = document.querySelectorAll(".fade-up, .fade-left");

    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {

            if (entry.isIntersecting) {
                entry.target.classList.add("show");
            } else {
                // reset supaya bisa repeat
                entry.target.classList.remove("show");
            }

        });
    }, {
        threshold: 0.25
    });

    animatedElements.forEach(el => observer.observe(el));

});
