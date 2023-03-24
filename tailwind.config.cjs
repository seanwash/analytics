/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './resources/views/app.blade.php',
        './resources/js/**/*.tsx',
    ],
    theme: {
        extend: {},
    },
    plugins: [
        require('@tailwindcss/forms')
    ],
};
