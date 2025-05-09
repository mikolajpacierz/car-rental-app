<script setup>
import axiosInstance from "../services/axiosInstance.js";
import {onMounted, ref} from "vue";
import TabNav from "../components/TabNav.vue";

const payments = ref([]);

const fetchPayments = async () => {
  try {
    const response = await axiosInstance.get("/payments");
    payments.value = response.data;
  } catch (error) {
    console.error(error);
  }
};

const headers = [
  {title: "ID", value: "id"},
  {title: "Reservation", value: "reservation"},
  {title: "Amount", value: "amount"},
  {title: "Method", value: "method"},
  {title: "Date", value: "date"},
]

onMounted(fetchPayments);

</script>

<template>
  <v-container class="table-container">
    <v-data-table :headers="headers" :items="payments" class="table">
    </v-data-table>
  </v-container>
</template>

<style scoped>

</style>