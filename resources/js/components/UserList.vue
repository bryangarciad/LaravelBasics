<template>
    <div>
        <h1>User lsit - {{ postTitle }}</h1>
        <ul v-if="users">
            <li  v-for="user in users" :key="user.id">{{ user.name }} -- {{ user.email }}</li>
        </ul>
    </div>
</template>

<script>
    export default {
        name: "user-list",
        props:[
            'postTitle'
        ],
        data(){
            return{
                users: []
            }
        },
        mounted() {
            console.log('Component mounted. Rquesting info...')
            axios.get('/api/users')
            .then((res)=>{
                this.users = res.data;
                console.log(res);
            })
        }
    }
</script>
