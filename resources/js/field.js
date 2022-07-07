import IndexField from './components/IndexField'
import DetailField from './components/DetailField'
import FormField from './components/FormField'

Nova.booting((app, store) => {
  app.component('index-nlfm-image', IndexField)
  app.component('detail-nlfm-image', DetailField)
  app.component('form-nlfm-image', FormField)
})
