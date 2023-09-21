export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                'primary': {
                    DEFAULT: '#001F3F',
                    '50': '#809FC9',
                    '100': '#678FBC',
                    '200': '#4F7FAF',
                    '300': '#376FA2',
                    '400': '#1F5F95',
                    '500': '#001F3F',
                    '600': '#001A39',
                    '700': '#001533',
                    '800': '#00102D',
                    '900': '#000B27'
                },
                'secondary': {
                    DEFAULT: '#39CCCC',
                    '50': '#E6F8F8',
                    '100': '#C9F1F1',
                    '200': '#ACEAEA',
                    '300': '#8FE3E3',
                    '400': '#72DCDC',
                    '500': '#39CCCC',
                    '600': '#2FA3A3',
                    '700': '#237A7A',
                    '800': '#175151',
                    '900': '#0B2828'
                },
                'accent-1': {
                    DEFAULT: '#0074D9',
                    '50': '#80BFFF',
                    '100': '#66B2FF',
                    '200': '#4DA5FF',
                    '300': '#3398FF',
                    '400': '#198BFF',
                    '500': '#0074D9',
                    '600': '#0066BF',
                    '700': '#0058A6',
                    '800': '#004A8C',
                    '900': '#003C72'
                },
                'accent-2': {
                    DEFAULT: '#AAAAAA',
                    '50': '#FFFFFF',
                    '100': '#F2F2F2',
                    '200': '#D4D4D4',
                    '300': '#B6B6B6',
                    '400': '#989898',
                    '500': '#AAAAAA',
                    '600': '#8C8C8C',
                    '700': '#6E6E6E',
                    '800': '#505050',
                    '900': '#323232'
                },
                'background': {
                    DEFAULT: '#FAFAFA',
                    '50': '#FFFFFF',
                    '100': '#FFFFFF',
                    '200': '#FFFFFF',
                    '300': '#FDFDFD',
                    '400': '#FBFBFB',
                    '500': '#FAFAFA',
                    '600': '#E9E9E9',
                    '700': '#D8D8D8',
                    '800': '#C7C7C7',
                    '900': '#B6B6B6'
                },
                'text-main': {
                    DEFAULT: '#181818',
                    '50': '#6E6E6E',
                    '100': '#646464',
                    '200': '#5A5A5A',
                    '300': '#505050',
                    '400': '#464646',
                    '500': '#181818',
                    '600': '#0E0E0E',
                    '700': '#040404',
                    '800': '#000000',
                    '900': '#000000'
                },
            },
            fontFamily: {
                'custom': ['B612', 'sans-serif'],
            },
        },
    },

    plugins: [
        // ...
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography'),
        require('@tailwindcss/aspect-ratio'),
    ],
}
