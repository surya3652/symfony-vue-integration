<template>
  <div class="hello">
    <h1>Welcome! I am from Vue.js</h1>
    <button class="btn btn-primary">Get</button>
    <button @click="handleGet()" class="btn btn-danger">Post</button>
    <br />
    <input v-if="show" v-model="id" type="number" placeholder="enter the id" />
    <button v-if="show" class="btn btn-success" @click="handlePost()">Submit</button>
  </div>
</template>

<script>
console.log("Welcome to your Vue.js App");
export default {
  name: "Dashboard",
  props: {},
  data() {
    return {
      show: false,
      id: 0,
      name: ""
    };
  },
  methods: {
    handlePost() {
      
    },
    handleGet() {
      this.show = true;
    },
  },
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
