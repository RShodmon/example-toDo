require('./bootstrap');

require('alpinejs');

import { createApp } from "vue";
import router from './router'
import TasksIndex from './components/TasksIndex'

createApp({
    components: {
        TasksIndex
    }
}).use(router).mount('#app')
