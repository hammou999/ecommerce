require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
import { createApp } from 'vue'
import settings from './components/settingsComponents/settings';



const app = createApp({})
app.component('settings', settings)

app.mount('#settings')
