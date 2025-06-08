<script setup>
import {Auth} from "../services/auth.js"

const {email, password, login} = Auth();
</script>

<template>
  <v-form @submit.prevent="login">
    <v-col>
      <v-row>
        <v-text-field v-model="email" label="E-mail"></v-text-field>
      </v-row>
      <v-row>
        <v-text-field v-model="password" type="password" label="Password"></v-text-field>
      </v-row>
    </v-col>
    <v-btn type="submit">Submit</v-btn>
  </v-form>
</template>

<style scoped>

</style>