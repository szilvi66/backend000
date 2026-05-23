import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/css/style3.css',
                'resources/css/main_page.css',
                'resources/css/navbar.css',
                'resources/css/style.css',
                'resources/css/auto.css',
                'resources/css/style2.css',
                'resources/css/style.css',
                'resources/css/style4.css',
                'resources/js/login.js',
                'resources/css/login.css',
                'resources/css/profile.css',
                'resources/css/loggin.css'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
