import defaultTheme from "tailwindcss/defaultTheme";
import forms from "@tailwindcss/forms";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
        "./resources/views/**/*.blade.php",
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Poppins", "sans-serif"],
            },
            animation: {
                floatUp: "floatUp 3s ease-in-out infinite",
                floatDown: "floatDown 3s ease-in-out infinite",
                marquee: "marquee 15s linear infinite",
                marqueeReverse: "marqueeReverse 15s linear infinite",
            },
            keyframes: {
                floatUp: {
                    "0%, 100%": { transform: "translateY(0px)" },
                    "50%": { transform: "translateY(15px)" },
                },
                floatDown: {
                    "0%, 100%": { transform: "translateY(0px)" },
                    "50%": { transform: "translateY(-15px)" },
                },
                marquee: {
                    "0%": { transform: "translateX(0%)" },
                    "100%": { transform: "translateX(-50%)" },
                },
                marqueeReverse: {
                    "0%": { transform: "translateX(-50%)" },
                    "100%": { transform: "translateX(0%)" },
                },
            },
        },
    },

    plugins: [forms],
};
