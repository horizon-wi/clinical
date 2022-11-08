<template>

    <form @submit.prevent="form.post(route('clients.save'))">

        <div>
            <ul v-for="error in form.errors">
                <li>{{error}}</li>
            </ul>
        </div>


        first name <input type="text" v-model="form.first_name" />
        <div v-if="form.errors.first_name">{{ form.errors.first_name }}</div>
        <br />

        last name <input type="text" v-model="form.last_name" />
        <div v-if="form.errors.last_name">{{ form.errors.last_name }}</div>
        <br />

        dob <input type="text" v-model="form.dob" />
        <div v-if="form.errors.dob">{{ form.errors.dob }}</div>
        <br />

        <button type="submit">save</button>

    </form>

</template>


<script>
import moment from 'moment';
import { useForm } from '@inertiajs/inertia-vue3';

export default {
    setup(props){
    },
    data(){

        const form = useForm({
            first_name: !this.client || (this.client && !this.client.first_name) ? '' : this.client.first_name,
            last_name: !this.client || (this.client && !this.client.last_name) ? '' : this.client.last_name,
            dob: !this.client || (this.client && !this.client.dob) ? '' : moment(this.client.dob).utc().format("MM/DD/YYYY")
        });

        return {
            form
        }

    },
    props: {
        client: {
            type: Object
        }
    }
}
</script>