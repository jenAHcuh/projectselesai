document.addEventListener("DOMContentLoaded", function () {
    const shopContent = document.getElementById("shop-content");
    if (!shopContent) return;

    // LOAD SHOP CONTENT
    function loadShop(url, updateHistory = true) {
        shopContent.classList.add("loading");

        fetch(url, {
            headers: {
                "X-Requested-With": "XMLHttpRequest",
                Accept: "text/html",
            },
        })
            .then((response) => {
                if (!response.ok) throw new Error("Failed to load shop.");
                return response.text();
            })
            .then((html) => {
                const doc = new DOMParser().parseFromString(html, "text/html");
                const newContent = doc.querySelector("#shop-content");

                if (!newContent) throw new Error("#shop-content not found.");

                shopContent.innerHTML = newContent.innerHTML;

                if (updateHistory) history.pushState({}, "", url);

                initializeShop();
                shopContent.classList.remove("loading");
            })
            .catch((error) => {
                console.error("Shop error:", error);
                shopContent.classList.remove("loading");
                window.location.href = url;
            });
    }

    // INITIALIZE FILTER DROPDOWNS AND PRODUCT IMAGES
    function initializeShop() {
        shopContent.querySelectorAll(".filter-dropdown").forEach((dropdown) => {
            dropdown.dataset.animating = "false";
        });

        shopContent.querySelectorAll(".product-image img").forEach((img) => {
            const container = img.closest(".product-image");
            if (!container) return;

            const updateImage = () => {
                container.classList.toggle("loaded", img.naturalWidth > 0);
            };

            if (img.complete) {
                updateImage();
            } else {
                img.addEventListener("load", updateImage, { once: true });
                img.addEventListener("error", updateImage, { once: true });
            }
        });
    }

    // ONE CLICK HANDLER: DROPDOWNS, FILTERS, SORTING, PAGINATION
    shopContent.addEventListener("click", function (event) {
        const summary = event.target.closest(".filter-dropdown > summary");

        if (summary && shopContent.contains(summary)) {
            event.preventDefault();

            const dropdown = summary.closest(".filter-dropdown");
            const content = dropdown.querySelector(".filter-content");

            if (!content || dropdown.dataset.animating === "true") return;

            dropdown.dataset.animating = "true";

            const opening = !dropdown.open;

            if (opening) {
                dropdown.open = true;
                content.style.height = "0px";
                content.style.opacity = "0";
                content.style.paddingTop = "0px";

                content.offsetHeight;

                const height = content.scrollHeight;

                requestAnimationFrame(() => {
                    content.style.height = height + "px";
                    content.style.opacity = "1";
                    content.style.paddingTop = "20px";
                });
            } else {
                content.style.height = content.scrollHeight + "px";
                content.offsetHeight;

                content.style.height = "0px";
                content.style.opacity = "0";
                content.style.paddingTop = "0px";
            }

            const finish = (e) => {
                if (e.target !== content || e.propertyName !== "height") return;

                content.removeEventListener("transitionend", finish);

                if (!opening) dropdown.open = false;
                content.style.height = opening ? "auto" : "0px";
                dropdown.dataset.animating = "false";
            };

            content.addEventListener("transitionend", finish);

            // Fallback if no height transition occurs
            setTimeout(() => {
                if (dropdown.dataset.animating !== "true") return;

                content.removeEventListener("transitionend", finish);

                if (!opening) dropdown.open = false;
                content.style.height = opening ? "auto" : "0px";
                dropdown.dataset.animating = "false";
            }, 400);

            return;
        }

        const link = event.target.closest("a");
        if (!link) return;

        if (
            event.ctrlKey ||
            event.metaKey ||
            event.shiftKey ||
            event.altKey ||
            link.target === "_blank"
        )
            return;

        const url = new URL(link.href, location.origin);
        if (url.pathname !== "/shop") return;

        event.preventDefault();
        loadShop(url.href);
    });

    // SEARCH
    shopContent.addEventListener("submit", function (event) {
        const form = event.target.closest(".search-form");
        if (!form) return;

        event.preventDefault();

        const url = new URL(form.action, location.origin);

        new FormData(form).forEach((value, key) => {
            if (value !== "") {
                url.searchParams.set(key, value);
            } else {
                url.searchParams.delete(key);
            }
        });

        url.searchParams.delete("page");
        loadShop(url.href);
    });

    // BACK / FORWARD
    window.addEventListener("popstate", () => {
        loadShop(location.href, false);
    });

    initializeShop();
});
