import React from "react";

export default function Blog({title, body, author}) {

    return (
        <>
            <h1>{title}</h1>
            <span>{author}</span>
            <p>{body}</p>
        </>
    )
}
