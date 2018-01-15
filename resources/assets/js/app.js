
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
        msg: 'Say something:',
        content: "",
        posts: []
    },

    created() {
        axios.get('http://127.0.0.1:8000/posts')
        .then(response =>  {
            this.posts = response.data;  //  We putting data in the posts array of tyhe data property method
          
        })
        .catch(function (error){
            console.log(error);  // show if there is a failure
        });
     },
    
  methods: {
        addPost(){
           
           axios.post('http://127.0.0.1:8000/addPost' , {
               content: this.content
               
           })
           .then(function (response) {
               console.log('Saved successfully'); 
               
               if(response.status === 200){

                

                app.posts = response.data;
                app.content = "";
                
            }
           })
           .catch(function (error){
               console.log(error);  // show if there is a failure
           });
        }
    }
});

