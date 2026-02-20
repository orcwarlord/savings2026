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
                sans: ['Raleway','Figtree', ...defaultTheme.fontFamily.sans],
                heading: ['"Josefin Sans"', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'pfl-pink': {
                    DEFAULT: '#fbd6d7',
                    dark: '#c7999b',
                    light: '#fcdbe0',
                },
                'pfl-ltgreen': {
                    DEFAULT: '#a4d5a6',
                    dark: '#88b08a',
                    light: '#c9e1c9',
                },
                'pfl-green': {
                    DEFAULT: '#2f652f',
                    dark: '#1f401f',
                    light: '#4d7f4d',
                },
                'pfl-dkgr':'#303030',
                'pfl-midgr':'#888888',
                'pfl-ltgr':'#dddddd',
                'pfl-ivory': '#fffff0',
            },
        },
    },

    plugins: [forms],
};
