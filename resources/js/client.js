import axios from 'axios'

const host = location.hostname == '127.0.0.1' ? 'http://127.0.0.1:8000/api' :'https://devlandlord.smatprop.com/api';

const apiClient = axios.create({
    baseURL: host,
})

export default apiClient
