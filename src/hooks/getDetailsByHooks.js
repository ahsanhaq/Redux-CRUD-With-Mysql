import { useEffect, useState } from 'react';
import {GetDetailsById} from '../api/axiosRequest'



export default(props) => {
    const [detailById,setDetailsById]=useState({});
    const GetDetailsByHooks = (requestId) => {
            return GetDetailsById(requestId).then((res) => {
            setDetailsById(res)
          });
        
      };
      useEffect(()=>{
        GetDetailsByHooks(props)
      },[]);
      return [detailById]
}
