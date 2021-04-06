<template>
<div class="container mt-5">
  <h4 class="text-center">Add Product</h4>

  <form @submit.prevent="formSubmit">
    <div class="form-group">
      <label for="exampleInputPName">Product Name</label>
      <input v-validate="'required|min:3'" name="name"  type="text" class="form-control" id="exampleInputPName"  placeholder="Enter Product Name" v-model="item.name">
      <div  v-show="errors.has('name')" class="alert alert-danger" autofocus>{{errors.first('name')}} </div>
    </div>

    <div class="form-group">
      <label for="exampleInputQuantity">Quantity</label>
      <input v-validate="'required|numeric|max_value:10'"  name="quantity" type="text" class="form-control" id="exampleInputQuantity" placeholder="Quantity" v-model="item.quantity">
      <div v-show="errors.has('quantity')" class="alert alert-danger">{{errors.first('quantity')}}</div>

    </div>

    <div class="form-group">
      <label for="exampleInputPrice">Price</label>
      <input v-validate="'required|max:7|numeric'" name="price"  type="text" class="form-control" id="exampleInputPrice"  placeholder="Price of the Product" v-model="item.price">
      <div v-show="errors.has('price')" class="alert alert-danger">{{errors.first('price')}}</div>



    </div>

      <div class="form-group">
        <label for="exampleFormControlFile1">Image</label>
        <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" placeholder="image" v-validate="'mimes:image/png,image/jpg'" @change="getImage($event)">

        <div v-show="errors.has('image')" class="alert alert-danger">{{errors.first('image')}}</div>
      </div>

    <button v-show="item.name && item.quantity && item.price"  type="submit" class="btn btn-primary">Add To Cart</button>
  </form>
</div>
</template>

<script>

    export default {
      name: "addproduct",

      data(){
        return{
          item:{
            name:'',
            quantity:0,
            price:0,
            image:''
          }
        }
      },

      methods:{

        formSubmit(){
         this.$http.post("http://localhost:8000/api/add",this.item).then(res=>{
           console.log(res)
           this.$router.push("/productlist")
         },error=>{
           console.log(error)
         })
        },

        getImage(e){
          console.log(e)
         var fileReader = new FileReader()
          fileReader.readAsDataURL(e.target.files[0])

          fileReader.onload = (e)=>{
            this.item.image =e.target.result

          }
          console.log(this.item)

        }

      }




    }


</script>

<style scoped>

</style>
