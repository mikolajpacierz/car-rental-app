import axiosInstance from "./axiosInstance.js";
import { ref } from "vue";

export function Auth() {
    const email = ref('');
    const password = ref('');
    const firstName = ref('');
    const lastName = ref('');
    const phoneNumber = ref('');
    const address = ref('');
    const token = ref('');
    const error = ref(null);

    async function login() {
        try {
            const response = await axiosInstance.post("/auth/login", {
                email: email.value,
                password: password.value,
            });
            token.value = response.data.token;
            localStorage.setItem("jwt", token.value);
        } catch (e) {
            error.value = "Invalid credentials";
        }
    }
    
    async function register() {
        try {
            const response = await axiosInstance.post("/auth/register", {
                email: email.value,
                password: password.value,
                firstName: firstName.value,
                lastName: lastName.value,
                phoneNumber: phoneNumber.value,
                address: address.value,
            });
            token.value = response.data.token;
            localStorage.setItem("jwt", token.value);
        } catch (e) {
            error.value = "Invalid credentials";
        }
    }
    
    return {
        email,
        password,
        firstName,
        lastName,
        phoneNumber,
        address,
        token,
        login,
        register,
    };
}
