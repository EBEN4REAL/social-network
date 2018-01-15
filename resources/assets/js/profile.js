
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));

const app = new Vue({
    el: '#app',
    data: {
        msg: 'Post something:',
        privateMessages: [],
        singleMsgs: []
        
    },

    created() {
        axios.get('http://127.0.0.1:8000/getMessages')
        .then(response =>  {
            app.privateMessages = response.data;  //  We putting data in the posts array of tyhe data property method
          
        })
        .catch(function (error){
            console.log(error);  // show if there is a failure
            
        });
     },
    
  methods: {
      message: function(id){
          
        axios.get('http://127.0.0.1:8000/getMessages/' + id)
        .then(response => {
            console.log(response.data);
            app.singleMsgs = response.data;
        })
        .catch(function (error){
          console.log(error);
        });
      }
    }
});

  