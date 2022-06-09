import { ref } from 'vue'
import axios from "axios";
import { useRouter } from 'vue-router';

export default function useTasks() {
    const tasks = ref([])
    const task = ref([])
    const users = ref([])
    const router = useRouter()
    const errors = ref('')

    const getTasks = async ({deadline=null, user_id=null}) => {
        let response = await axios.get(`/api/task?sort=deadline,${deadline}&in=user_id${user_id}` )
        tasks.value = response.data.data;
    }

    const getUsers = async () => {
        let response = await axios.get('/api/listuser')
        users.value = response.data.data;
    }

    const getTask = async (id) => {
        let response = await axios.get('/api/task/' + id)
        task.value = response.data.data;
    }

    const storeTask = async (data) => {
        errors.value = ''
        try {
            await axios.post('/api/task', data)
            await router.push({name: 'task.index'})
        } catch (e) {
            if (e.response.status === 422) {
                errors.value = e.response.data.errors
            }
        }
    }

    const updateTask = async (id) => {
        errors.value = ''
        try {
            await axios.put('/api/task/' + id, task.value)
            await router.push({name: 'task.index'})
        } catch (e) {
            if (e.response.status === 422) {
               errors.value = e.response.data.errors
            }
        }
    }

    const destroyTask = async (id) => {
        await axios.delete(`/api/task/${id}`)
    }

    return {
        tasks,
        task,
        errors,
        users,
        getTasks,
        getTask,
        storeTask,
        updateTask,
        destroyTask,
        getUsers
    }
}
