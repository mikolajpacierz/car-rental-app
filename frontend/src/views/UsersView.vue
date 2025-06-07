<script setup>
import {onMounted, ref} from "vue";
import axiosInstance from "../services/axiosInstance.js";

const users = ref([])

const fetchUsers = async () => {
  try {
    const response = await axiosInstance.get('/users');
    users.value = response.data;
  } catch (error) {
    console.error(error);
  }
}

const headers = [
  {title: "ID", value: "id"},
  {title: "Email", value: "email"},
  {title: "Password", value: "password"},
  {title: "First Name", value: "firstName"},
  {title: "Last Name", value: "lastName"},
  {title: "Phone Number", value: "phoneNumber"},
  {title: "Address", value: "address"},
]

onMounted(fetchUsers);

</script>

<template>
  <v-container class="table-container">
    <v-data-table :headers="headers" :items="users" class="table">
    </v-data-table>
  </v-container>
</template>

<style scoped>

</style>