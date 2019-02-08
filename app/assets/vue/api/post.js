import axios from 'axios';

export default {
    create (message) {
        return axios.post(
            '/api/post/create',
            {
                message: message,
            }
        );
    },
    checked(id){
        return axios.put('/api/post/'+id, {
            checked: true,
        })

    },
    getAll() {
        return axios.get('/api/posts');
    },
}