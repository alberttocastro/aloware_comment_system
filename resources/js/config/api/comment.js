import axios from 'axios';

export default {
    create: async ({ name, body, parent_comment_id }) => {
        return await axios.post('/api/comment', {
            name, body, parent_comment_id
        });
    },
    index: async () => {
        return await axios.get('/api/comment');
    }
}
