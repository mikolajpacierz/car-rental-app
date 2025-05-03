<script setup>
import {onMounted, ref} from "vue";
import axiosInstance from "../services/axiosInstance.js";
import TabNav from "../components/TabNav.vue";

const reservations = ref(null);

const fetchReservations = async () => {
  try {
    const response = await axiosInstance.get("/reservations");
    reservations.value = response.data;
  } catch (error) {
    console.error(error);
  }
}

onMounted(fetchReservations);

</script>

<template>
  <TabNav/>
</template>

<style scoped>

</style>