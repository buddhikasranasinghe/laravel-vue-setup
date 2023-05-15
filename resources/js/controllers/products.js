import axios from 'axios'

export default {
    index() {
        return axios.get('/api/products')
    },
    store(data) {
        return axios.post('/api/products', {'data': data})
    },
    update(id, data) {
        return axios.put(`/api/products/${id}`, {'data': data})
    },
    delete(id) {
        return axios.delete(`/api/products/${id}`, {'id': id})
    }
}