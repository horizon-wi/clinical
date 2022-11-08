<template>

    <h1>view client</h1>

    <Link :href="route('clients.index')">back</Link>
    <hr />

    <Link :href="route('clients.edit', {'client_id': client.client_id})">edit</Link>
    <br />

    <!-- <Link :href="route('clients.confirm_deletion', {'client_id': client.client_id})">delete</Link> -->
    <button type="button" @click="destroy(client.client_id)">delete</button>
    <br />

    <p>{{client.client_id}}</p>
    <p>{{client.first_name}}</p>
    <p>{{client.last_name}}</p>
    <p>{{moment(client.dob).utc().format("MM/DD/YYYY")}}</p>

</template>

<script setup>
import moment from "moment";
import { Link } from '@inertiajs/inertia-vue3';
import { useForm } from "@inertiajs/inertia-vue3";

const props = defineProps({
    client:{
        type:Object
    }
});

const form = useForm();

function destroy(id) {
    if (confirm("Are you sure you want to Delete")) {
        form.delete(route('clients.delete', id));
    }
}

</script>