import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';
import { BrowserRouter , Switch, Route} from 'react-router-dom';

import { store } from './Redux/store';

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
    return (
        <>
            <Header/>
            <Main/>
            <Footer/>
        </>
    )
}

function BlogPage(props) {
    return (
        <>
            <Header/>
            <Blog id={props.match.params.id}/>
            <Footer/>
        </>
    )
}
export default App;

if (document.getElementById('App')) {
    ReactDOM.render(<Provider store={store}><App /></Provider>, document.getElementById('App'));
}
