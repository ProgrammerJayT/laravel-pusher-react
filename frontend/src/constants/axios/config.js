import axios from "axios";

export const API_URL = "http://127.0.0.1:8000";

const localToken = localStorage.getItem("token");

export const headers = () => {
  axios.defaults.headers.common["Authorization"] = `Bearer ${localToken}`;
  axios.defaults.headers.common["Accept"] = "application/json";
};
