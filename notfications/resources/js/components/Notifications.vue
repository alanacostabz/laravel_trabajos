<template>
    <li class="nav-item dropdown">
       
         <a id="navbarDropdown" class="nav-link dropdown-toggle" v-if="notifications.length" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            <span class="glyphicon glyphicon-bell"></span>
            <span class="badge badge-pill badge-secondary" text="notifications.length"></span> 
            <span class="caret"></span>
        </a>

         <div class="dropdown-menu dropdown-menu-right" v-for="notification in notifications" aria-labelledby="navbarDropdown">
            <a @click="markAsRead(notificacion)" class="dropdown-item" v-text="notifiation.data.text"  :href="notification.data.link"></a>
        <!--
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form> -->
        </div>
    </li>
</template>

<script>
    export default {
        data() {
            return {
                'notifications': []
            }

        },
        mounted() {
            axios.get('/notificaciones').then(res => {
                this.notifications = res.data;
            });
        },
        methods: {
            markAsRead(notificacion) {
                axios.patch('notificaciones/' + notificacion.id)
            }
        }
    }
</script>
