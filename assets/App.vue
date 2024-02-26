
<template>
  <div class="hello">
    <h1>Welcome to Your Vue.js App</h1>
    <button class="btn btn-primary">Get</button>
    <button class="btn btn-danger">Post</button>
  </div>
</template>

<script>
console.log("Welcome to your Vue.js App");
export default {
  name: "Dashboard",
  props: {},
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
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

