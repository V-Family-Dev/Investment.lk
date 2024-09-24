import './bootstrap';
module.exports = {
    theme: {
      extend: {
        screens: {
          'max-sm': { 'max': '640px' },    // max-width for small screens
          'max-md': { 'max': '768px' },    // max-width for medium screens
          'max-lg': { 'max': '1024px' },   // max-width for large screens
          'max-xl': { 'max': '1280px' },   // max-width for extra-large screens
          'max-2xl': { 'max': '1536px' },  // max-width for 2XL screens
        },
      },
    },
    plugins: [],
  }
