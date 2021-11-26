import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import axios from "axios";

export const getBlogPosts = createAsyncThunk(
    'blog/getBlogPosts',
    async (url, thunkApi) => {
        const response = await axios.get(`/api/blog?page=${url}`);

        return response.data
    }
)

export const getBlogById = createAsyncThunk(
    'blog/getBlogById',
    async (id, thunkApi) => {
        const response = await axios.get(`/api/blog/${id}`);

        return response.data
    }
)

export const BlogSlice = createSlice({
    name:'blog',
    initialState:{
        posts:[],
        postById:{}
    },
    extraReducers: (builder) => {
        builder.addCase(getBlogPosts.fulfilled, (state, data) => {
            state.posts.push(data)
        }),
        builder.addCase(getBlogById.fulfilled, ({postById}, {payload}) => ({
            ...postById,
            postById: payload
        }))
    }
})

export default BlogSlice.reducer;
