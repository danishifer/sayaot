const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    purge: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                // sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            fontSize: {
                xs: ['0.75rem', {lineHeight: '1rem'}],
                sm: ['0.875rem', {lineHeight: '1.25rem'}],
                base: ['1rem', {lineHeight: '1.5rem'}],
                lg: ['1.125rem', {lineHeight: '1.75rem'}],
                xl: ['1.25rem', {lineHeight: '1.75rem'}],
                '2xl': ['1.5rem', {lineHeight: '2rem'}],
                '3xl': ['1.875rem', {lineHeight: '2.25rem'}],
                '4xl': ['2.25rem', {lineHeight: '2.5rem'}],
                '5xl': ['3rem', {lineHeight: '1'}],
                '6xl': ['3.75rem', {lineHeight: '1'}],
                '7xl': ['4.5rem', {lineHeight: '1'}],
                '8xl': ['6rem', {lineHeight: '1'}],
                '9xl': ['8rem', {lineHeight: '1'}],
            },
            colors: {
                primary: {
                    lighter: '#F291AA',
                    light: '#f2557c',
                    DEFAULT: '#E43964',
                    dark: '#D6365B',
                },
                accent: '#6B8199'
            },
            gridTemplateColumns: {
                'calendar': '64px repeat(6, 1fr)'
            }
        },
    },

    variants: {
        extend: {
            opacity: ['disabled'],
            backgroundColor: ['responsive', 'dark', 'group-hover', 'focus-within', 'hover', 'focus', 'disabled'],
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
