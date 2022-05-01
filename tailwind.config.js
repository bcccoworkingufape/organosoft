const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors')

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': '#3c924e',
                'primary-light': '#6ec37b',
                'primary-dark': '#006324',
                'body-bg': '#e6e6e8',
                'neutral': colors.gray,
                'white': colors.white,
                'black': colors.black,
            },
            borderRadius: {
                DEFAULT: '0rem',
                'none': '0rem',
                'sm': '0rem',
                'md': '0rem',
                'lg': '0rem',
                'xl': '0rem',
                '2xl': '0rem',
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
