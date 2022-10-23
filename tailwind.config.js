/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {},
    fontFamily: {
      'sans': ['Neue Haas Grotesk Text Pro', 'Helvetica Neue',
      'Helvetica', 'Inter', 'sans-serif']
    }
  },
  plugins: [],
}
