<template>

    <Head>
        <title>Users</title>
    </Head>

    <h1>Users - index</h1>

    <Link :href="route('users.add')">Add</Link>

    <div v-if="users">
        <table>
            <tbody>
                <tr v-for="user in users">
                    <td>{{user.first_name}} {{user.last_name}}</td>
                    <td>{{user.email}}</td>
                    <td>
                        <Link :href="route('users.view', {'user_id': user.id})">view</Link>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <div v-else>no users</div>

</template>

<script>
export default{
    props:{
        users:{
            type: Object
        }
    }
}
</script>