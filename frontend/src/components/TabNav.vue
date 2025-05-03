<script setup>
</script>

<template>
  <v-app>
    <v-app-bar class="app-bar" app>
      <v-tabs>
        <v-tab to="/cars">Cars</v-tab>
        <v-tab to="/clients">Clients</v-tab>
        <v-tab to="/reservations">Reservations</v-tab>
        <v-tab to="/payments">Payments</v-tab>
      </v-tabs>
    </v-app-bar>
  </v-app>
</template>

<style scoped>
.app-bar {
  background-color: darkblue;
  color: white;
}
</style>