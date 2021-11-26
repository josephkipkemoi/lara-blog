import React, { useEffect } from 'react';
import ReactDOM from 'react-dom';
import { Provider, useDispatch, useSelector } from 'react-redux';
import { BrowserRouter , Switch, Route} from 'react-router-dom';

import { store } from './Redux/store';

import { getBlogById , getBlogPosts} from './Redux/Reducers/RootReducer';

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

function LandingPage(props) {

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
    },[dispatch])

    const {title,body, author} = useSelector(state => state.postById);

    return (
        <>
            <Header/>
            <Blog title={title} body={body} author={author}/>
            <Footer/>
        </>
    )
}
export default App;

if (document.getElementById('App')) {
    ReactDOM.render(<Provider store={store}> <App /></Provider>, document.getElementById('App'));
}
