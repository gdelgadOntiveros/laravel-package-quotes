<script>
export default {
    name: 'quote',
    data() {
        return {
            quote: {}
        }
    },

    mounted() {
        this.getQuotes();
    },
    methods: {
        getQuotes() {
            let id = this.$route.params.id ? this.$route.params.id : 'random'
            this.listardatos = []
            axios.get(`/api/quotes-ui/${id}`)
                .then(response => {
                    this.quote = response.data
                })
        },
    }
}

</script>

<template>
    <div class="container">
        <router-link :to="{ name: 'list-quote' }">
            <button type="button" class="btn btn-primary">
                    List Quote
            </button>
        </router-link>


        <h2 class="mb-2 text-lg font-semibold text-black-900">Quotes {{ $route.params.id ? $route.params.id : 'Random' }}</h2>
        <ul class="max-w-md space-y-1 text-black-900 list-disc list-inside">
            <li>
                ID: {{ quote.id }}
            </li>
            <li>
                AUTHOR: {{ quote.author }}
            </li>
            <li>
                QUOTE: {{ quote.quote }}
            </li>
        </ul>
    </div>

</template>