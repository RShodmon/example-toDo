<template>
    <div v-if="errors">
        <div
            v-for="(v, k) in errors"
            :key="k"
            class="bg-red-500 text-white rounded font-bold mb-4 shadow-lg py-2 px-4 pr-0"
        >
            <p v-for="error in v" :key="error" class="text-sm">
                {{ error }}
            </p>
        </div>
    </div>

    <form class="space-y-6" @submit.prevent="saveTask">
        <div class="space-y-4 rounded-md shadow-sm">
            <div>
                <label
                    for="title"
                    class="block text-sm font-medium text-gray-700"
                    >Title</label
                >
                <div class="mt-1">
                    <input
                        type="text"
                        name="title"
                        id="title"
                        class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.title"
                    />
                </div>
            </div>

            <div>
                <label
                    for="description"
                    class="block text-sm font-medium text-gray-700"
                    >Description</label
                >
                <div class="mt-1">
                    <textarea
                        name="description"
                        id="description"
                        class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.description"
                    ></textarea>
                </div>
            </div>

            <div>
                <label
                    for="deadline"
                    class="block text-sm font-medium text-gray-700"
                    >Deadline</label
                >
                <div class="mt-1">
                    <input
                        type="date"
                        name="deadline"
                        id="deadline"
                        class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.deadline"
                    />
                </div>
            </div>

            <div>
                <label
                    for="status"
                    class="block text-sm font-medium text-gray-700"
                    >Status</label
                >
                <div class="mt-1">
                    <select
                        name="status"
                        id="status"
                        class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.status"
                    >
                        <option value="0">Not completed</option>
                        <option value="1">Completed</option>
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

            <div>
                <label
                    for="user_id"
                    class="block text-sm font-medium text-gray-700"
                    >User</label
                >
                <div class="mt-1">
                    <select
                        name="user_id"
                        id="user_id"
                        class="block mt-1 w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        v-model="form.user_id"
                    >
                        <option
                            v-for="user in users"
                            :value="user.id"
                            :key="user.id"
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
        </div>

        <button
            type="submit"
            class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-white uppercase bg-gray-800 rounded-md border border-transparent ring-gray-300 transition duration-150 ease-in-out hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring disabled:opacity-25"
        >
            Create
        </button>
    </form>
</template>

<script>
import { reactive } from "vue";
import useTasks from "../composables/tasks";
import { onMounted } from "vue";

export default {
    setup() {
        const form = reactive({
            title: "",
            description: "",
            deadline: "",
            status: "",
            user_id: "",
        });

        const { errors, users, getUsers, storeTask } = useTasks();
        onMounted(getUsers);
        const saveTask = async () => {
            await storeTask({ ...form });
        };

        return {
            form,
            errors,
            users,
            getUsers,
            saveTask,
        };
    },
};
</script>
