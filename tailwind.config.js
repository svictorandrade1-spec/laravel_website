/** @type {import('tailwindcss').Config} */
import flowbite from 'flowbite/plugin'

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js"
    ],

    corePlugins: {
        preflight: false,
    },

    theme: {
        extend: {},
    },

    plugins: [
        flowbite
    ],
}