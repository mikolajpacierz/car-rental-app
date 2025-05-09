<script setup>
import TabNav from "./components/TabNav.vue";
</script>

<template>
  <v-app>
    <TabNav/>
    <v-main>
      <router-view></router-view>
    </v-main>
  </v-app>
</template>

<style>
</style>
