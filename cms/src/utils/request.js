import axios from "axios";
import { Message, MessageBox } from "element-ui";
import store from "../store";
import { getToken } from "@/utils/auth";
import { Loading } from "element-ui";
let loading; //定义loading变量

function startLoading() {
  //使用Element loading-start 方法
  loading = Loading.service({
    lock: true,
    text: "正在拼命加载中，请稍后....",
    background: "rgba(0, 0, 0, 0.7)",
    spinner: "el-icon-loading"
  });
}

function endLoading() {
  //使用Element loading-close 方法
  loading.close();
}
let needLoadingRequestCount = 0;
export function showFullScreenLoading() {
  if (needLoadingRequestCount === 0) {
    startLoading();
  }
  needLoadingRequestCount++;
}

export function tryHideFullScreenLoading() {
  if (needLoadingRequestCount <= 0) return;
  needLoadingRequestCount--;
  if (needLoadingRequestCount === 0) {
    endLoading();
  }
}

// 创建axios实例
const service = axios.create({
  baseURL: process.env.VUE_APP_BASE_API, // api的base_url
  timeout: 1000 * 60 * 10 // 请求超时时间
});

// request拦截器
service.interceptors.request.use(
  config => {
    if (store.getters.token) {
      config.headers["Authorization"] = "Bearer " + getToken(); // 让每个请求携带自定义token 请根据实际情况自行修改
    }
    let url = config.url;
    if (url.indexOf("/laboratory/chat_module/upload_pic_by_base64") == -1)
      showFullScreenLoading();
    return config;
  },
  error => {
    // Do something with request error
    // console.log(error) // for debug
    Promise.reject(error);
  }
);

// respone拦截器
service.interceptors.response.use(
  response => {
    /**
     * code为非200是抛错 可结合自己业务进行修改
     */
    var token = response.headers.authorization;
    if (token) {
      // 如果 header 中存在 token，那么触发 refreshToken 方法，替换本地的 token
      token = token.replace(/Bearer /g, "");
      store.dispatch("refreshToken", token);
    }

    //定义返回数据
    const res = response.data;

    //判断状态码（自定义）
    if (res.code != 200 && res.code.toString().length > 2) {
      //定义错误码 出现以下错误码不弹窗报错
      const errorCode = [401, 1002, 1003];
      if (errorCode.indexOf(res.code) == -1) {
        res.msg = res.msg ? res.msg : res.data.msg;
        Message({
          message: res.msg,
          type: "error",
          duration: 2000
        });
      }
      if (res.code == 1002 || res.code == 401 || res.code == 1003) {
        MessageBox.confirm(
          "登录状态已过期，您可以继续留在该页面，或者重新登录",
          "确定登出",
          {
            confirmButtonText: "重新登录",
            cancelButtonText: "取消",
            type: "warning"
          }
        ).then(() => {
          store.dispatch("FedLogOut").then(() => {
            // 为了重新实例化vue-router对象 避免bug
            location.reload();
          });
        });
      }
      tryHideFullScreenLoading();
      return response.data;
    } else {
      //判断请求方式
      const MessageMethod = ["put", "delete", "post"];
      if (MessageMethod.indexOf(response.config.method) != -1) {
        if (res.msg != "" && res.msg != null && res.msg != undefined) {
          Message({
            message: res.msg,
            type: "success",
            duration: 2000
          });
        }
      }
      tryHideFullScreenLoading();
      return response.data;
    }
  },
  error => {
    console.log("err" + error); // for debug
    Message({
      message: error.message,
      type: "error",
      duration: 2000
    });
    tryHideFullScreenLoading();
    return Promise.reject(error);
  }
);

export default service;
