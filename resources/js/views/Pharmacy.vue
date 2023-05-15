<template>
    <div>
        <div class="flex justify-between mx-8 mt-4">
            <div>
                <h1 class="text-black-500 text-4xl font-semibold">Pharmacy List</h1>
            </div>
            <div>
                <form-button
                    :button-type="'button'"
                    :button-text="'Add Pharmacy'"
                    :button-click-funtion="toggleModal"
                    :button-icon="'fa-sharp fa-solid fa-plus'"
                    :button-background="'blue'"
                ></form-button>
                <form-modal
                    :model-title="'Add New Pharmacy'"
                    :submit-form="store"
                    :modal-status="model_status"
                    @status="changeModalStatus"
                >
                    <div>
                        <label class="text-black-700" for="name">Name</label>
                        <input id="name" type="text" class="block w-full px-2 py-2 mt-2 text-black-700 bg-white border border-gray-700 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring" v-model="form.name">
                    </div>

                    <div>
                        <label class="text-black-700" for="email">Email</label>
                        <input id="email" type="text" class="block right w-full px-2 py-2 mt-2 text-black-700 bg-white border border-gray-700 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring" v-model="form.email">
                    </div>

                    <div>
                        <label class="text-black-700" for="contact_number">Contact Number</label>
                        <input id="contact_number" type="text" class="block right w-full px-2 py-2 mt-2 text-black-700 bg-white border border-gray-700 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring" v-model="form.contact_number">
                    </div>

                    <div>
                        <label class="text-black-700" for="address">Address</label>
                        <textarea id="address" class="block right w-full px-2 py-2 mt-2 text-black-700 bg-white border border-gray-700 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring" v-model="form.address"></textarea>
                    </div>
                </form-modal>
            </div>
        </div>
        <div class="mx-8 mt-2">
            <section class="w-full p-6 mx-auto bg-white rounded-md shadow-md ml-8 h-[80%]">
                <section class="container px-2 mx-auto">
                    <div class="flex flex-col mt-6">
                        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                                <div class="overflow-hidden border border-gray-200 md:rounded-lg">
                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                                        <thead class="bg-gray-50 ">
                                            <tr>
                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black-500 ">
                                                    <div class="flex items-center gap-x-3">
                                                        <input type="checkbox" class="text-blue-500 border-gray-300 rounded">
                                                        <span>Name</span>
                                                    </div>
                                                </th>

                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black-500">Email address</th>

                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black-500">Contact Number</th>

                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black-500">
                                                    Address
                                                </th>
                                                
                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black-500">
                                                    Status
                                                </th>
                                                
                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black-500">
                                                    
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700">
                                            <tr v-for="(pharmacy, index) in pharmacy_list" :key="index">
                                                <td class="px-4 py-2 text-sm font-medium text-black-700 whitespace-nowrap">
                                                    <div class="inline-flex items-center gap-x-3">
                                                        <input type="checkbox" class="text-blue-500 border-gray-300 rounded">
                                                        <h2 class="text-sm font-normal">{{ pharmacy.name }}</h2>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-2 text-sm text-black-500 whitespace-nowrap">
                                                    {{ pharmacy.email }}
                                                </td>
                                                <td class="px-4 py-2 text-sm text-black-500 whitespace-nowrap">
                                                    {{ pharmacy.contact_number }}
                                                </td>
                                                <td class="px-4 py-2 text-sm text-black-500 whitespace-nowrap">
                                                    {{ pharmacy.address }}
                                                </td>
                                                <td class="px-4 py-2 text-sm text-black-500 whitespace-nowrap">
                                                    <span v-if="pharmacy.status">Active</span>
                                                    <span v-if="!pharmacy.status">Inactive</span>
                                                </td>
                                                <td class="px-4 py-2 text-sm whitespace-nowrap">
                                                    <div class="flex items-center gap-x-6">

                                                        <form-button
                                                            :button-type="'button'"
                                                            :button-text="''"
                                                            :button-click-funtion="removeRow"
                                                            :button-id="pharmacy.id"
                                                            :button-icon="'fa-regular fa-trash-can'"
                                                            :button-background="'red'"
                                                        ></form-button>

                                                        <form-button
                                                            :button-type="'button'"
                                                            :button-text="''"
                                                            :button-click-funtion="editRow"
                                                            :button-id="pharmacy.id"
                                                            :button-icon="'fa-regular fa-pen-to-square'"
                                                            :button-background="'yellow'"
                                                        ></form-button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </section>
        </div>
    </div>
