<template>
    <li class="list-group-item" style="display: flex; justify-content: space-between;">
        <span v-text="data.name"></span>
        <span>
            <a :href="viewUrl" class="card-link" target="_blank">View</a>
            <a :href="editUrl" class="card-link">Edit</a>
            <a href="#" class="card-link delete-view" @click="deletePage(data.slug)">Delete</a>
        </span>
    </li>
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
