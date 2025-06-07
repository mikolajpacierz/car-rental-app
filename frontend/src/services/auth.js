import axiosInstance from "./axiosInstance.js";
import { ref } from "vue";

export function Auth() {
    const email = ref('');
    const password = ref('');
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
            error.value = "Invalid credentials, frontend";
        }
    }

    return {
        email,
        password,
        token,
        error,
        login,
    };
}
