<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Students
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex justify-end">
                        <jet-secondary-button @click="handleClickAddStudent">Add Student</jet-secondary-button>
                    </div>
                    <div class="flex flex-col">
                        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="py-2 inline-block min-w-full sm:px-6 lg:px-8">
                                <div class="overflow-hidden">
                                    <table class="min-w-full">
                                        <thead class="border-b">
                                        <tr>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Name
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Age
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Gender
                                            </th>
                                            <th scope="col" class="text-sm font-medium text-gray-900 px-6 py-4 text-left">
                                                Actions
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="(student, key) in students" :key="key" class="border-b">
                                            <td>{{student.name}}</td>
                                            <td>{{student.age}}</td>
                                            <td>{{student.gender}}</td>
                                            <td>
                                                <jet-secondary-button @click="handleClickEdit(student)">Edit</jet-secondary-button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <StudentForm
            :student="selectedStudent"
            :is-showing-student-form="isShowingStudentForm"
            @click-cancel="isShowingStudentForm = false"
            @save="saveStudent"
        />
    </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import JetSecondaryButton from '@/CommonComponents/SecondaryButton.vue';
import StudentForm from "@/Components/StudentForm.vue";
import {ref} from "vue";
import {Inertia} from "@inertiajs/inertia";

const isShowingStudentForm = ref(false)
const selectedStudent = ref(false)

defineProps({
    students: {type: Array}
})

function handleClickAddStudent () {
    const newStudent = ref({
        id: '',
        name: '',
        age: '',
        gender: ''
    })

    selectedStudent.value = {...newStudent.value}

    isShowingStudentForm.value = true
}

function handleClickEdit(student) {
    selectedStudent.value = {...student}
    isShowingStudentForm.value = true
}

function saveStudent(student) {
    if (student.id) {
        Inertia.put(`students/${student.id}`, student)
        return
    }

    this.$inertia.post(`students`, student)
    //save new
}
</script>

<style scoped>

</style>
