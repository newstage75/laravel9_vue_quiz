require('./bootstrap');

//Vue.jsとVueコンポーネント(Sample.vue)を使用するように定義
import Vue from 'vue'
import Sample from './components/Sample.vue'

Vue.component('sample-component',require('./components/Sample.vue').default);

const app = new Vue({
    el: '#app',
    components: {
        Sample
    }
});