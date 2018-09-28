import React, {Component} from 'react';
import {connect} from 'react-redux';
import {Link, Redirect} from 'react-router-dom';
import PropTypes from 'prop-types';
import {retrieve, reset} from '../../actions/payments/show';
import { del, loading, error } from '../../actions/payments/delete';

class Show extends Component {
  static propTypes = {
    error: PropTypes.string,
    loading: PropTypes.bool.isRequired,
    retrieved: PropTypes.object,
    retrieve: PropTypes.func.isRequired,
    reset: PropTypes.func.isRequired,
    deleteError: PropTypes.string,
    deleteLoading: PropTypes.bool.isRequired,
    deleted: PropTypes.object,
    del: PropTypes.func.isRequired
  };

  componentDidMount() {
    this.props.retrieve(decodeURIComponent(this.props.match.params.id));
  }

  componentWillUnmount() {
    this.props.reset();
  }

  del = () => {
    if (window.confirm('Are you sure you want to delete this item?')) this.props.del(this.props.retrieved);
  };

  render() {
    if (this.props.deleted) return <Redirect to=".."/>;

    const item = this.props.retrieved;

    return <div>
      <h1>Show {item && item['@id']}</h1>

      {this.props.loading && <div className="alert alert-info" role="status">Loading...</div>}
      {this.props.error && <div className="alert alert-danger" role="alert"><span className="fa fa-exclamation-triangle" aria-hidden="true"></span> {this.props.error}</div>}
      {this.props.deleteError && <div className="alert alert-danger" role="alert"><span className="fa fa-exclamation-triangle" aria-hidden="true"></span> {this.props.deleteError}</div>}

      {item && <table className="table table-responsive table-striped table-hover">
          <thead>
            <tr>
              <th>Field</th>
              <th>Value</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">amount</th>
              <td>{item['amount']}</td>
            </tr>
            <tr>
              <th scope="row">cardType</th>
              <td>{item['cardType']}</td>
            </tr>
            <tr>
              <th scope="row">date</th>
              <td>{item['date']}</td>
            </tr>
            <tr>
              <th scope="row">cardBin</th>
              <td>{item['cardBin']}</td>
            </tr>
            <tr>
              <th scope="row">cardEndNumber</th>
              <td>{item['cardEndNumber']}</td>
            </tr>
            <tr>
              <th scope="row">cardHolderName</th>
              <td>{item['cardHolderName']}</td>
            </tr>
            <tr>
              <th scope="row">paymentTypeId</th>
              <td>{item['paymentTypeId']}</td>
            </tr>
            <tr>
              <th scope="row">orders</th>
              <td>{item['orders']}</td>
            </tr>
            <tr>
              <th scope="row">cardNumber</th>
              <td>{item['cardNumber']}</td>
            </tr>
            <tr>
              <th scope="row">cardExpirationDate</th>
              <td>{item['cardExpirationDate']}</td>
            </tr>
          </tbody>
        </table>
      }
      <Link to=".." className="btn btn-primary">Back to list</Link>
      {item && <Link to={`/payments/edit/${encodeURIComponent(item['@id'])}`}>
        <button className="btn btn-warning">Edit</button>
        </Link>
      }
      <button onClick={this.del} className="btn btn-danger">Delete</button>
    </div>;
  }
}

const mapStateToProps = (state) => {
  return {
    error: state.payments.show.error,
    loading: state.payments.show.loading,
    retrieved:state.payments.show.retrieved,
    deleteError: state.payments.del.error,
    deleteLoading: state.payments.del.loading,
    deleted: state.payments.del.deleted,
  };
};

const mapDispatchToProps = (dispatch) => {
  return {
    retrieve: id => dispatch(retrieve(id)),
    del: item => dispatch(del(item)),
    reset: () => {
      dispatch(reset());
      dispatch(error(null));
      dispatch(loading(false));
    },
  }
};

export default connect(mapStateToProps, mapDispatchToProps)(Show);
