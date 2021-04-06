<template>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="#">Product Bin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse " id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto ml-5" >
        <li class="nav-item mr-3">

        <router-link to="/">Home</router-link>
        </li>
        <li class="nav-item mr-3">
      <router-link to="/add">Add Product</router-link>
        </li>

        <li class="nav-item">
          <router-link to="/productlist">Product List</router-link>
        </li>


      </ul>

      <ul class="navbar-nav" >
        <li class="nav-item mr-3">
          <router-link to="/about">About</router-link>
        </li>
        <li class="nav-item">
          <router-link to="/contact">Contact</router-link>
        </li>


      </ul>

    </div>
  </nav>


</template>

<script>
    export default {
        name: "navbar"
    }
</script>

<style scoped>

</style>
