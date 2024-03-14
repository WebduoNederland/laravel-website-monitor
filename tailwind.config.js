/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'nav-active': '#1A1B2B',
                'primary': '#50C9CE',
                'primary-hover': '#70D2D6',
            },
            fontFamily: {
                'figtree': ['Figtree', 'ui-sans-serif', 'system-ui', '-apple-system', 'BlinkMacSystemFont', 'Segoe UI', 'Roboto', 'Helvetica Neue', 'Arial', 'Noto Sans', 'sans-serif', 'Apple Color Emoji', 'Segoe UI Emoji', 'Segoe UI Symbol', 'Noto Color Emoji'],
            },
        },
    },
    plugins: [
        require('@tailwindcss/forms')({
            strategy: 'base'
        }),
    ],
}
