/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ["./src/**/*.{html,js}"],
  theme: {
    extend: {
      fontFamily: {
        BeVietnam: ['Be Vietnam Pro', 'sans-serif'],
        Bayon: ['Bayon', 'sans-serif'],
        AntonSC: ['Anton SC', 'sans-serif']
      },
      colors: {
        back_admin: '#333333',
        Cam_Ananas: '#F15E2C',
        prd_color1: '#A59C8D',
        prd_color3: '#FDFBEF',
        prd_color4: '#475852',
        prd_color5: '#056863',
        prd_color6: '#EACFA0',
        prd_color7: '#C3C3C3',
        prd_color8: '#1B497B',
        prd_color9: '#86543B',
        prd_color10: '#6E9952',
        prd_color11: '#E8662C',
        prd_color12: '#F1788B',
      },
      spacing: {
        '800': '800px',  // Chiều rộng 800px
        '580': '580px',  // Chiều cao 580px
      },
    },
  },
  plugins: [],
}

