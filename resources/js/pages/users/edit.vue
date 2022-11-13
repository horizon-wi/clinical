<template>

    <Head>
        <title>Users - Edit</title>
    </Head>

    <h1>User - Edit</h1>
    <Link :href="route('users.index')">back</Link> |

    <Form v-bind:user="user" />

</template>

<script>
import Form from './form.vue';

export default{
    components:{
        Form
    },
    props:{
        user:{
            type: Object
        }
    }
}
</script>