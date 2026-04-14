document.addEventListener("DOMContentLoaded", function () {
    const nav = document.getElementById("siteNavbar");
    const links = nav.querySelectorAll(".nav-link");

    // Section IDs mapping
    const sections = {
        home: { id: "home", isDarkBg: true },
        about: { id: "about", isDarkBg: false },
        services: { id: "services", isDarkBg: true },
        portfolio: { id: "portfolio", isDarkBg: false },
        contact: { id: "contact", isDarkBg: true },
    };

    let currentSection = "home";
    let currentBackgroundType = "dark"; // dark or light

    // Intersection Observer dengan threshold lebih presisi
    // threshold array untuk multiple detection points
    const observerOptions = {
        threshold: [0, 0.25, 0.5, 0.75, 1],
        rootMargin: "-80px 0px -80px 0px", // top dan bottom margin untuk akurasi lebih baik
    };

    const observer = new IntersectionObserver((entries) => {
        // Filter entries yang muncul dan sort berdasarkan intersection ratio
        const visibleEntries = entries
            .filter((entry) => entry.isIntersecting)
            .sort((a, b) => b.intersectionRatio - a.intersectionRatio);

        // Ambil yang paling dominant (highest intersection ratio)
        if (visibleEntries.length > 0) {
            const mostVisible = visibleEntries[0];
            currentSection = mostVisible.target.id;
            currentBackgroundType = sections[mostVisible.target.id]?.isDarkBg
                ? "dark"
                : "light";
            updateNavbarColor();
        }
    }, observerOptions);

    // Observe all sections
    Object.values(sections).forEach((section) => {
        const element = document.getElementById(section.id);
        if (element) observer.observe(element);
    });

    // Theme untuk semua navbar - solid #1800AD background
    const setNavbarPurpleTheme = () => {
        nav.classList.remove(
            "bg-[#1800AD]/10",
            "border-white/30",
            "bg-opacity-10",
        );
        nav.classList.add("bg-[#1800AD]", "border-[#1800AD]");

        links.forEach((link) => {
            link.classList.remove("text-slate-900", "hover:text-slate-600");
            link.classList.add("text-white", "hover:text-blue-100");
        });
    };

    const updateNavbarColor = () => {
        setNavbarPurpleTheme();
    };

    // Initial update
    updateNavbarColor();
});
