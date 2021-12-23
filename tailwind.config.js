module.exports = {
  purge: [],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      colors: {
        primary: "#3f51b5",
        secondary: "#8335A9",
        action: "#C0002A"
      }
    },
    screens: {
      "sm": "576px",
      "md": "768px",
      "lg": "992px",
      "xl": "1200px",
      "2xl": "1440px",
    },
    container: {
      center: true,
      padding: {
        DEFAULT: "1rem",
        sm: "2rem",
        md: "3rem",
        lg: "4rem",
        xl: "5rem",
        "2xl": "6rem",
      }
    },
    fontFamily: {
      body: ["Roboto", "sans-serif"],
      display: ["Poppins", "sans-serif"]
    },
  },
  variants: {
    extend: {},
  },
  plugins: [
    require("@tailwindcss/forms")
  ],
};