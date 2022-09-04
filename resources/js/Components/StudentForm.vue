<template>
    <DialogModal :show="isShowingStudentForm">
        <template #title>
            Add/Edit Student
        </template>

        <template #content>
            <form class="w-full max-w-lg">
                <div class="flex flex-col flex-wrap -mx-3 mb-6">
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Name
                        </label>
                        <input v-model="form.name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Age
                        </label>
                        <input v-model="form.age" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                    <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                            Gender
                        </label>
                        <input v-model="form.gender" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text" placeholder="Jane">
                        <p class="text-red-500 text-xs italic">Please fill out this field.</p>
                    </div>
                </div>
            </form>
        </template>

        <template #footer>
            <JetSecondaryButton @click="emit('click-cancel')">
                Cancel
            </JetSecondaryButton>

            <JetDangerButton
                class="ml-3"
                @click="emit('save', form)"
            >
                Save
            </JetDangerButton>
        </template>
    </DialogModal>

</template>

<script setup>
import {defineProps, onMounted, ref, watch, watchEffect} from "vue";
import DialogModal from "../CommonComponents/DialogModal.vue";
import JetDangerButton from '@/CommonComponents/DangerButton.vue';
import JetSecondaryButton from '@/CommonComponents/SecondaryButton.vue';

const props = defineProps({
    student: {type: Object},
    isShowingStudentForm: {type: Boolean},
})

const emit = defineEmits(['click-cancel', 'save'])

watch(()=>props.student, ()=>{
    form.value = {...props.student}
}, {deep: true})

const form = ref({
    name: '',
    age: '',
    gender: ''
})
</script>

<style scoped>

</style>
