/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./page-templates/**/*.php",
    "./template-parts/**/*.php",
    "./parts/**/*.php",
    "./inc/**/*.php",
    "./js/**/*.js",
    "./*.php",
    "./test.php",
    "./functions.php"  // explicitly include functions.php
  ],
  /*
  safelist: [
    {
      pattern: /(bg|text|border)-(purple|teal)-(50|100|200|300|400|500|600|700|800|900|950)/,
    }
  ],
  */
  theme: {
    extend: {
      colors: {
        primary: '#4a5568',
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
        'digitalia-yellow': '#ffda00',
      },
      container: {
        center: true,
        padding: '1rem',
      },
      fontFamily: {
        sans: ['Work Sans', 'sans-serif'],
        heading: ['Lexend', 'sans-serif'],
        mono: ['JetBrains Mono', 'monospace'],
      },
    },
  },
  plugins: [],
}
