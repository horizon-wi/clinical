<template>

    <Header />

    <h1>clients - index</h1>

    <a href="/clients/add/">add</a>
    <br />

    <div>
        Total clients: {{ Object.keys(clients).length }}
    </div>

    <table>
        <tbody>
            <tr v-for="client in clients">
                <td>{{client.first_name}} {{client.last_name}}</td>
                <td>{{moment(client.dob).utc().format("MM/DD/YYYY")}}</td>
                <td>
                    <Link :href="route('clients.view', {'client_id' : client.client_id})">view</Link>
                </td>
            </tr>
        </tbody>
    </table>


</template>

<script setup>
import moment from "moment";
import { Link } from '@inertiajs/inertia-vue3';

const props = defineProps({
    clients: {
        type: Object,
        default: () => ({}),
    }
});

</script>

<script>
import Header from '@/components/header.vue';

export default{
    components:{
        Header
    },
}
</script>