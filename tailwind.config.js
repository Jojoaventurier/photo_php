module.exports = {
  content: [
    "./src/**/*.php",        // All PHP files
    "./public/**/*.js",       // All JS files
  ],
  theme: {
    colors: { // Force include red
      red: {
        600: '#dc2626',
      }
    },
    extend: {},
  },
  plugins: [],
}
