import React, {Component} from 'react';
import { connect } from 'react-redux';
import { Link } from 'react-router-dom';
import PropTypes from 'prop-types';
import { list, reset } from '../../actions/orders/list';
import { success } from '../../actions/orders/delete';
import { itemToLinks } from '../../utils/helpers';

class List extends Component {
  static propTypes = {
    error: PropTypes.string,
    loading: PropTypes.bool.isRequired,
    data: PropTypes.object.isRequired,
    deletedItem: PropTypes.object,
    list: PropTypes.func.isRequired,
    reset: PropTypes.func.isRequired,
  };

  componentDidMount() {
    this.props.list(this.props.match.params.page && decodeURIComponent(this.props.match.params.page));
  }

  componentWillReceiveProps(nextProps) {
    if (this.props.match.params.page !== nextProps.match.params.page) nextProps.list(nextProps.match.params.page && decodeURIComponent(nextProps.match.params.page));
  }

  componentWillUnmount() {
    this.props.reset();
  }

  render() {
    return <div>
      <h1>Orders List</h1>

      {this.props.loading && <div className="alert alert-info">Loading...</div>}
      {this.props.deletedItem && <div className="alert alert-success">{this.props.deletedItem['@id']} deleted.</div>}
      {this.props.error && <div className="alert alert-danger">{this.props.error}</div>}

      <p><Link to="create" className="btn btn-primary">Create</Link></p>

        <table className="table table-responsive table-striped table-hover">
        <thead>
          <tr>
            <th>Id</th>
            <th>createAt</th>
            <th>date</th>
            <th>orderId</th>
            <th>ip</th>
            <th>totalShipping</th>
            <th>totalOrder</th>
            <th>currency</th>
            <th>module</th>
            <th>extra</th>
            <th>email</th>
            <th>currentStatus</th>
            <th>sessionId</th>
            <th>device</th>
            <th>payments</th>
            <th>orderItems</th>
            <th>person</th>
            <th>orderMetaData</th>
            <th>updatedAt</th>
            <th>shippingType</th>
            <th colSpan={2}></th>
          </tr>
        </thead>
        <tbody>
        {this.props.data['hydra:member'] && this.props.data['hydra:member'].map(item =>
          <tr key={item['@id']}>
            <th scope="row"><Link to={`show/${encodeURIComponent(item['@id'])}`}>{item['@id']}</Link></th>
            <td>{item['createAt'] ? itemToLinks(item['createAt']) : ''}</td>
            <td>{item['date'] ? itemToLinks(item['date']) : ''}</td>
            <td>{item['orderId'] ? itemToLinks(item['orderId']) : ''}</td>
            <td>{item['ip'] ? itemToLinks(item['ip']) : ''}</td>
            <td>{item['totalShipping'] ? itemToLinks(item['totalShipping']) : ''}</td>
            <td>{item['totalOrder'] ? itemToLinks(item['totalOrder']) : ''}</td>
            <td>{item['currency'] ? itemToLinks(item['currency']) : ''}</td>
            <td>{item['module'] ? itemToLinks(item['module']) : ''}</td>
            <td>{item['extra'] ? itemToLinks(item['extra']) : ''}</td>
            <td>{item['email'] ? itemToLinks(item['email']) : ''}</td>
            <td>{item['currentStatus'] ? itemToLinks(item['currentStatus']) : ''}</td>
            <td>{item['sessionId'] ? itemToLinks(item['sessionId']) : ''}</td>
            <td>{item['device'] ? itemToLinks(item['device']) : ''}</td>
            <td>{item['payments'] ? itemToLinks(item['payments']) : ''}</td>
            <td>{item['orderItems'] ? itemToLinks(item['orderItems']) : ''}</td>
            <td>{item['person'] ? itemToLinks(item['person']) : ''}</td>
            <td>{item['orderMetaData'] ? itemToLinks(item['orderMetaData']) : ''}</td>
            <td>{item['updatedAt'] ? itemToLinks(item['updatedAt']) : ''}</td>
            <td>{item['shippingType'] ? itemToLinks(item['shippingType']) : ''}</td>
            <td>
              <Link to={`show/${encodeURIComponent(item['@id'])}`}>
                <span className="fa fa-search" aria-hidden="true"/>
                <span className="sr-only">Show</span>
              </Link>
            </td>
            <td>
              <Link to={`edit/${encodeURIComponent(item['@id'])}`}>
                <span className="fa fa-pencil" aria-hidden="true"/>
                <span className="sr-only">Edit</span>
              </Link>
            </td>
          </tr>
        )}
        </tbody>
      </table>

      {this.pagination()}
    </div>;
  }

  pagination() {
    const view = this.props.data['hydra:view'];
    if (!view) return;

    const {'hydra:first': first, 'hydra:previous': previous,'hydra:next': next, 'hydra:last': last} = view;

    return <nav aria-label="Page navigation">
        <Link to='.' className={`btn btn-primary${previous ? '' : ' disabled'}`}><span aria-hidden="true">&lArr;</span> First</Link>
        <Link to={!previous || previous === first ? '.' : encodeURIComponent(previous)} className={`btn btn-primary${previous ? '' : ' disabled'}`}><span aria-hidden="true">&larr;</span> Previous</Link>
        <Link to={next ? encodeURIComponent(next) : '#'} className={`btn btn-primary${next ? '' : ' disabled'}`}>Next <span aria-hidden="true">&rarr;</span></Link>
        <Link to={last ? encodeURIComponent(last) : '#'} className={`btn btn-primary${next ? '' : ' disabled'}`}>Last <span aria-hidden="true">&rArr;</span></Link>
    </nav>;
  }
}

const mapStateToProps = (state) => {
  return {
    data: state.orders.list.data,
    error: state.orders.list.error,
    loading: state.orders.list.loading,
    deletedItem: state.orders.del.deleted,
  };
};

const mapDispatchToProps = (dispatch) => {
  return {
    list: (page) => dispatch(list(page)),
    reset: () => {
      dispatch(reset());
      dispatch(success(null));
    },
  };
};

export default connect(mapStateToProps, mapDispatchToProps)(List);
