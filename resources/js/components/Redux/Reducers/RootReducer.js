import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import axios from "axios";

export const getBlogPosts = createAsyncThunk(
    'blogs/getBlogPosts',
    async (url, thunkApi) => {
        const response = await axios.get(`/api/v1/blogs`);

        return response.data
    }
)

export const getBlogById = createAsyncThunk(
    'blogs/getBlogById',
    async (id, thunkApi) => {
        const response = await axios.get(`/api/v1/blogs/${id}`);

        return response.data
    }
)

export const getBlogComments = createAsyncThunk(
    'blogs/getBlogComments',
    async (id, thunkApi) => {
        const response = await axios.get(`/api/v1/blogs/${id}/comments`);

        return response.data
    }
)

export const BlogSlice = createSlice({
    name:'blogs',
    initialState:{
        posts:[],
        postById:[],
        comments:[]
    },
    extraReducers: (builder) => {
        builder.addCase(getBlogPosts.fulfilled, (state, data) => {
            state.posts[0] = data
        }),
        builder.addCase(getBlogById.fulfilled, (state, data) => {
            state.postById[0] = data
        }),
        builder.addCase(getBlogComments.fulfilled, (state, data) => {
            state.comments[0] = data
        })
    }
})

export default BlogSlice.reducer;
