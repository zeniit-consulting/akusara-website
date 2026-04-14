// Counter animation when element comes into view
document.addEventListener("DOMContentLoaded", function () {
    const counters = document.querySelectorAll("[data-target]");

    const observerOptions = {
        threshold: 0.1, // Lower threshold - trigger when 10% of element is visible
        rootMargin: "50px", // Start animation 50px before element enters viewport
    };

    const observer = new IntersectionObserver(function (entries) {
        entries.forEach((entry) => {
            if (
                entry.isIntersecting &&
                !entry.target.classList.contains("counted")
            ) {
                const target = parseInt(entry.target.dataset.target);
                const element = entry.target;
                const hasPlus = entry.target.dataset.hasSuffix === "true";

                // Reset to 0 first, then count
                element.textContent = "0" + (hasPlus ? "+" : "");

                // Count from 0 to target
                animateCounter(element, 0, target, 2000, hasPlus);
                element.classList.add("counted"); // Prevent recounting
            } else if (!entry.isIntersecting) {
                // Reset when element leaves viewport
                entry.target.classList.remove("counted");
            }
        });
    }, observerOptions);

    counters.forEach((counter) => observer.observe(counter));
});

function animateCounter(element, start, end, duration, hasSuffix = false) {
    const range = end - start;
    const increment = range / (duration / 16); // 60fps
    let current = start;

    const timer = setInterval(() => {
        current += increment;
        if (current >= end) {
            current = end;
            clearInterval(timer);
        }

        const displayValue = Math.floor(current);
        element.textContent = displayValue + (hasSuffix ? "+" : "");
    }, 16);
}
