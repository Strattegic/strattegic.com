module.exports = {
  purge: ['./index2.html', './src/**/*.{vue,js,ts,jsx,tsx}'],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
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
