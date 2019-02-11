import axios from 'axios';

export default {
    create (message ) {
        return axios.post(
            '/api/user/create',
            {
                message: message,
            }
        )
    },
    getAll () {
        return axios.get('/api/users');
    },
}