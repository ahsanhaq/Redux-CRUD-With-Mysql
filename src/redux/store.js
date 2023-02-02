import RootReducer from "./reducer/rootReducer";
import { legacy_createStore as createStore, applyMiddleware } from "redux";
import { composeWithDevTools } from "redux-devtools-extension";
import thunkMiddleware from "redux-thunk";
const middleware = applyMiddleware(thunkMiddleware);
const Store = createStore(RootReducer, composeWithDevTools(middleware));

export default Store;
