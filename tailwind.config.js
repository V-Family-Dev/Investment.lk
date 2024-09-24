/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                primary: "rgba(249, 252, 255, 1)", // Custom primary color-white
                secondary: "rgba(234, 240, 245, 1)", // Custom secondary color-lightgray
                accent: "rgba(255, 223, 0, 1)", // Custom accent color-yellow
                bcolor: "rgba(255, 255, 255, 1)",
                darkblue: "rgba(9, 34, 56, 1)",
                darkblue2: "rgba(29, 58, 83, 1)",
                green: "rgba(46, 179, 36, 1)",
                gray: "rgba(134, 140, 146, 1)",
            },
            screens: {
                'custom-900': { 'max': '900px' },
                'custom-470': { 'max': '470px' },
                'max-sm': { 'max': '640px' },    // max-width for small screens
                'max-md': { 'max': '768px' },    // max-width for medium screens
                'max-lg': { 'max': '1024px' },   // max-width for large screens
                'max-xl': { 'max': '1280px' },   // max-width for extra-large screens
                'max-2xl': { 'max': '1536px' },  // max-width for 2XL screens
        // Add your custom min-width breakpoints below if needed
              },
        },
    },
    plugins: [],
};
