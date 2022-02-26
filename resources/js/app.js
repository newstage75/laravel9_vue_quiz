require('./bootstrap');

//Vue.jsとVueコンポーネント(Sample.vue)を使用するように定義
import Vue from 'vue'
import Sample from './components/Sample.vue'
import DynamicComponent from './components/DynamicComponent.vue'
import MyComponent from './components/MyComponent.vue'

Vue.component('sample-component',require('./components/Sample.vue').default);
Vue.component('dynamic-component',require('./components/DynamicComponent.vue').default);
Vue.component('my-component',require('./components/MyComponent.vue').default);

const app = new Vue({
    el: '#app',
    components: {
        Sample,
        DynamicComponent,
        MyComponent
    }
});