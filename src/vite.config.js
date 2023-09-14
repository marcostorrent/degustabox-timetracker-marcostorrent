import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path'; // Agrega esta línea
import inject from '@rollup/plugin-inject';

export default defineConfig({
    resolve: {
        alias: {
            'jquery': 'jquery',
            '~bootstrap': path.resolve(__dirname, 'node_modules/bootstrap'),

        }
    },
    plugins: [
        laravel({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
        inject({
            $: 'jquery',
        }),
    ],

});
