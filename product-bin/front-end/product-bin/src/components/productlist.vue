<template>


  <div class="container mt-4">
    <h4 class="text-center">Product List</h4>
    <hr class="my-4">
    <div class="row">
      <div  class="col-lg-12 my-3">
        <div class="pull-right">
          <div class="btn-group">
            <button class="btn btn-info" id="list">
              List View
            </button>
            <button class="btn btn-danger" id="grid">
              Grid View
            </button>
          </div>
        </div>
      </div>
    </div>

    <div id="products" class="row view-group">

      <div v-for="item in items" class="item col-xs-4 col-lg-4">
        <div class="thumbnail card">
          <div class="img-event">
            <img class="group list-group-image img-fluid" style="width:300px;height: 200px " v-bind:src="'http://localhost:8000/'+item.image" alt="" />
          </div>
          <div class="caption card-body">
            <h4 class="group card-title inner list-group-item-heading">
              {{item.name}}</h4>

            <div class="row">
              <div class="col-xs-12 col-md-6">
                <p class="lead text-danger">
              price ${{item.price}}</p>
              </div>
              <div class="col-xs-12 col-md-6">
                <p class="lead text-danger">
                  Quantity-{{item.quantity}}</p>
              </div>
              <div class="col-xs-12 col-md-6">
               <router-link :to="'/edit/'+item.id" class="btn btn-primary">Edit</router-link>
                <a class="btn btn-secondary" @click="deleteProduct($event)" v-bind:id="item.id">delete</a>
              </div>



            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</template>

<script>
    export default {
        name: "productlist",


      data(){
          return{
            items:[]
          }
      },

      created() {
          this.$http.get("http://localhost:8000/api/get").then(res=>{
           this.items =res.body.allProducts;
          },error=>{
            console.log(error)
          })
      },

  methods:{
    deleteProduct(event){
      const id =event.target.id
      this.$http.delete("http://localhost:8000/api/delete/"+id).then(res=>{

        var position = this.items.findIndex(element=>{
        element.id=event.target.id
        })

        this.items.splice(position,1);
      },error=>{
        console.log(error)
      })
    }
  }


    }


    $(document).ready(function() {
      $('#list').click(function(event){event.preventDefault();$('#products .item').addClass('list-group-item');});
      $('#grid').click(function(event){event.preventDefault();$('#products .item').removeClass('list-group-item');$('#products .item').addClass('grid-group-item');});
    });






</script>

<style scoped>

  .view-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: row;
    flex-direction: row;
    padding-left: 0;
    margin-bottom: 0;
  }
  .thumbnail
  {
    margin-bottom: 30px;
    padding: 0px;
    -webkit-border-radius: 0px;
    -moz-border-radius: 0px;
    border-radius: 0px;
  }

  .item.list-group-item
  {
    float: none;
    width: 100%;
    background-color: #fff;
    margin-bottom: 30px;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    max-width: 100%;
    padding: 0 1rem;
    border: 0;
  }
  .item.list-group-item .img-event {
    float: left;
    width: 30%;
  }

  .item.list-group-item .list-group-image
  {
    margin-right: 10px;
  }
  .item.list-group-item .thumbnail
  {
    margin-bottom: 0px;
    display: inline-block;
  }
  .item.list-group-item .caption
  {
    float: left;
    width: 70%;
    margin: 0;
  }

  .item.list-group-item:before, .item.list-group-item:after
  {
    display: table;
    content: " ";
  }

  .item.list-group-item:after
  {
    clear: both;
  }
</style>
