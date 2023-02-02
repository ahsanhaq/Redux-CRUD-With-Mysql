import { GET_DETAILS,POST_DETAILS,UPDATE_DETAILS,DELETE_DETAILS,LOGIN} from "../type";
import {GetApiDetails,PostApiDetails,UpdateApiDetails,DeleteApiDetails,LoginApi} from "../../api/axiosRequest";

// export const Action = () => async dispatch => {

//     try{
//         const res = await axios.get(`https://jsonplaceholder.typicode.com/users`)
//         dispatch( {
//             type: GET_DETAILS,
//             payload: res.data
//         })
//     }
//     catch(e){
//         dispatch( {
//             type: GET_DETAILS,
//             payload: console.log(e),
//         })
//     }

// }

const GetApiAction = () => {
  return function (dispatch) {
    return GetApiDetails().then((res) => {
      
      dispatch({
        type: GET_DETAILS,
        payload: res.data.data,
      });
    });
  };
};
const PostLoginApiAction =(request)=>{
  return function (dispatch) {
    dispatch({
      type: LOGIN,
      payload: '',
    });
    return LoginApi(request).then((res) => {
      
      dispatch({
        type: LOGIN,
        payload: res.data,
      });
    });
  };
} 
const PostApiAction = (request) => {
  return function (dispatch) {
    dispatch({
      type: POST_DETAILS,
      payload: '',
    });
    return PostApiDetails(request).then((res) => {
      
      dispatch({
        type: POST_DETAILS,
        payload: res.data,
      });
    });
  };
};

const UpdateApiAction = (request,id) => {
  return function (dispatch) {
    dispatch({
      type: UPDATE_DETAILS,
      payload: '',
    });
    return UpdateApiDetails(request,id).then((res) => {
      
      dispatch({
        type: UPDATE_DETAILS,
        payload: res.data,
      });
    });
  };
};

const DeleteApiAction = (id) => {
  return function (dispatch) {
    dispatch({
      type: DELETE_DETAILS,
      payload: true,
    });
    return DeleteApiDetails(id).then((res) => {
      
      dispatch({
        type: DELETE_DETAILS,
        payload: false,
      });
    });
  };
};

export  {GetApiAction,PostApiAction,UpdateApiAction,DeleteApiAction,PostLoginApiAction};
