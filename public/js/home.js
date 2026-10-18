document.addEventListener("DOMContentLoaded", function () {
    // =========================
    // COUNTDOWN TIMER
    // =========================
    const timer = document.getElementById("homeCountdown");

    if (timer) {
        const deadline = Date.now() + 3 * 24 * 60 * 60 * 1000;

        const daysElement = document.getElementById("saleDays");
        const hoursElement = document.getElementById("saleHours");
        const minutesElement = document.getElementById("saleMinutes");
        const secondsElement = document.getElementById("saleSeconds");

        function updateCountdown() {
            const remaining = Math.max(0, deadline - Date.now());

            const days = Math.floor(remaining / (1000 * 60 * 60 * 24));
            const hours = Math.floor((remaining / (1000 * 60 * 60)) % 24);
            const minutes = Math.floor((remaining / (1000 * 60)) % 60);
            const seconds = Math.floor((remaining / 1000) % 60);

            if (daysElement) {
                daysElement.textContent = String(days).padStart(2, "0");
            }

            if (hoursElement) {
                hoursElement.textContent = String(hours).padStart(2, "0");
            }

            if (minutesElement) {
                minutesElement.textContent = String(minutes).padStart(2, "0");
            }

            if (secondsElement) {
                secondsElement.textContent = String(seconds).padStart(2, "0");
            }

            if (remaining <= 0) {
                clearInterval(countdownInterval);
            }
        }

        updateCountdown();

        const countdownInterval = setInterval(updateCountdown, 1000);
    }

    // =========================
    // ANIMATION SAAT SCROLL
    // =========================
    function observeOnScroll(selector) {
        const element = document.querySelector(selector);

        if (!element) return;

        const scrollObserver = new IntersectionObserver(
            function (entries) {
                entries.forEach(function (entry) {
                    if (entry.isIntersecting) {
                        element.classList.add("show-on-scroll");
                        scrollObserver.unobserve(element);
                    }
                });
            },
            {
                threshold: 0.2,
            },
        );

        scrollObserver.observe(element);
    }

    // Animasi Instagram
    observeOnScroll(".instagram-container");

    // Animasi countdown
    observeOnScroll(".countdown-banner");
});
