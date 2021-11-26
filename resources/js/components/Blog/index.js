import React, { useEffect } from "react";
import { useDispatch } from "react-redux";

import { getBlogById } from "../Redux/Reducers/RootReducer";

export default function Blog({id}) {
    const dispatch = useDispatch();

    useEffect(() => {
        dispatch(getBlogById(id))
    },[dispatch])

    return (
        <>
             <h1>Blog</h1>
        </>
    )
}
