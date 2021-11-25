import React, {useEffect, useState} from "react";
import { Link } from "react-router-dom";
import { useDispatch, useSelector } from "react-redux";
import { getBlogPosts } from "../Redux/Reducers/RootReducer";


export default function Main()
{
    const dispatch = useDispatch();

    const [page, setPage] = useState(1);

    useEffect(() => {
        dispatch(getBlogPosts(page))
    },[page])

    const [paginate] = useSelector(state => !!state.posts ? state.posts.map(data => data.payload.links) : 0);

     return (
        <React.Fragment>
            <BlogContainer/>
            <Pagination paginate={paginate} setPage={setPage}/>
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
                const {author, title, body,id} = data;
                return (
                    <React.Fragment key={`larablog`+key}>
                        <div className="container">
                            <h1>{title}</h1>
                            <span>{author}</span>
                            <p>{body}</p>
                            <Link to={`/blog/${id}`}>Read More</Link>
                        </div>
                    </React.Fragment>
                )
            }): <span>loading</span>}
        </React.Fragment>
    )
}

function Pagination({paginate, setPage})
{
    return (
        <div className="container">
         {!!paginate ? paginate.map((data,key) => {
             const {url,active,label} = data;

              return (
                 <React.Fragment key={`larablogMa`+key}>
                     {/* <Link to={`blog?page=${label}`}>{label}</Link> */}
                    <button onClick={() => !!Number(label) ? setPage(Number(label)) : 1} key={`larablogMag`+key} className="btn btn-primary">{label}</button>
                 </React.Fragment>
             )
         }): 'loading'}
        </div>
    )
}
