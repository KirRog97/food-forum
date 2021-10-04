module.exports = {
  purge: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue"
  ],
  theme: {
    fontFamily: {
      handwritten: ["Lobster", "cursive"],
      display: ["Oswald", "sans-serif"],
      body: ["Oswald", "sans-serif"]
    },
    extend: {
      screens: {
        xs: "600px",
        sm: "768px",
        md: "992px",
        lg: "1200px"
      },
      colors: {
        primary: {
          "50": "var(--color-primary50)",
          "100": "var(--color-primary100)",
          "200": "var(--color-primary200)",
          "300": "var(--color-primary300)",
          "400": "var(--color-primary400)",
          "500": "var(--color-primary500)",
          "600": "var(--color-primary600)",
          "700": "var(--color-primary700)",
          "800": "var(--color-primary800)",
          "900": "var(--color-primary900)"
        },
        secondary: {
          "50": "var(--color-secondary50)",
          "100": "var(--color-secondary100)",
          "200": "var(--color-secondary200)",
          "300": "var(--color-secondary300)",
          "400": "var(--color-secondary400)",
          "500": "var(--color-secondary500)",
          "600": "var(--color-secondary600)",
          "700": "var(--color-secondary700)",
          "800": "var(--color-secondary800)",
          "900": "var(--color-secondary900)"
        }
      },
      spacing: {
        "1/2": "50%",
        "1/3": "33.333333%",
        "2/3": "66.666667%",
        "1/4": "25%",
        "2/4": "50%",
        "3/4": "75%",
        "1/5": "20%",
        "2/5": "40%",
        "3/5": "60%",
        "4/5": "80%",
        "1/6": "16.666667%",
        "2/6": "33.333333%",
        "3/6": "50%",
        "4/6": "66.666667%",
        "5/6": "83.333333%",
        "1/12": "8.333333%",
        "2/12": "16.666667%",
        "3/12": "25%",
        "4/12": "33.333333%",
        "5/12": "41.666667%",
        "6/12": "50%",
        "7/12": "58.333333%",
        "8/12": "66.666667%",
        "9/12": "75%",
        "10/12": "83.333333%",
        "11/12": "91.666667%"
      }
    }
  },
  variants: {
    animation: ["responsive", "motion-safe", "motion-reduce"]
  },
  plugins: [
    require("@tailwindcss/forms"),
    require("@tailwindcss/typography"),
    require("@tailwindcss/aspect-ratio")
  ]
};
