import axios from 'axios';

export default {
    create (message , cb , ecb =null) {
        return axios.post(
            '/api/user/create',
            {
                message: message,
            }
        ).then(response => cb(response))
        .catch(error => ecb(error));
    },
    getAll () {
        return axios.get('/api/users');
    },
}