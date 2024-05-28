const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
         colors: {
              main: {
                light: '#D0FBF8',
                DEFAULT: '#15ebde'
              },
              gray: {
                light: '#999999',
                DEFAULT: '#999999'
              },
              black: {
                DEFAULT: '#555555'
              },
              orange: {
                DEFAULT: '#FF6347'
              }
            },
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
