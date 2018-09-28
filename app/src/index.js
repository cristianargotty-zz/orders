import React from 'react';
import ReactDom from 'react-dom';
import registerServiceWorker from './registerServiceWorker';
import { createStore, combineReducers, applyMiddleware } from 'redux';
import { Provider } from 'react-redux';
import thunk from 'redux-thunk';
import { reducer as form } from 'redux-form';
import { BrowserRouter as Router, Route, Switch } from 'react-router-dom';
import createBrowserHistory from 'history/createBrowserHistory';
import { syncHistoryWithStore, routerReducer as routing } from 'react-router-redux'

import orders from './reducers/orders/';
import fooRoutes from './routes/orders';

const store = createStore(
    combineReducers({routing, form, orders}),
    applyMiddleware(thunk),
);

const history = syncHistoryWithStore(createBrowserHistory(), store);

ReactDom.render(
    <Provider store={store}>
        <Router history={history}>
            <Switch>
                {fooRoutes}
                <Route render={() => <h1>Not Found</h1>}/>
            </Switch>
        </Router>
    </Provider>,
    document.getElementById('root')
);

registerServiceWorker();

