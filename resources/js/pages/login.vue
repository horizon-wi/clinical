<template>

    <h1>Login</h1>

    <form @submit.prevent="login_form.post(route('login.authenticate'))">

        <div v-if="login_form.errors">
            <ul>
                <li v-for="error in login_form.errors">{{error}}</li>
            </ul>
        </div>

        <label for="email">Email</label>
        <input type="text" v-model="login_form.email" id="email" />
        <br />

        <label for="password">Password</label>
        <input type="password" v-model="login_form.password" id="password" />
        <br />

        <button type="submit">Login</button>

    </form>

</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';

export default{
    data(){

        const login_form = useForm({
            email: '',
            password: ''
        })


        return {login_form}

    }
}
</script>