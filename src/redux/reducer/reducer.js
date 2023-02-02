import {
  GET_DETAILS,
  POST_DETAILS,
  UPDATE_DETAILS,
  DELETE_DETAILS,
  LOGIN,
} from "../type";

const initialState = {
  details: [],
  isResponse: [],
  isUpdateResponse: [],
  isDeleteResponse: false,
  userData:null
};

const Reducer = (state = initialState, action) => {
  switch (action.type) {
    case GET_DETAILS:
      return {
        details: action.payload,
      };
    case POST_DETAILS:
      return {
        isResponse: action.payload,
      };
    case UPDATE_DETAILS:
      return {
        isUpdateResponse: action.payload,
      };
    case LOGIN:
      return {
        userData: action.payload,
      };
    case DELETE_DETAILS:
      return {
        isDeleteResponse: action.payload,
      };
    default:
      return state;
  }
};
export default Reducer;
