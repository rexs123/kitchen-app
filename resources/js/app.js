import axios from 'axios';
import '@fortawesome/fontawesome-pro/js/all'
import { createApp } from 'vue'
import { createPinia } from 'pinia'

window.axios = axios;
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


const app = createApp({})
app.use(createPinia())
app.config.globalProperties.$axios = Axios;

app.mount('#app')
