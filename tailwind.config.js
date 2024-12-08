/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js,php}"],
  theme: {
    extend: {
      fontFamily: {
        BeVietnam: ['Be Vietnam Pro', 'sans-serif']
      },
      colors: {
        Cam_Ananas: '#F15E2C',
        prd_color1: '#A59C8D',
        be: '#FDFBEF',
        prd_color4: '#475852',
        prd_color5: '#056863',
        prd_color6: '#EACFA0',
        prd_color7: '#C3C3C3',
        prd_color8: '#1B497B',
        nau: '#86543B',
        prd_color10: '#6E9952',
        prd_color11: '#E8662C',
        prd_color12: '#F1788B',
      },
    },
  },
  plugins: [],
}

