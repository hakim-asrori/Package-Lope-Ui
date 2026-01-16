import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";
import tailwindcss from "@tailwindcss/vite";

export default defineConfig({
  plugins: [
    laravel({
      input: ["resources/css/lopi.css", "resources/js/lopi.js"],
      publicDirectory: "resources/dist",
      refresh: true,
    }),
    tailwindcss(),
  ],
  build: {
    outDir: "resources/dist",
    rollupOptions: {
      output: {
        entryFileNames: `[name].js`,
        chunkFileNames: `[name].js`,
        assetFileNames: `[name].[ext]`,
      },
    },
  },
});
