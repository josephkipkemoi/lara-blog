import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';
import { BrowserRouter } from 'react-router-dom';

import { store } from './Redux/store';

import Header from './Header';
import Main from './Main';
import Footer from './Footer';

function App() {
    return (
        <BrowserRouter>
            <LandingPage/>
        </BrowserRouter>
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

export default App;

if (document.getElementById('App')) {
    ReactDOM.render(<Provider store={store}><App /></Provider>, document.getElementById('App'));
}
