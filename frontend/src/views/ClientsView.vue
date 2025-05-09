<script setup>
import {onMounted, ref} from "vue";
import axiosInstance from "../services/axiosInstance.js";

const clients = ref([])

const fetchClients = async () => {
  try {
    const response = await axiosInstance.get('/clients');
    clients.value = response.data;
  } catch (error) {
    console.error(error);
  }
}

const headers = [
  {title: "ID", value: "id"},
  {title: "First Name", value: "firstName"},
  {title: "Last Name", value: "lastName"},
  {title: "Phone Number", value: "phoneNumber"},
  {title: "Email", value: "email"},
  {title: "Address", value: "address"},
]

onMounted(fetchClients);

</script>

<template>
  <v-container class="table-container">
    <v-data-table :headers="headers" :items="clients" class="table">
    </v-data-table>
  </v-container>
</template>

<style scoped>

</style>