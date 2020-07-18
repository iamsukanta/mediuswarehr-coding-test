
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// import Vue from "vue";


require('./jquery-ui');
require('./Chart');
// require('./bulk');
require("./bootstrap");
window.Vue = require("vue");
import BufferList from "./components/BufferList.vue";



// Vue.component('app', require('./components/App.vue'));


const app = new Vue({
  el: "#app",
  components: {
    BufferList
  },
});

