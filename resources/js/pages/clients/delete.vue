<template>
    <h1>delete client</h1>
    <p>{{client.client_id}}</p>
    <p>{{client.first_name}}</p>
    <p>{{client.last_name}}</p>
    <p>{{moment(client.dob).utc().format("MM/DD/YYYY")}}</p>

    <form @submit.prevent="form.post(route('clients.delete', {'client_id': client.client_id}))">
        <p>are you sure you want to delete this client?</p>
        <button type="submit">yes</button> ||
        <Link :href="route('clients.view', {'client_id': client.client_id})">nope</Link>
        <br />
        <!-- <input v-model="form.delete_flag" placeholder="asdf" /> -->
    </form>

</template>

<script setup>
import moment from 'moment';
import { Link } from '@inertiajs/inertia-vue3';
import { useForm } from '@inertiajs/inertia-vue3';

const props = defineProps({
    client:{
        type:Object
    }
});

const form = useForm({
    // delete_flag: 1
});

</script>