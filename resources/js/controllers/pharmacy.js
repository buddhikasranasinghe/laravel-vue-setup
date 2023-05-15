import axios from 'axios'

export default {
    index() {
        return axios.get('/api/pharmacy')
    },
    store(data) {
        return axios.post('/api/pharmacy', {'data': data})
    },
    update(id, data) {
        return axios.put(`/api/pharmacy/${id}`, {'data': data})
    },
    delete(id) {
        return axios.delete(`/api/pharmacy/${id}`, {'id': id})
    }
}