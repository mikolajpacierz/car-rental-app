<script setup>
import {onMounted, ref} from "vue";
import axiosInstance from "../services/axiosInstance.js";

const cars = ref(null);

const fetchCars = async () => {
  try {
    const response = await axiosInstance.get("/cars");
    cars.value = response.data;
  } catch (error) {
    console.error(error);
  }
};

onMounted(fetchCars);

</script>

<template>
  
</template>

<style scoped>

</style>