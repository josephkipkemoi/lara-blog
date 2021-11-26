import React, { useState }  from "react";
import Pagination from "react-js-pagination";
import { useSelector } from "react-redux";
import { Link } from "react-router-dom";

export default function Main()
{
     return (
        <React.Fragment>
            <BlogContainer/>
            <Paginate/>
        </React.Fragment>
    )
}

function BlogContainer()
{
    const [post] = useSelector(state => !!state.posts ? state.posts.map(data => data.payload.data) : [])

    return (
        <React.Fragment>
            <h2>News</h2>
            {!!post ? post.map((data,key) => {
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

function Paginate()
{
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
