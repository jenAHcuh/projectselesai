document.addEventListener("DOMContentLoaded", function () {
    const toggle = document.getElementById("protectionToggle");

    if (!toggle) return;

    toggle.addEventListener("click", function () {
        this.classList.toggle("active");

        this.setAttribute(
            "aria-pressed",
            this.classList.contains("active") ? "true" : "false",
        );
    });
});
