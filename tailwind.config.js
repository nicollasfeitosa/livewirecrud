const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors');

module.exports = {
    purge: {
        content: [
            './vendor/laravel/jetstream/**/*.blade.php',
            './storage/framework/views/*.php',
            './resources/views/**/*.blade.php',
        ]
    },

    theme: {
        extend: {
            colors: {
                primary: colors.indigo,
                'cool-gray': colors.coolGray,
            },

            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    variants: {
        extend: {
            opacity: ['responsive', 'hover', 'focus', 'disabled'],
            textColor: ['group-hover'],
            backgroundColor: ['even', 'odd', 'hover'],
            scale: ['active'],
            boxShadow: ['hover', 'active'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
