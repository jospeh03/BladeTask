// vite.config.js
import { defineConfig } from 'vite';
import vue from '@vitejs/plugin-vue';

export default defineConfig({
    plugins: [vue()],
    build: {
        manifest: true,  // This enables manifest generation
        outDir: 'public/build',  // Ensure this matches Laravel’s default setup
        rollupOptions: {
            input: 'resources/js/app.js',  // Ensure this is your main JS file
        },
    },
});
