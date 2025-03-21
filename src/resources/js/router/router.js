import { createMemoryHistory, createRouter } from 'vue-router'
import ListQuotes from '@/components/ListQuotes.vue'
import Quote from '@/components/Quotes.vue'

const history = createMemoryHistory()

const router = createRouter({
  history,
  routes: [
        {   path: '/',  name: 'list-quote', component: ListQuotes    },
        {   path: '/quote/:id?',  name: 'quote', component: Quote    }
    ],
})

export default router;