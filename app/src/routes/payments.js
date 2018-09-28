import React from 'react';
import {Route} from 'react-router-dom';
import {List,Create, Update, Show} from '../components/payments/';

export default [
  <Route path='/payments/create' component={Create} exact={true} key='create'/>,
  <Route path='/payments/edit/:id' component={Update} exact={true} key='update'/>,
  <Route path='/payments/show/:id' component={Show} exact={true} key='show'/>,
  <Route path='/payments/:page?' component={List} strict={true} key='list'/>,
];
