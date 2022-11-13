<template>

    <Head>
        <title>Users - View</title>
    </Head>
    
    <h1>User - View</h1>

    <Link :href="route('users.index')">back</Link> |
    <Link :href="route('users.edit', {'user_id': user.id})">edit</Link> |
    <button type="button" @click="confirm_delete(user.id)">delete</button>

    <ul>
        <li>{{user.first_name}}</li>
        <li>{{user.last_name}}</li>
        <li>{{user.email}}</li>
    </ul>

</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';

export default{
    props:{
        user:{
            type:Object
        }
    },
    methods:{
        confirm_delete(user_id){
            if(confirm("Are you sure you want to delete this user?")){
                this.form.delete(route('users.delete', user_id));
            }
        }
    },
    setup(props){
        const form = useForm();
        return {form}
    }
}

</script>
