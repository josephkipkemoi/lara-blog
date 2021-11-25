import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';

import { store } from './Redux/store';

import Header from './Header';
import Main from './Main';
import Footer from './Footer';

function App() {
    return (
        <React.Fragment>
            <Header/>
            <Main/>
            <Footer/>
        </React.Fragment>
    );
}

export default App;

if (document.getElementById('App')) {
    ReactDOM.render(<Provider store={store}><App /></Provider>, document.getElementById('App'));
}
