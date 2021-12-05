import React from "react";

export default function Blog({title, body, author}) {

    return (
        <>
            <Body title={title} body={body} author={author}/>
            <AddComment/>
            <Comments/>
        </>
    )
}

function Body({title,author,body}) {
    return (
        <div className="container">
            <h1>{title}</h1>
            <span>{author}</span>
            <p>{body}</p>
        </div>
    )
}

function AddComment() {
    return (
        <div className="container">
            <label>Add Comment:</label>
            <textarea type="text" placeholder="Comment"/>{` `}
            <input type="button" value="Submit" className="btn btn-primary"/>
        </div>
    )
}

function Comments() {
    return (
        <div className="container">
            <span>Comments</span>
        </div>
    )
}
