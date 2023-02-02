import axios from "axios";

export async function AxiosRequest(url, method, headers, params) {
  return params
    ? axios({
        url: url,
        method: method,
        headers: headers,
        data: params,
      })
    : axios({
        url: url,
        method: method,
        headers: headers,
        data: {},
      });
}

const GetApiDetails = () => {
  const headers = {
    'Content-Type': 'application/json',
  };
  return AxiosRequest(
    `https://localhost/api/v2/listrec`,
    'GET',
    headers,
    {}
  );
};
const PostApiDetails = (data) => {
  const headers = {
    'Content-Type': 'application/json',
  };
  
  return AxiosRequest(
    `https://localhost/api/v2/add`,
    'POST',
    headers,
    data
  );
};

const GetDetailsById = (id) => {
  const headers = {
    'Content-Type': 'application/json',
  };
  
  return AxiosRequest(
    `https://localhost/api/v2/onerec/`+id,
    'GET',
    headers,
    {}
  );
};
const LoginApi = (data) => {
  const headers = {
    'Content-Type': 'application/json',
  };
  
  return AxiosRequest(
    `https://localhost/api/v2/login/`,
    'POST',
    headers,
    data
  );
};
const UpdateApiDetails = (data,id) => {
  const headers = {
    'Content-Type': 'application/json',
  };
  
  return AxiosRequest(
    `https://localhost/api/v2/update/`+id,
    'POST',
    headers,
    data
  );
};
const DeleteApiDetails = (id) => {
  const headers = {
    'Content-Type': 'application/json',
  };
  
  return AxiosRequest(
    `https://localhost/api/v2/deleteData/`+id,
    'POST',
    headers,
    {}
  );
};
export  {GetApiDetails,PostApiDetails,GetDetailsById,UpdateApiDetails,DeleteApiDetails,LoginApi}
