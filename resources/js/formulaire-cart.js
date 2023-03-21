window.axios = require('axios');


//let notification = new Audio(require(''))
//window.notification = new Audio(require(''))
import { createApp } from 'vue'

import FormulaireCart from './components/formulaire-cart.vue';
const app = createApp({})
app.component('formulaire-cart', FormulaireCart)

app.mount('#app')
