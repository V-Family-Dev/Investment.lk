import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: "rgba(249, 252, 255, 1)",
                secondary: "rgba(234, 240, 245, 1)",
                accent: "rgba(255, 223, 0, 1)",
                bcolor: "rgba(255, 255, 255, 1)",
                darkblue: "rgba(9, 34, 56, 1)",
                darkblue2: "rgba(29, 58, 83, 1)",
                green: "rgba(46, 179, 36, 1)",
                gray: "rgba(134, 140, 146, 1)",
            },
            screens: {

                "custom-900": { max: "900px" },
                "custom-470": { max: "470px" },
            },
            animation: {
                "loop-scroll": "loop-scroll 50s linear infinite",
            },
            keyframes: {
                "loop-scroll": {
                    from: { transform: "translateX(0)" },
                    to: { transform: "translateX(-100%)" },
                },
            },
        },
    },

    plugins: [forms],
};
