import axios from 'axios'
export default {
    async uploadFile(folder, file) {
        const config = {
            headers: {
                'content-type': 'multipart/form-data'
            }
        }
        let data = new FormData()
        data.append('file', file)
        data.append('folder', folder)
        const response =  await axios.post('/api/upload-file', data, config)
        return response
    }
}