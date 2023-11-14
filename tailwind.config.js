/** @type {import('tailwindcss').Config} */

export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {
    extend: {
      fontFamily: {
        NotoSans: ['Noto Sans', 'sans-serif'],
      },

    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}

