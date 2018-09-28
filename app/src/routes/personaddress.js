import React from 'react';
import {Route} from 'react-router-dom';
import {List,Create, Update, Show} from '../components/personaddress/';

export default [
  <Route path='/person_addresses/create' component={Create} exact={true} key='create'/>,
  <Route path='/person_addresses/edit/:id' component={Update} exact={true} key='update'/>,
  <Route path='/person_addresses/show/:id' component={Show} exact={true} key='show'/>,
  <Route path='/person_addresses/:page?' component={List} strict={true} key='list'/>,
];
