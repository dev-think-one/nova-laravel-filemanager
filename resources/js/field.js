Nova.booting((Vue, router, store) => {
  Vue.component('index-nlfm-image', require('./components/IndexField'))
  Vue.component('detail-nlfm-image', require('./components/DetailField'))
  Vue.component('form-nlfm-image', require('./components/FormField'))
})
