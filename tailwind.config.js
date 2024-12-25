/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            screens: {
                'xs': '375px',
                'sm': '640px',
                'md': '768px',
                'lg': '1024px',
                'xl': '1280px',
                '2xl': '1536px',
            },
            container: {
                center: true,
                padding: {
                    DEFAULT: '1rem',
                    sm: '2rem',
                    md: '3rem',
                    lg: '4rem',
                    xl: '5rem',
                    '2xl': '6rem',
                },
            },
        },
    },
    plugins: [
        require("flowbite-typography"),
        require("flowbite/plugin")({
            wysiwyg: true,
        }),
    ],
    variants: {
        extend: {
            overflow: ['responsive'],
            display: ['responsive'],
            padding: ['responsive'],
            margin: ['responsive'],
            width: ['responsive'],
        }
    },
};