<script setup>
import {onMounted, ref} from "vue";
import axiosInstance from "../services/axiosInstance.js";

const clients = ref(null)

const fetchClients = async () => {
  try {
    const response = await axiosInstance.get('/clients');
    clients.value = response.data;
  } catch (error) {
    console.error(error);
  }
}

onMounted(fetchClients);

</script>

<template>

</template>

<style scoped>

</style>