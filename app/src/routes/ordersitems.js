import React from 'react';
import {Route} from 'react-router-dom';
import {List,Create, Update, Show} from '../components/ordersitems/';

export default [
  <Route path='/orders_items/create' component={Create} exact={true} key='create'/>,
  <Route path='/orders_items/edit/:id' component={Update} exact={true} key='update'/>,
  <Route path='/orders_items/show/:id' component={Show} exact={true} key='show'/>,
  <Route path='/orders_items/:page?' component={List} strict={true} key='list'/>,
];
