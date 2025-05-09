<script setup>
import {onMounted, ref} from "vue";
import axiosInstance from "../services/axiosInstance.js";

const reservations = ref([]);

const fetchReservations = async () => {
  try {
    const response = await axiosInstance.get("/reservations");
    reservations.value = response.data;
  } catch (error) {
    console.error(error);
  }
}

const headers = [
  {title: "ID", value: "id"},
  {title: "Payment", value: "payment"},
  {title: "Date", value: "date"},
]

onMounted(fetchReservations);

</script>

<template>
  <v-container class="table-container">
    <v-data-table :headers="headers" :items="reservations" class="table">
    </v-data-table>
  </v-container>
</template>

<style scoped>

</style>