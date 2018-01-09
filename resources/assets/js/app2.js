
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

const app2 = new Vue({
    el: '#app',
    data: {
        msg: 'Update Posts:',
        content: "",
        parameters: []
    },

    created() {
        axios.get('https://api.thingspeak.com/channels/344737/feeds.json?api_key=2JBUCVBN71D4FCM9&field1=0')
        .then(response =>  {
            this.parameters = response.data;  //  We putting data in the posts array of tyhe data property method
          
        })
        .catch(function (error){
            console.log(error);  // show if there is a failure
        });
     },
    

});

