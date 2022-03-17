<template>
  <v-app>
    <v-app-bar app color="grey darken-3" dark>
      <a href="/" id="title-link"
        ><v-app-bar-title> The One Post Blog </v-app-bar-title></a
      >
    </v-app-bar>
    <v-main>
      <slot></slot>
    </v-main>
  </v-app>
</template>

<script>
export default {};
</script>

<style>
#title-link {
  text-decoration: none;
  color: unset;
}
</style>
