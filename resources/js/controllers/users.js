import axios from 'axios'

export default {
    index() {
        return axios.get('/api/users')
    },
    store(data) {
        return axios.post('/api/users', {'data': data})
    },
    update(id, data) {
        return axios.put(`/api/users/${id}`, {'data': data})
    },
    delete(id) {
        return axios.delete(`/api/users/${id}`, {'id': id})
    }
}