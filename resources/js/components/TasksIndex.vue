<template>
    <div
        class="overflow-hidden overflow-x-auto min-w-full align-middle sm:rounded-md"
    >
        <div class="flex place-content-between mb-4">
            <div class="flex">
                <div class="mr-10">
                    <select
                        name="user_id"
                        id="user_id"
                        class="h-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    >
                        <option @click="getFilterTask('', '')">Select sort</option>
                        <option @click="getFilterTask('asc', '')">
                            ASC
                        </option>
                        <option @click="getFilterTask('desc', '')">
                            DESC
                        </option>
                    </select>
                    <div
                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
                    >
                        <svg
                            class="fill-current h-4 w-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                            />
                        </svg>
                    </div>
                </div>
                <div class="mr-10">
                    <select
                        name="user_id"
                        id="user_id"
                        class="h-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    >
                        <option @click="getFilterTask('', '')">Select user</option>
                        <option
                            v-for="user in users"
                            :value="user.id"
                            :key="user.id"
                            @click="getFilterTask('', `,${user.id}`)"
                        >
                            {{ user.name }}
                        </option>
                    </select>
                    <div
                        class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700"
                    >
                        <svg
                            class="fill-current h-4 w-4"
                            xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 20 20"
                        >
                            <path
                                d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"
                            />
                        </svg>
                    </div>
                </div>
            </div>
            <div
                class="h-10 inline-flex items-center px-4 py-1 bg-green-700 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest"
            >
                <router-link
                    :to="{ name: 'task.create' }"
                    class="text-sm font-medium"
                    >Create task</router-link
                >
            </div>
        </div>

        <table class="min-w-full border divide-y divide-gray-200">
            <thead>
                <tr>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span
                            class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase"
                            >Title</span
                        >
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span
                            class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase"
                            >Description</span
                        >
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span
                            class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase"
                            >Deadline</span
                        >
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-left">
                        <span
                            class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase"
                            >Users</span
                        >
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-center">
                        <span
                            class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase"
                            >Status</span
                        >
                    </th>
                    <th class="px-6 py-3 bg-gray-50 text-center">
                        <span
                            class="text-xs font-medium tracking-wider leading-4 text-gray-500 uppercase"
                            >Action</span
                        >
                    </th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200 divide-solid">
                <template v-for="task in tasks" :key="task.id">
                    <tr class="bg-white">
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap text-left"
                        >
                            {{ task.title }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap text-left"
                        >
                            {{ task.description }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap text-left"
                        >
                            {{ task.deadline }}
                        </td>
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap text-left"
                        >
                            <div v-for="user in users" :key="user.id">
                                <p v-if="user.id === task.user_id">
                                    {{ user.name }}
                                </p>
                            </div>
                        </td>
                        <td
                            v-if="task.status === 1"
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap text-center"
                        >
                            <div
                                class="inline-flex items-center h-10 px-4 py-2 bg-green-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest"
                            >
                                <svg
                                    class="mr-3 w-6 h-6 dark:text-white"
                                    fill="none"
                                    stroke="currentColor"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="2"
                                        d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"
                                    ></path>
                                </svg>
                                Completed
                            </div>
                        </td>
                        <td
                            v-else
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap text-center"
                        >
                            <div
                                class="inline-flex items-center h-10 px-4 py-2 bg-red-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest"
                            >
                                Not Completed
                            </div>
                        </td>
                        <td
                            class="px-6 py-4 text-sm leading-5 text-gray-900 whitespace-no-wrap text-center"
                        >
                            <router-link
                                :to="{
                                    name: 'task.edit',
                                    params: { id: task.id },
                                }"
                                class="h-10 mr-2 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                            >
                                Edit
                            </router-link>
                            <button
                                @click="deleteTask(task.id)"
                                class="h-10 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                </template>
            </tbody>
        </table>
    </div>
</template>

<script>
import useTasks from "../composables/tasks";
import { onMounted } from "vue";

export default {
    setup() {
        const { tasks, users, getTasks, destroyTask, getUsers } = useTasks();
        onMounted(getTasks('', ''));
        onMounted(getUsers);
        const deleteTask = async (id) => {
            if (!window.confirm("Are you sure?")) {
                return;
            }
            await destroyTask(id);
            await getTasks();
        };
        const getFilterTask = async (deadline, user_id) =>{
            await getTasks({deadline, user_id});
        }
        return {
            tasks,
            users,
            deleteTask,
            getFilterTask
        };
    },
};
</script>
