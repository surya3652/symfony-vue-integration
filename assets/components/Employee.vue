<template>
    <div class="hello">
      <h1>Welcome! I am from Vue.js</h1>
      <router-link to="/">
      </router-link>
      <button @click="handleGet()" class="btn btn-primary">Get</button>
      <button class="btn btn-danger">Post</button>
      <br />
      <!-- <input v-if="show" v-model="id" type="number" placeholder="enter the id" />
      <button v-if="show" class="btn btn-success" @click="handlePost()">
        Submit
      </button> -->
      <div class="container">
        <div class="card">
          <div class="card-header">Employee Details</div>
          <div class="card-body">
            <table v-if="show" class="table table-bordered">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Designation</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="employee in employees" :key="employee.emp_id">
                  <td>{{ employee.emp_id }}</td>
                  <td>{{ employee.emp_name }}</td>
                  <td>{{ employee.emp_designation }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </template>
  
  <script>
  import axios from "axios";
  import { RouterLink } from "vue-router";
  
  console.log("Welcome to your Vue.js App");
  export default {
      name: "Dashboard",
      props: {},
      data() {
          return {
              show: false,
              employees: [],
          };
      },
      methods: {
          handlePost() { },
          async handleGet() {
              this.show = true;
              await axios
                  .get("http://127.0.0.1:8000/api/emp")
                  .then((res) => {
                  console.log(res.data);
                  this.employees = res.data;
              })
                  .catch((err) => {
                  console.log(err);
              });
          },
      },
      components: { RouterLink }
  };
  </script>
  
  <!-- Add "scoped" attribute to limit CSS to this component only -->
  <style>
  body {
    background-color: #42b983;
    text-align: center;
  }
  h3 {
    margin: 40px 0 0;
  }
  ul {
    list-style-type: none;
    padding: 0;
  }
  li {
    display: inline-block;
    margin: 0 10px;
  }
  .btn {
    margin: 5px;
  }
  a {
    color: #42b983;
  }
  </style>
  