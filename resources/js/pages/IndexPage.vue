<template>
  <standard-layout>
    <div
      class="d-flex justify-content-center h-100 align-items-center flex-column"
    >
      <h1 class="mb-16">Hello World!</h1>
      <h2>Welcome to the One Post Blog.</h2>
      <div class="h2">
        <router-link :to="{ name: 'post' }"
          >Click here to see the post</router-link
        >
      </div>
    </div>
  </standard-layout>
</template>

<script>
import StandardLayout from "./StandardLayout.vue";
export default {
  components: {
    StandardLayout,
  },
  methods: {
    goToPost: function () {
      this.$router.push({ name: "post" });
    },
  },
};
</script>

<style>
</style>
