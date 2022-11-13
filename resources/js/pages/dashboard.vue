<template>

    <h1>Dashboard</h1>

    <Header />

    <ul>
        <li>
            <Link :href="route('clients.index')">clients</Link>
        </li>
        <li>
            <Link :href="route('users.index')">users</Link>
        </li>
    </ul>

</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';
import Header from '@/components/header.vue';

export default{
    components:{
        Link, Header
    }
}
</script>