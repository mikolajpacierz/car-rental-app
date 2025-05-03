<script setup>
import axiosInstance from "../services/axiosInstance.js";
import {onMounted, ref} from "vue";
import TabNav from "../components/TabNav.vue";

const payments = ref(null);

const fetchPayments = async () => {
  try {
    const response = await axiosInstance.get("/payments");
    payments.value = response.data;
  } catch (error) {
    console.error(error);
  }
};

onMounted(fetchPayments);

</script>

<template>
  <TabNav/>
</template>

<style scoped>

</style>