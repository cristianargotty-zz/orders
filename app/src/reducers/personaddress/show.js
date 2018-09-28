import { combineReducers } from 'redux'

export function error(state = null, action) {
  switch (action.type) {
    case 'PERSONADDRESS_SHOW_ERROR':
      return action.error;

    case 'PERSONADDRESS_SHOW_RESET':
      return null;

    default:
      return state;
  }
}

export function loading(state = false, action) {
  switch (action.type) {
    case 'PERSONADDRESS_SHOW_LOADING':
      return action.loading;

    case 'PERSONADDRESS_SHOW_RESET':
      return false;

    default:
      return state;
  }
}

export function retrieved(state = null, action) {
  switch (action.type) {
    case 'PERSONADDRESS_SHOW_RETRIEVED_SUCCESS':
      return action.retrieved;

    case 'PERSONADDRESS_SHOW_RESET':
      return null;

    default:
      return state;
  }
}

export default combineReducers({error, loading, retrieved});
