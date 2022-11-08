<template>

<h1>add a client</h1>




<Form />

<hr />

</template>


<script>
// import { useForm } from '@inertiajs/inertia-vue3';
import Form from './form.vue';


export default{
    setup(){

        // const form = useForm({
        //     first_name: '',
        //     last_name: '',
        //     dob: ''
        // })

        // return{
        //     form
        // }

    },
    components:{
        Form
    }
}

</script>