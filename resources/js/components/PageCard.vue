<template>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title" v-text="data.name"></h5>

            <p class="card-text text-muted">Created: 
                <span class="text-dark">{{ data.created_at | humanDate }}</span>
            </p>

            <p class="card-text text-muted">Theme: 
                <span class="text-dark">{{ data.theme }}</span>
            </p>

            <a :href="viewUrl" class="card-link" target="_blank">View</a>
            <a :href="editUrl" class="card-link">Edit</a>
            <a href="#" class="card-link delete-view" @click="deletePage(data.slug)">Delete</a>
        </div>
    </div>
</template>

<script>
const moment = require('moment');
const axios = window.axios;
export default {
    name: 'page-card',
    props: ['data'],
    data: function() {
        return {
            slug: this.data.slug,
            created_at: this.data.created_at
        }
    },

    methods: {
        deletePage: function(slug) {
            axios.get(`/page/delete/${slug}`)
                .then(response => {
                    console.log(response);
                })
                .catch(error => {
                    console.log(error);
                });
        }
    },

    computed: {
        viewUrl: function() {
            return `/page/${this.slug}`
        },
        editUrl: function() {
            return `/page/edit/${this.slug}`
        }
    },

    filters: {
        humanDate: function(val) {
            return moment(val, "YYYY-MM-DD hh:mm:ss").fromNow();
        }
    }
};
</script>

<style>
    
</style>
