<script setup>
import {onMounted, ref} from "vue";
import axiosInstance from "../services/axiosInstance.js";
import TabNav from "../components/TabNav.vue";

const clients = ref([])

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
  <TabNav/>
</template>

<style scoped>

</style>