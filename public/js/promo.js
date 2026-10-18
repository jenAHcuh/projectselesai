document.addEventListener("DOMContentLoaded", function () {
    const countdown = document.getElementById("promo-countdown");

    if (!countdown) return;

    let endTime = sessionStorage.getItem("experimentPromoEndTime");

    if (!endTime) {
        endTime = Date.now() + 10 * 60 * 1000;

        sessionStorage.setItem("experimentPromoEndTime", endTime);
    }

    function updateCountdown() {
        const remaining = Math.max(0, Number(endTime) - Date.now());

        const totalSeconds = Math.floor(remaining / 1000);

        const minutes = Math.floor(totalSeconds / 60);
        const seconds = totalSeconds % 60;

        countdown.textContent =
            String(minutes).padStart(2, "0") +
            ":" +
            String(seconds).padStart(2, "0");

        if (totalSeconds <= 0) {
            endTime = Date.now() + 10 * 60 * 1000;

            sessionStorage.setItem("experimentPromoEndTime", endTime);
        }
    }

    updateCountdown();

    setInterval(updateCountdown, 1000);
});
