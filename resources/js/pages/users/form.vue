<template>

    <form @submit.prevent="user_form.post(route('users.save', {user_id: user.id}))">

        first name
        <input type="text" v-model="user_form.first_name" />
        <br />

        last name
        <input type="text" v-model="user_form.last_name" />
        <br />

        email
        <input type="text" v-model="user_form.email" />
        <br />

        <button type="submit">save</button>

    </form>

</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';

export default{
    components:{
        useForm
    },
    props:{
        user:{
            type: Object
        }
    },
    data(){

        const user_form = useForm({
            first_name: !this.user || (this.user && !this.user.first_name) ? '' : this.user.first_name,
            last_name: !this.user || (this.user && !this.user_last_name) ? '' : this.user.last_name,
            email: !this.user || (this.user && !this.user.email) ? '' : this.user.email
        });

        return{ user_form }

    }
}
</script>