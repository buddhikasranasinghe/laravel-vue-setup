<template>
    <div>
        <section class="text-black-600 body-font overflow-y-scroll h-screen">
            <div class="container px-5 py-10 mx-auto">
                <div>
                    <input class="border border-gray-100 focus:outline-none focus:border-indigo-700 rounded-full w-1/4 text-sm text-gray-500 bg-white pl-12 py-2" type="text" placeholder="Search" v-model="search_key"/>
                </div>
                <div class="flex flex-wrap -m-4">
                    <div class="lg:w-1/4 md:w-1/2 p-4 w-full" v-for="(product, index) in filteredProductList">
                        <a class="block relative h-48 rounded overflow-hidden">
                            <img alt="ecommerce" class="object-cover object-center w-full h-full block" src="https://dummyimage.com/420x260">
                        </a>
                        <div class="mt-4">
                            <h2 class="text-black-900 title-font text-lg font-medium">{{ product.name }}</h2>
                            <h6 class="text-gray-900">{{ product.description }}</h6>
                            <p class="mt-1">${{ product.price }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
import products from '../controllers/products';
export default {
    data() {
        return {
            search_key: '',
            product_list: [],
        }
    },
    mounted() {
        this.fetchData()
    },
    methods: {
        async fetchData() {
            let response = await products.index()
            console.log(response)
            if (response.status == 200 && response.data.status == 200) {
                this.product_list = response.data.data
                console.log(this.product_list)
            } else if (response.status == 200 && response.data.status == 200) {
                alert(response.data.message)
            } else {
                alert('Something Went Wrong')
            }
        }
    },
    computed: {
        filteredProductList() {
            if (this.search_key != '') {
                return this.product_list.filter((product) =>
                    product.name.toLowerCase().includes(this.search_key.toLowerCase())
                );
            } else {
                return this.product_list
            }
        }
    },
};
</script>
