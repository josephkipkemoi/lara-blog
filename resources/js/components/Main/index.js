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

// Container for each Blog post
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
    const paginate = useSelector(state => state.posts);

    return (
        <div className="container">
          {paginate.map((data,key) => {
              const {current_page,total,per_page} = data.payload;
              return <Pagination
                        key={`paginate${key}`}
                        linkClass="btn btn-secondary"
                        totalItemsCount={total}
                        itemsCountPerPage={per_page}
                        pageRangeDisplayed={per_page}
                        activePage={current_page}
                        onChange={() => console.log('d')}
                    />
          })}
        </div>
    )
}
