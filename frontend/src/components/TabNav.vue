  <script setup>
  </script>
  
  <template>
    <v-app-bar class="app-bar">
      <v-tabs>
        <v-tab to="/cars">Cars</v-tab>
        <v-tab to="/clients">Clients</v-tab>
        <v-tab to="/reservations">Reservations</v-tab>
        <v-tab to="/payments">Payments</v-tab>
      </v-tabs>
    </v-app-bar>
  </template>
  
  <style scoped>
  .app-bar {
    background-color: darkblue;
    color: white;
  }
  </style>