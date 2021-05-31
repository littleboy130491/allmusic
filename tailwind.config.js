const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        minWidth: {
            '0': '0',
            '1/4': '25%',
            '1/5' : '20%',
            '1/2': '50%',
            '3/4': '75%',
            'full': '100%',
        },

        flex: {
            '20': '0 0 20%',
            '25': '0 0 25%',
            '33': '0 0 33%',
            '50': '0 0 50%',
            '75': '0 0 75%',
        },

        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            backgroundImage: theme => ({
                'home-hero': "url('/storage/home-hero-bg.jpg')",
            })
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
