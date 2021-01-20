<template>
       <button type="submit" @click="increase">{{count}}</button>
</template>

<script>
    export default {
        name: "my-button",
        data(){
            return{
                count: 0
            }
        },
        methods:{
            'increase': function(){
                this.count++;
            }
        },
        mounted() {
            console.log('Component mounted.')
            axios.get('api/customers')
            .then((res)=>{
                console.log(res);
            })
        }
    }
</script>
