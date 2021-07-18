module.exports = {
  purge: ['./index2.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  darkMode: 'class', // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        orange: '#EA7317',
        yellow: '#FEC601',
        black: '#443d3d',
        white: '#fff',
        darkgray: '',
        blue: {
          100: '#2364AA',
          300: '#3DA5D9',
          600: '#73BFB8',
        },
      },
      fontFamily: {
        serif: ['Noto Serif', 'serif'],
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
