//require('./bootstrap');

import { createApp } from 'vue';
import AppComponent from './Components/AppComponent';
import router from './router';
import store from './store';

const app = createApp({});

app.use(router);
app.use(store);

app.component('app-component', AppComponent);

app.mount('#app');
