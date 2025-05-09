<script setup>
import {onMounted, ref} from "vue";
import axiosInstance from "../services/axiosInstance.js";

const cars = ref([]);

const fetchCars = async () => {
  try {
    const response = await axiosInstance.get("/cars");
    cars.value = response.data;
  } catch (error) {
    console.error(error);
  }
};

const headers = [
  {title: "ID", value: "id"},
  {title: "Brand", value: "brand"},
  {title: "Model", value: "model"},
  {title: "Year", value: "year"},
  {title: "Color", value: "color"},
]

onMounted(fetchCars);

</script>

<template>
  <v-container class="table-container">
    <v-data-table :headers="headers" :items="cars" class="table">
    </v-data-table>
  </v-container>
</template>

<style>
</style>