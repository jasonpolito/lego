const themeColors = require('./theme');
const colors = require('tailwindcss/colors');


process.argv.forEach(function(val, index, array) {
    console.log(index + ': ' + val);
});

const pink = {
    100: "#fed3dc",
    200: "#fda7b9",
    300: "#fd7a96",
    400: "#fc4e73",
    500: "#fb2250",
    DEFAULT: "#fb2250",
    600: "#c91b40",
    700: "#971430",
    800: "#640e20",
    900: "#320710"
};


module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./config/**/*.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        // customColorPalette: {
        //     colors: { primary: themeColors.primary },
        // },
        screens: {

            'sm': '640px',
            // => @media (min-width: 640px) { ... }

            'md': '768px',
            // => @media (min-width: 768px) { ... }

            'lg': '1024px',
            // => @media (min-width: 1024px) { ... }

            'xl': '1280px',
            // => @media (min-width: 1280px) { ... }
        },
        colors: {
            transparent: 'transparent',
            current: 'currentColor',
            black: colors.black,
            white: colors.white,
            primary: {...pink },
            canvas: {
                100: '#99a9bf',
                DEFAULT: '#0F1825'
            },
        },
        extend: {
            transitionDuration: {
                '2000': '2000ms',
            },
            transitionTimingFunction: {
                'out-back': 'cubic-bezier(0.34, 1.56, 0.64, 1)',
            },
            scale: {
                '102': '1.02'
            },
            minHeight: {
                '50vh': '50vh',
                '25vh': '25vh',
            },
            backgroundImage: {
                'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
            },
            lineHeight: {
                '12': '3rem',
                '14': '4rem',
                '16': '5rem',
                '18': '6rem',
                '20': '7rem',
            },
            width: {
                '1/8': 1 / 8 * 100 + '%',
                '1/8': 1 / 8 * 100 + '%',
                '40': '10rem',
                '48': '12rem',
                '105': '105%',
                '150': '150%'
            },
            heigth: {
                '1/8': 1 / 8 * 100 + '%',
                '150': '150%'
            },
            minWidth: {
                'base': '200px',
            }
        },
        variants: {
            extend: {
                transform: ['group-hover', 'group-focus'],
                backgroundColor: ['group-hover', 'group-focus'],
                width: ['group-hover', 'group-focus'],
                translate: ['group-hover', 'group-focus', 'active'],
                scale: ['group-hover', 'group-focus'],
                rotate: ['group-hover', 'group-focus'],
                opacity: ['group-focus'],
                margin: ['last'],
                fontWeight: ['dark'],
            }
        }
    },
    plugins: [
        require("@markusantonwolf/tailwind-css-plugin-custom-color-palette"),
    ],
}