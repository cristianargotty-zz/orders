import React, {Component} from 'react';
import {connect} from 'react-redux';
import {Link, Redirect} from 'react-router-dom';
import PropTypes from 'prop-types';
import {retrieve, reset} from '../../actions/orders/show';
import { del, loading, error } from '../../actions/orders/delete';

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
              <th scope="row">createAt</th>
              <td>{item['createAt']}</td>
            </tr>
            <tr>
              <th scope="row">date</th>
              <td>{item['date']}</td>
            </tr>
            <tr>
              <th scope="row">orderId</th>
              <td>{item['orderId']}</td>
            </tr>
            <tr>
              <th scope="row">ip</th>
              <td>{item['ip']}</td>
            </tr>
            <tr>
              <th scope="row">totalShipping</th>
              <td>{item['totalShipping']}</td>
            </tr>
            <tr>
              <th scope="row">totalOrder</th>
              <td>{item['totalOrder']}</td>
            </tr>
            <tr>
              <th scope="row">currency</th>
              <td>{item['currency']}</td>
            </tr>
            <tr>
              <th scope="row">module</th>
              <td>{item['module']}</td>
            </tr>
            <tr>
              <th scope="row">extra</th>
              <td>{item['extra']}</td>
            </tr>
            <tr>
              <th scope="row">email</th>
              <td>{item['email']}</td>
            </tr>
            <tr>
              <th scope="row">currentStatus</th>
              <td>{item['currentStatus']}</td>
            </tr>
            <tr>
              <th scope="row">sessionId</th>
              <td>{item['sessionId']}</td>
            </tr>
            <tr>
              <th scope="row">device</th>
              <td>{item['device']}</td>
            </tr>
            <tr>
              <th scope="row">payments</th>
              <td>{item['payments']}</td>
            </tr>
            <tr>
              <th scope="row">orderItems</th>
              <td>{item['orderItems']}</td>
            </tr>
            <tr>
              <th scope="row">person</th>
              <td>{item['person']}</td>
            </tr>
            <tr>
              <th scope="row">orderMetaData</th>
              <td>{item['orderMetaData']}</td>
            </tr>
            <tr>
              <th scope="row">updatedAt</th>
              <td>{item['updatedAt']}</td>
            </tr>
            <tr>
              <th scope="row">shippingType</th>
              <td>{item['shippingType']}</td>
            </tr>
          </tbody>
        </table>
      }
      <Link to=".." className="btn btn-primary">Back to list</Link>
      {item && <Link to={`/orders/edit/${encodeURIComponent(item['@id'])}`}>
        <button className="btn btn-warning">Edit</button>
        </Link>
      }
      <button onClick={this.del} className="btn btn-danger">Delete</button>
    </div>;
  }
}

const mapStateToProps = (state) => {
  return {
    error: state.orders.show.error,
    loading: state.orders.show.loading,
    retrieved:state.orders.show.retrieved,
    deleteError: state.orders.del.error,
    deleteLoading: state.orders.del.loading,
    deleted: state.orders.del.deleted,
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
