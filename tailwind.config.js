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
                'brand-cream': '#fffcf1',
                'brand-green': '#51934b',
                'brand-gold': '#e8b92a',
            }
        },
    },
    plugins: [],
}
