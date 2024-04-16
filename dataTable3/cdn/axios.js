import "./axios.cdn.min.js";
import "./alpine.cdn.min.js";

const axiosClient = axios.create({
    baseURL: './dataTable3/api',
});

// 使用 ES6 默認參數和模板字符串來簡化代碼
function checkParam(params, paramName, defaultValue = null) {
    if (params[paramName] === null) {
        const message = `尚未給${paramName === 'sql' ? '' : 'COUNT '}SQL語句，請通知管理員。`;
        alert(message);
        throw new Error(message);
    }
    params[paramName] = params[paramName] || defaultValue;
}

axiosClient.interceptors.request.use(config => {
    // console.log(config.params);
    checkParam(config.params, 'sql');
    checkParam(config.params, 'sql_count');
    checkParam(config.params, 'limit', 50);
    checkParam(config.params, 'search', '');
    checkParam(config.params, 'sortDirection', 'desc');
    checkParam(config.params, 'sortField', 'id');
    return config;
}, error => Promise.reject(error));

axiosClient.interceptors.response.use(res => {
    if (res.status !== 200) {
        alert("伺服器錯誤，請通知管理員。");
    }
    return res;
}, error => {
    console.error(error);
    alert(error.message);
    return Promise.reject(error);
});

export default axiosClient;
