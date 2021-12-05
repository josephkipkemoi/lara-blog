import React from "react";

export default function Blog({title, body, author,comments}) {

    return (
        <>
            <Body title={title} body={body} author={author}/>
            <AddComment/>
            {comments.map((data,key) => {
               const {payload} = data;
               return <Comments key={`larablogcomment${key}`} comment={payload}/>
            })}
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

function Comments({comment}) {
    return (
        <div className="container">
            <span>Comments:</span>
             {comment.map((data,key) => {
                 const {comment_body} = data;
                 return <p key={`larablogcommentp${key}`}>{comment_body}</p>
             })}
        </div>
    )
}
