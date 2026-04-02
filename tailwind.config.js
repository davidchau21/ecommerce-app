import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Inter', ...defaultTheme.fontFamily.sans],
                headline: ['Manrope', ...defaultTheme.fontFamily.sans],
                body: ['Inter', ...defaultTheme.fontFamily.sans],
                label: ['Inter', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                "primary-fixed-dim": "#b7c4ff",
                "inverse-on-surface": "#f0f1f2",
                "outline": "#737688",
                "secondary": "#4459a8",
                "on-error-container": "#93000a",
                "surface-dim": "#d9dadb",
                "on-secondary-fixed": "#001452",
                "on-surface": "#191c1d",
                "on-tertiary-container": "#ffddd5",
                "tertiary-container": "#bf3003",
                "on-tertiary-fixed": "#3c0800",
                "inverse-surface": "#2e3132",
                "tertiary-fixed-dim": "#ffb4a1",
                "surface-container-highest": "#e1e3e4",
                "on-background": "#191c1d",
                "on-tertiary-fixed-variant": "#891e00",
                "secondary-fixed": "#dde1ff",
                "error": "#ba1a1a",
                "on-primary-fixed": "#001452",
                "surface": "#f8f9fa",
                "on-error": "#ffffff",
                "on-secondary-container": "#253b89",
                "background": "#f8f9fa",
                "on-secondary": "#ffffff",
                "on-primary-container": "#dfe3ff",
                "surface-container-low": "#f3f4f5",
                "inverse-primary": "#b7c4ff",
                "surface-container": "#edeeef",
                "primary": "#003ec7",
                "on-primary": "#ffffff",
                "tertiary": "#952200",
                "secondary-fixed-dim": "#b7c4ff",
                "surface-container-high": "#e7e8e9",
                "secondary-container": "#95aafe",
                "on-tertiary": "#ffffff",
                "surface-bright": "#f8f9fa",
                "tertiary-fixed": "#ffdbd2",
                "surface-container-lowest": "#ffffff",
                "on-primary-fixed-variant": "#0038b6",
                "on-secondary-fixed-variant": "#2b418f",
                "error-container": "#ffdad6",
                "on-surface-variant": "#434656",
                "surface-variant": "#e1e3e4",
                "primary-container": "#0052ff",
                "primary-fixed": "#dde1ff",
                "outline-variant": "#c3c5d9",
                "surface-tint": "#004ced"
            },
        },
    },

    plugins: [forms],
};
