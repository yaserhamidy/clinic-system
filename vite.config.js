import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',  // Path to your Sass file
                'resources/js/app.js'        // Path to your JavaScript file
            ],
            refresh: true,
        }),
    ],
});