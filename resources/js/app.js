import './bootstrap';
import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/vue3';
import Toast from './components/Toast.vue';

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true });
    return pages[`./Pages/${name}.vue`] || pages[`./Pages/${name}/index.vue`];
  },
  setup({ el, App, props, plugin }) {
    const app = createApp({
      render: () => [
        h(App, props),
        h(Toast)
      ]
    });

    app.use(plugin);
    app.mount(el);
  },
});
