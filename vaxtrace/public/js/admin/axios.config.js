const baseUrl = (axios.default.baseUrl = "http://localhost:8000");
const token = $('meta[name="csrf-token"]').attr("content");

//Add a request interceptor
axios.interceptors.request.use(
    function (config) {
        // set the csrf token
        config.headers["X-CSRF-TOKEN"] = token;
        return config;
    },
    function (error) {
        // Do something with request error
        return Promise.reject(error);
    }
);

export { baseUrl, token };
