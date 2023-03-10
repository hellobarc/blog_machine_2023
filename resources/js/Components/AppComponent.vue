<template>
    <div class="">
      Admin panel hobe
    </div>
</template>

<script>
    export default {
        components: { },
          data(){
              return {
                  title: 'App component'
              }
          },
          mounted() {
              this.$store.commit('initializeLogin');
          },

    }
</script>


<style>


</style>