</template>

<script>
import FormModal from '../components/Modal.vue';
import FormButton from '../components/Button.vue';
import pharmacy from '../controllers/pharmacy';
import axios from 'axios';
export default {
    components:{
        'form-modal': FormModal,
        'form-button': FormButton
    },
    data() {
        return {
            is_edit: false,
            model_status: false,
            form: {
                name: '',
                email: '',
                contact_number: '',
                address: '',
                is_active: true
            },
            pharmacy_list: [],
            selected_id: '',
        }
    },
    mounted() {
        this.fetchData()
    },
    methods: {
        async fetchData() {
            let response = await pharmacy.index()
            if (response.status == 200 && response.data.status == 200) {
                response.data.data.map(pharmacy => {
                    this.pharmacy_list.push({
                        id: pharmacy.id,
                        name: pharmacy.name,
                        email: pharmacy.email,
                        contact_number: pharmacy.contact_number,
                        address: pharmacy.address,
                        is_active: pharmacy.is_active,
                    })
                }).join('')
            } else if (response.status == 200 && response.data.status == 500) {
                alert(response.data.message)
            } else {
                alert('Something Went Wrong')
            }
        },
        toggleModal() {
            this.model_status = !this.model_status
        },
        async store() {
            console.log('call store function')
            console.log(this.is_edit)
            if (this.is_edit == false) {
                let response = await pharmacy.store(this.form)
                if (response.status == 200 && response.data.status == 200) {
                    this.reset()
                    this.fetchData()
                    alert(response.data.message)
                    this.model_status = false
                } else if (response.status == 200 && response.data.status == 500) {
                    alert(response.data.message)
                } else {
                    alert('Something Went Wrong')
                }
            } else {
                let response = await pharmacy.update(this.selected_id, this.form)
                if (response.status == 200 && response.data.status == 200) {
                    this.reset()
                    this.fetchData()
                    alert(response.data.message)
                    this.model_status = false
                } else if (response.status == 200 && response.data.status == 500) {
                    alert(response.data.message)
                } else {
                    alert('Something Went Wrong')
                }
            }
            
        },
        editRow(event) {
            if (event.target.id) {
                this.pharmacy_list.map(pharmacy => {
                    if (pharmacy.id == event.target.id) {
                        this.is_edit = true
                        this.selected_id = pharmacy.id
                        this.form.name = pharmacy.name
                        this.form.email = pharmacy.email
                        this.form.contact_number = pharmacy.contact_number
                        this.form.address = pharmacy.address
                        this.form.is_active = pharmacy.is_active
                        this.model_status = true
                    }
                }).join('')
            }
        },
        async updateRow() {
            let response = await pharmacy.update(this.form.id, this.form)
            if (response.status == 200 && response.data.status == 200) {
                this.reset()
                this.fetchData()
                alert(response.data.message)
                this.model_status = false
            } else if (response.status == 200 && response.data.status == 500) {
                alert(response.data.message)
            } else {
                alert('Something Went Wrong')
            }
        },
        removeRow(event) {
            if (event.target.id) {
                this.pharmacy_list.map(pharmacy => {
                    if (pharmacy.id == event.target.id) {
                        if (window.confirm('Are you sure want to delete this ?') == true) {
                            this.delete(pharmacy.id)
                        }
                    }
                }).join('')
            }
        },
        async delete(id) {
            let response = await pharmacy.delete(id)
            if (response.status == 200 && response.data.status == 200) {
                this.reset()
                this.fetchData()
                alert(response.data.message)
                this.model_status = false
            } else if (response.status == 200 && response.data.status == 500) {
                alert(response.data.message)
            } else {
                alert('Something Went Wrong')
            }
        },
        reset() {
            this.form.name = ''
            this.form.email = ''
            this.form.contact_number = ''
            this.form.address = ''
            this.form.is_active = true
            this.pharmacy_list = []
            this.model_status = false
            this.is_edit = false
            this.selected_id = ''
        },
        changeModalStatus(value) {
            this.model_status = value
        }
    },
}
</script>

<style scoped>

</style>