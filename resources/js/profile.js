require('./bootstrap');

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
import { createApp } from 'vue'
import TagsComponent from './components/TagsComponent';



const app = createApp({})
app.component('tags-component', TagsComponent)

app.mount('#profile')
