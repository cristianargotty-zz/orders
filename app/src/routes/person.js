import React from 'react';
import {Route} from 'react-router-dom';
import {List,Create, Update, Show} from '../components/person/';

export default [
  <Route path='/people/create' component={Create} exact={true} key='create'/>,
  <Route path='/people/edit/:id' component={Update} exact={true} key='update'/>,
  <Route path='/people/show/:id' component={Show} exact={true} key='show'/>,
  <Route path='/people/:page?' component={List} strict={true} key='list'/>,
];
