<template>
    <div>
        <div class="flex justify-between mx-8 mt-4">
            <div>
                <h1 class="text-black-500 text-4xl font-semibold">Products List</h1>
            </div>
            <div>
                <form-button
                    :button-type="'button'"
                    :button-text="'Add Product'"
                    :button-click-funtion="toggleModal"
                    :button-icon="'fa-sharp fa-solid fa-plus'"
                    :button-background="'blue'"
                ></form-button>
                <form-modal
                    :model-title="'Add New Product'"
                    :submit-form="store"
                    :modal-status="model_status"
                    @status="changeModalStatus"
                >
                    <div>
                        <label for="pharmacy" class="text-black-700">Pharmacy</label>
                        <select id="pharmacy" class="block w-full px-2 py-2 mt-2 text-black-700 bg-white border border-gray-700 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring" v-model="form.pharmacy_id">
                            <option v-for="(pharmacy, index) in pharmacy_list" :key="index" :value="pharmacy.id" :selected="form.pharmacy_id == pharmacy.id">{{ pharmacy.name }}</option>
                        </select>
                    </div>

                    <div>
                        <label class="text-black-700" for="name">Name</label>
                        <input id="name" type="text" class="block w-full px-2 py-2 mt-2 text-black-700 bg-white border border-gray-700 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring" v-model="form.name">
                    </div>

                    <div>
                        <label class="text-black-700" for="price">Price</label>
                        <input id="price" type="text" class="block right w-full px-2 py-2 mt-2 text-black-700 bg-white border border-gray-700 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring" v-model="form.price">
                    </div>

                    <div>
                        <label class="text-black-700" for="description">Description</label>
                        <textarea id="description" class="block w-full px-2 py-2 mt-2 text-black-700 bg-white border border-gray-700 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring" v-model="form.description"></textarea>
                    </div>

                    <div>
                        <label class="text-black-700" for="image">Image</label>
                        <input id="image" type="file" class="block w-full px-2 py-2 mt-2 text-black-700 bg-white border border-gray-700 rounded-md focus:border-blue-400 focus:ring-blue-300 focus:ring-opacity-40 focus:outline-none focus:ring" accept=".png, .jpg, .jpeg"  @change="changeImage($event)">
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

                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black-500">Description</th>

                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black-500">Image</th>

                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black-500">
                                                    Price
                                                </th>
                                                
                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black-500">
                                                    Status
                                                </th>
                                                
                                                <th scope="col" class="px-4 py-3.5 text-sm font-normal text-left rtl:text-right text-black-500">
                                                    
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700">
                                            <tr v-for="(product, index) in products_list" :key="index">
                                                <td class="px-4 py-2 text-sm font-medium text-black-700 whitespace-nowrap">
                                                    <div class="inline-flex items-center gap-x-3">
                                                        <input type="checkbox" class="text-blue-500 border-gray-300 rounded">
                                                        <h2 class="text-sm font-normal">{{ product.name }}</h2>
                                                    </div>
                                                </td>
                                                <td class="px-4 py-2 text-sm text-black-500 whitespace-nowrap">
                                                    {{ product.description }}
                                                </td>
                                                <td class="px-4 py-2 text-sm text-black-500 whitespace-nowrap">
                                                    {{ product.image }}
                                                </td>
                                                <td class="px-4 py-2 text-sm text-black-500 whitespace-nowrap">
                                                    {{ product.price }}
                                                </td>
                                                <td class="px-4 py-2 text-sm text-black-500 whitespace-nowrap">
                                                    <span v-if="product.status">Active</span>
                                                    <span v-if="!product.status">Inactive</span>
                                                </td>
                                                <td class="px-4 py-2 text-sm whitespace-nowrap">
                                                    <div class="flex items-center gap-x-6">

                                                        <form-button
                                                            :button-type="'button'"
                                                            :button-text="''"
                                                            :button-click-funtion="removeRow"
                                                            :button-id="product.id"
                                                            :button-icon="'fa-regular fa-trash-can'"
                                                            :button-background="'red'"
                                                        ></form-button>

                                                        <form-button
                                                            :button-type="'button'"
                                                            :button-text="''"
                                                            :button-click-funtion="editRow"
                                                            :button-id="product.id"
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
import products from '../controllers/products';
import fileUpload from '../services/fileUpload';
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
                description: '',
                price: '',
                pharmacy_id: '',
                is_active: true
            },
            pharmacy_list: [],
            products_list: [],
            selected_id: '',
            files: [],
        }
    },
    mounted() {
        this.fetchData()
    },
    methods: {
        async fetchData() {
            let pharmacy_list = await pharmacy.index()
            if (pharmacy_list.status == 200 && pharmacy_list.data.status == 200) {
                this.pharmacy_list = pharmacy_list.data.data
            } else if (pharmacy_list.status == 200 && pharmacy_list.data.status == 500) {
                alert(response.data.message)
            } else {
                alert('Error Loading Pharmacies')
            }
            let response = await products.index()
            if (response.status == 200 && response.data.status == 200) {
                response.data.data.map(pharmacy => {
                    this.products_list.push({
                        id: pharmacy.id,
                        name: pharmacy.name,
                        description: pharmacy.description,
                        price: pharmacy.price,
                        pharmacy_id: pharmacy.pharmacy_id,
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
        changeImage(e) {
            if (e) {
                this.files.push(e.target.files[0])
            }
        },
        async store() {
            console.log('call store function')
            console.log(this.is_edit)
            if (this.is_edit == false) {
                let file_name = await fileUpload.uploadFile('products', this.files[0])
                if (file_name != 'no file') {
                    this.form.image = 'file_name'
                    let response = await products.store(this.form)
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
                    alert('Fail to upload file...')
                }
            } else {
                let response = await products.update(this.selected_id, this.form)
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
                this.products_list.map(product => {
                    if (product.id == event.target.id) {
                        this.is_edit = true
                        this.selected_id = product.id
                        this.form.name = product.name,
                        this.form.description = product.description,
                        this.form.price = product.price,
                        this.form.product_id = product.pharmacy_id,
                        this.form.is_active = product.is_active,
                        this.model_status = true
                    }
                }).join('')
            }
        },
        async updateRow() {
            let response = await products.update(this.form.id, this.form)
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
            let response = await products.delete(id)
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
            this.form.description = ''
            this.form.price = ''
            this.form.pharmacy_id = ''
            this.form.is_active = true
            this.pharmacy_list = []
            this.products_list = []
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