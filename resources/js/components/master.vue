<template>
    <div>
      <div id="main-wrapper">
         <div class="_menu_logo">
            <router-link to="/">
                  <img class="_menu_logo_img" src="/img/logo.png" title="" alt="">
            </router-link>
         </div>
        <router-view/>
      </div>
    </div>
</template>

<script>
// import headermenu from './pages/headermenu.vue'
// import Footer from './pages/footer.vue'
export default {
   components:{
        // headermenu,
        // Footer
   },
    data(){
       return {
          sidebar: false
       }
    }, 
    async created(){

    }
}
</script>