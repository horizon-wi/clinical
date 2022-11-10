<template>

    <div>
        <Link :href="route('logout')">logout</Link>
    </div>

</template>

<script>
import { Link } from '@inertiajs/inertia-vue3';

export default{
    components:{
        Link
    }
}

</script>