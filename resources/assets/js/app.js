
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');
// require('./jquery-ui');
// require('./Chart');
// require('./bulk');

// import Vue from "vue";
window.Vue = require("vue");
import BufferList from "./components/BufferList.vue";

// Vue.component('app', require('./components/App.vue'));


const app = new Vue({
  el: "#app",
  components: {
    BufferList
  },
});

