import Vue from 'vue'
import Router from 'vue-router'
import AddProduct from "../components/addproduct"
import About from "../components/about"
import Contact from "../components/contact"
import ProductList from "../components/productlist"
import Home from "../components/home"
import Edit from "../components/edit"


Vue.use(Router)

export default new Router({

  mode:"history",  // remove to # tag

  routes: [
    {
      path: '/add',
      name: 'addproduct',
      component:AddProduct
    },

    {
      path: '/about',
      name: 'about',
      component:About
    },

    {
      path: '/contact',
      name: 'contact',
      component:Contact
    },

    {
      path: '/productlist',
      name: 'productlist',
      component:ProductList
    },
    {
      path: '/',
      name: 'home',
      component:Home
    },

    {
      path: '/edit/:id',
      name: 'edit',
      component:Edit
    }

  ]



})
