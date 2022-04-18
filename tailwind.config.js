const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  content: [
    './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
    './storage/framework/views/*.php',
    './resources/views/**/*.blade.php',
  ],
  // corePlugins: [
  //   'backgroundColor',
  // ],

  theme: {
    extend: {
      colors: {
        'gray-background': '#f7f8fc',
      },
      spacing: {
        70: '17.5rem',
        175: '43.75rem',
        104: '26rem',
      },
      maxWidth: {
        custom: '62.5rem',

      },
      boxShadow: {
        card: '4px  4px 15px 0 rgba(36, 37, 38, 0.08)',
        dialog: '3px  4px 15px 0 rgba(36, 37, 38, 0.22)',
      },
      fontFamily: {
        sans: ['Roboto', ...defaultTheme.fontFamily.sans],
      },
    },
  },

  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/line-clamp'),
  ],
};
