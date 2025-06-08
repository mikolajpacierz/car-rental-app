<script setup>
import {Auth} from "../services/auth.js"

const {email, password, firstName, lastName, phoneNumber, address, register} = Auth();
</script>

<template>
  <v-form @submit.prevent="register">
    <v-col>
      <v-row>
        <v-text-field v-model="email" label="E-mail"></v-text-field>
      </v-row>     
      <v-row>
        <v-text-field v-model="password" type="password" label="Password"></v-text-field>
      </v-row>
      <v-row>
        <v-text-field v-model="firstName" label="First Name"></v-text-field>
      </v-row>
      <v-row>
        <v-text-field v-model="lastName" label="Last Name"></v-text-field>
      </v-row>
      <v-row>
        <v-text-field v-model="phoneNumber" label="Phone Number"></v-text-field>
      </v-row>
      <v-row>
        <v-text-field v-model="address" label="Address"></v-text-field>
      </v-row>
    </v-col>
    <v-btn type="submit">Submit</v-btn>
  </v-form>
</template>

<style scoped>

</style>