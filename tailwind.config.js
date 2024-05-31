/** @type {import('tailwindcss').Config} */
export default {
    theme: {
        extend: {
            backgroundColor: {
                'custom-blue': 'rgba(63, 131, 248, 0.5)',
            },
        },
    },
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],

    theme: {
        extend: {},
    },
    plugins: [
        require('flowbite/plugin')
    ]
}

