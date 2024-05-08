/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./node_modules/flowbite/**/*.js",
    "./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php"
  ],
  theme: {
    extend: {
      screens: {
        'ms' : '300px',
        'xs' : '440px',
        '3xl' : '2000px',
        '4xl' : '3000px',
      },
    },
  },
  plugins: [
    require('flowbite/plugin')
  ],
}

