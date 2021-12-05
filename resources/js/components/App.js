import React, { useEffect } from 'react';
import ReactDOM from 'react-dom';
import { Provider, useDispatch, useSelector } from 'react-redux';
import { BrowserRouter , Switch, Route} from 'react-router-dom';

import { store } from './Redux/store';

import { getBlogById , getBlogComments, getBlogPosts} from './Redux/Reducers/RootReducer';

import Header from './Header';
import Main from './Main';
import Blog from './Blog';
import Footer from './Footer';

function App() {
    return (
      <>
            <BrowserRouter>
            <Switch>
                <Route exact path="/" component={LandingPage}/>
                <Route exact path="/blog/:id" component={BlogPage}/>
            </Switch>
            </BrowserRouter>
      </>
    );
}

function LandingPage() {

    const dispatch = useDispatch()

    useEffect(() => {
     dispatch(getBlogPosts(1))

     },[dispatch])


    return (
        <>
            <Header/>
            <Main/>
            <Footer/>
        </>
    )
}

function BlogPage(props) {

    const dispatch = useDispatch();

    useEffect(() => {
        dispatch(getBlogById(props.match.params.id))
        dispatch(getBlogComments(props.match.params.id))
    },[dispatch])

    const post = useSelector(state => state.postById);
    const comments = useSelector(state => state.comments);

    return (
        <>
            <Header/>
            {post.map((data,key) => {
                const {title, author, body} = data.payload
                return (
                    <Blog key={'la'+key} title={title} body={body} author={author} comments={comments}/>
                  )
            })}
            <Footer/>
        </>
    )
}
export default App;

if (document.getElementById('App')) {
    ReactDOM.render(<Provider store={store}> <App /></Provider>, document.getElementById('App'));
}
