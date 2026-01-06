module.exports = {
  purge: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        'siakad-purple': '#2d2463',
        'siakad-light-purple': '#4c3f91',
        'siakad-bg': '#f3f4f9',
      },
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
