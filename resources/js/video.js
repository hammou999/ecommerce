window.axios = require('axios');


//let notification = new Audio(require(''))
//window.notification = new Audio(require(''))
import { createApp } from 'vue'

import Formulaire from './components/formulaire.vue';
import Video from './components/formulaire';
const app = createApp({})
app.component('video', Video)

app.mount('#app')
