const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.tsx',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {  
                'java':                 '#2D9595',
                'medium-turquoise': '#3DCCCC',
                'teal':             '#008080',
                'robins-egg-blue':  '#00CCCC',
                'serpra-blue':      '#004D4D',
            }
        },
    },
    plugins: [require('@tailwindcss/forms')],
};
