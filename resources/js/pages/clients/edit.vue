<template>
<h1>edit a client</h1>

<Form v-bind:client="client" />

</template>


<script setup>


// import moment from "moment";
// import { Link } from '@inertiajs/inertia-vue3';
// import { useForm } from "@inertiajs/inertia-vue3";

// const props = defineProps({
//     client:{
//         type: Object
//     }
// });

// const form = useForm({
//     first_name: props.client.first_name,
//     last_name: props.client.last_name,
//     dob: moment(props.client.dob).utc().format("MM/DD/YYYY"),
// });

</script>

<script>
import Form from './form.vue';

export default{
    components:{
        Form
    },
    props:{
        client: Object
    }
}
</script>