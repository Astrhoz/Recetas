import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                'primary': {
                    DEFAULT: '#eff5fc',
                    '50': '#eff5fc',
                    '100': '#e1ecf8',
                    '200': '#c9ddf4',
                    '300': '#a4c8ec',
                    '400': '#78abe2',
                    '500': '#598cd8',
                    '600': '#4472cc',
                    '700': '#3b5fba',
                    '800': '#354e98',
                    '900': '#2f4479',
                    '950': '#212b4a',
                },
                'secondary': {
                    DEFAULT: '#35274a',
                    '50': '#f2f1fc',
                    '100': '#e7e5fa',
                    '200': '#d4d0f5',
                    '300': '#bdb4ed',
                    '400': '#a895e4',
                    '500': '#997bd9',
                    '600': '#8a61ca',
                    '700': '#7851b1',
                    '800': '#61448f',
                    '900': '#513c73',
                    '950': '#35274a',
                },
            },
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [forms, typography],
};
