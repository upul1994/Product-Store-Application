<template>


  <div class="container mt-5">
    <h4 class="text-center">Edit Product</h4>

    <form @submit.prevent="updateFormSubmit"  >
      <div class="form-group">
        <label for="exampleInputPName">Product Name</label>
        <input v-validate="'required|min:3'" name="name"  type="text" class="form-control" id="exampleInputPName"  placeholder="Enter Product Name" v-model="item.name" >
        <div  v-show="errors.has('name')" class="alert alert-danger" autofocus>{{errors.first('name')}} </div>
      </div>

      <div class="form-group">
        <label for="exampleInputQuantity">Quantity</label>
        <input v-validate="'required|numeric|max_value:5'"  name="quantity" type="text" class="form-control" id="exampleInputQuantity" placeholder="Quantity" v-model="item.quantity" >
        <div v-show="errors.has('quantity')" class="alert alert-danger">{{errors.first('quantity')}}</div>

      </div>

      <div class="form-group">
        <label for="exampleInputPrice">Price</label>
        <input v-validate="'required|max:4|numeric'" name="price"  type="text" class="form-control" id="exampleInputPrice"  placeholder="Price of the Product" v-model="item.price" >
        <div v-show="errors.has('price')" class="alert alert-danger">{{errors.first('price')}}</div>



      </div>

      <div class="form-group">
        <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" class="form-control-file" id="exampleFormControlFile1">
      </div>

      <button v-show="item.name && item.quantity && item.price"  type="submit" class="btn btn-primary">Update Product</button>
    </form>
  </div>








</template>

<script>
export default {
name: "edit",

  data(){
  return{
    item:[]
  }

  },

created() {

  this.showProductById(this.$route.params.id)
},

methods:{
  showProductById($id){
   this.$http.get("http://localhost:8000/api/show/"+$id).then(res=>{
     this.item =res.body.msg

   },error=>{
     console.log(error)
   })

  },

  updateFormSubmit(){
    this.$http.put("http://localhost:8000/api/edit/"+this.$route.params.id,this.item).then(res=>{
      this.$router.push("/productlist")
    },error=>{
      console.log(error)
    })
  }
}



}
</script>

<style scoped>

</style>
