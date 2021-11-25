import { createAsyncThunk, createSlice } from "@reduxjs/toolkit";
import axios from "axios";

export const getBlogPosts = createAsyncThunk(
    'blog/getBlogPosts',
    async (url, thunkApi) => {
        const response = await axios.get(`/api/blog?page=${url}`);

        return response.data
    }
)

export const BlogSlice = createSlice({
    name:'blog',
    initialState:{
        posts:[]
    },
    extraReducers: (builder) => {
        builder.addCase(getBlogPosts.fulfilled, (state, data) => {
            state.posts.push(data)
        })
    }
})

export default BlogSlice.reducer;
