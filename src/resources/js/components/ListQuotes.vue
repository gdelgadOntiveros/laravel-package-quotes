<script>
export default {
  name: 'list-quotes',

  data() {
    return {
      listquotes: [],
      page: 1,
      limit: 10
    }
  },

  mounted() {
    this.getQuotes();
  },

  methods: {
    getQuotes() {
      this.listquotes = []
      axios.get(`/api/quotes-ui?page=${this.page}&limit=${this.limit}`)
        .then(response => {
            this.listquotes = response.data.quotes
        })
    }
  }

}
</script>

<template>
  <div class="container">
    <router-link :to="{ name: 'quote' }">
      <button type="button" class="btn btn-primary">
              Random Quote
      </button>
    </router-link>

    <h1>List Quotes</h1>

    <div class="container">
      <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Quote</th>
            <th scope="col">Author</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="qt in listquotes">
            <th scope="row">{{ qt.id }}</th>
            <td>{{ qt.quote }}</td>
            <td>{{ qt.author }}</td>
            <td>
                <p>
                    <router-link :to="{ name: 'quote', params: { id: qt.id } }">
                        Show
                    </router-link>
                </p>
            </td>
          </tr>
        </tbody>
      </table>
      <!-- <nav aria-label="Page navigation">
        <ul class="pagination">
          <li class="page-item" v-if="page > 1"><a @click="changePage(page -1)" class="page-link" href="#">Previous</a></li>
          <li v-for="pageNumber in pages" class="page-item"><a @click="changePage(pageNumber)"  class="page-link" href="#">{{pageNumber}}</a></li>
          <li class="page-item" v-if="page < pages.length"><a @click="page + 1" class="page-link" href="#">Next</a></li>
        </ul>
      </nav> -->
    </div>
  </div>
</template>
