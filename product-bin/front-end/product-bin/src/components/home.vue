<template>
  <div class="container mt-4">
  <div class="jumbotron">
    <h1 class="display-4">Product Bin..</h1>
    <p class="lead">This is a simple web application for store products.</p>
    <hr class="my-4">
    <p>If you want to store new products click below...</p>
    <p class="lead">
      <router-link class="btn btn-primary btn-lg" to="/add">Getting Started</router-link>
    </p>
  </div>
  </div>
</template>

<script>
    export default {
        name: "home"
    }
</script>

<style scoped>

</style>
