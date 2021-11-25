import React from "react";
import { useDispatch, useSelector } from "react-redux";
import { useEffect } from "react";
import { getBlogPosts } from "../Redux/Reducers/RootReducer";


export default function Main()
{
    const dispatch = useDispatch();

    useEffect(() => {
        dispatch(getBlogPosts())
    },[dispatch])

    return (
        <React.Fragment>
            <BlogContainer/>
        </React.Fragment>
    )
}

function BlogContainer()
{
    const posts = useSelector(state => !!state.posts ? state.posts.map(data => data.payload) : 'No posts found');
    const [data] = posts;
    return (
        <React.Fragment>
            <h2>News</h2>
            {!!data ? data.data.map((data,key) => {
                const {author, title, body} = data;
                return (
                    <React.Fragment key={`larablog`+key}>
                        <h1>{title}</h1>
                        <span>{author}</span>
                        <p>{body}</p>
                    </React.Fragment>
                )
            }): <span>loading</span>}
        </React.Fragment>
    )
}
