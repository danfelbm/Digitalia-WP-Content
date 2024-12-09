/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.php",
    "./**/*.php",
    "./templates/**/*.php",
    "./template-parts/**/*.php",
    "./parts/**/*.php",
    "./inc/**/*.php",
    "./js/**/*.js"
  ],
  theme: {
    extend: {
      fontFamily: {
        sans: ['Work Sans', 'sans-serif'],
        heading: ['Lexend', 'sans-serif'],
        mono: ['JetBrains Mono', 'monospace'],
      },
      colors: {
        red: {
          50: '#fff0f4',
          100: '#ffe1e9',
          200: '#ffc3d4',
          300: '#ff95b3',
          400: '#ff4d7f',
          500: '#ff0044',  // main color
          600: '#e6003d',
          700: '#bf0032',
          800: '#99002a',
          900: '#800023',
          950: '#4c0014',
        },
      },
    },
  },
  plugins: [],
}
