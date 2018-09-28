import React from 'react';
import {Route} from 'react-router-dom';
import {List,Create, Update, Show} from '../components/orders/';

export default [
  <Route path='/orders/create' component={Create} exact={true} key='create'/>,
  <Route path='/orders/edit/:id' component={Update} exact={true} key='update'/>,
  <Route path='/orders/show/:id' component={Show} exact={true} key='show'/>,
  <Route path='/orders/:page?' component={List} strict={true} key='list'/>,
];
