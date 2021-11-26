import React, {useEffect, useState} from "react";
import { Link } from "react-router-dom";
import { useDispatch, useSelector } from "react-redux";
import { getBlogPosts } from "../Redux/Reducers/RootReducer";
import Pagination from "react-js-pagination";

export default function Main()
{
    const dispatch = useDispatch();

    const [page, setPage] = useState(1);

    useEffect(() => {
        dispatch(getBlogPosts(page))
    },[page])

    const [paginate] = useSelector(state => !!state.posts ? state.posts.map(data => data.payload) : 0);

     return (
        <React.Fragment>
            <BlogContainer/>
            <Paginate paginate={paginate} setPage={setPage}/>
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

function Paginate({paginate, setPage})
{
    const {current_page,data,first_page_url,from,last_page,last_page_url,links,next_page_url,path,per_page,prev_page_url,to,total} = !!paginate ? paginate : 'loading';

    return (
        <div className="container">
             <Pagination
              linkClass="btn btn-secondary"
              totalItemsCount={10}
              itemsCountPerPage={5}
              pageRangeDisplayed={5}
              activePage={1}
              onChange={() => console.log('d')}/>
        </div>
    )
}
