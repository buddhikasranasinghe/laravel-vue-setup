<template>
    <div>

        <div v-show="modalStatus"
            x-transition:enter="transition duration-300 ease-out"
            x-transition:enter-start="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
            x-transition:enter-end="translate-y-0 opacity-100 sm:scale-100"
            x-transition:leave="transition duration-150 ease-in"
            x-transition:leave-start="translate-y-0 opacity-100 sm:scale-100"
            x-transition:leave-end="translate-y-4 opacity-0 sm:translate-y-0 sm:scale-95"
            class="fixed inset-0 z-10 overflow-y-auto" 
            aria-labelledby="modal-title" role="dialog" aria-modal="true"
        >
            <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0 bg-black bg-opacity-50">
                <span class="hidden sm:inline-block sm:h-screen sm:align-middle" aria-hidden="true">&#8203;</span>

                <div class="relative inline-block px-4 pb-4 overflow-hidden text-left transition-all transform bg-white rounded-lg shadow-xl sm:my-8 sm:w-full sm:max-w-sm sm:p-6 sm:align-middle">
                    <h3 class="text-lg font-medium font-semibold leading-6 text-black-800 capitalize" id="modal-title">
                        {{ modelTitle }}
                    </h3>
                    
                    <form class="" @submit.prevent="submitForm" id="frm">
                        <slot></slot>

                        <div class="flex justify-end mt-6">
                            <div class="ml-2">
                                <form-button
                                    :button-type="'button'"
                                    :button-text="'Cancel'"
                                    :button-click-funtion="toggleModal"
                                    :button-icon="'fa-solid fa-xmark'"
                                    :button-background="'gray'"
                                ></form-button>
                            </div>
                            <div class="ml-2">
                                <form-button
                                    :button-type="'submit'"
                                    :button-text="'Save'"
                                    :button-icon="'fa-light fa-floppy-disk'"
                                    :button-background="'green'"
                                    :button-loading="is_loading_button"
                                    :button-waiting-text="button_loading_text"
                                ></form-button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import FormButton from './Button.vue'
export default {
    props:{
        modelTitle:{
            type: String,
            default: 'Modal'
        },
        submitForm:{
            type: Function
        },
        modalStatus: {
            type: Boolean,
            default: false
        }
    },
    components:{
        'form-button': FormButton
    },
    data() {
        return {
            is_modal_open: false,
            is_loading_button: false,
            button_loading_text: '',
        }
    },
    mounted() {
        // this.is_model_open = this.modalStatus
    },
    methods: {
        toggleModal() {
            this.$emit('status', false)
            // this.modalStatus = !this.modalStatus
        },
    },
}
</script>

<style></style>