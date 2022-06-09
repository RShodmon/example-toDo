import { createRouter, createWebHistory } from "vue-router";

import TasksIndex from '../components/TasksIndex'
import TasksCreate from '../components/TasksCreate'
import TasksEdit from '../components/TasksEdit'

const routes = [
    {
        path: '/task',
        name: 'task.index',
        component: TasksIndex
    },
    {
        path: '/task/create',
        name: 'task.create',
        component: TasksCreate
    },
    {
        path: '/task/:id/edit',
        name: 'task.edit',
        component: TasksEdit,
        props: true
    }
]

export default createRouter({
    history: createWebHistory(),
    routes
})
