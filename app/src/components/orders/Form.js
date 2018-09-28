import React, { Component } from 'react';
import { Field, reduxForm } from 'redux-form';

class Form extends Component {
  renderField = (data) => {
    data.input.className = 'form-control';

    const isInvalid = data.meta.touched && !!data.meta.error;
    if (isInvalid) {
      data.input.className += ' is-invalid';
      data.input['aria-invalid'] = true;
    }

    if (this.props.error && data.meta.touched && !data.meta.error) {
      data.input.className += ' is-valid';
    }

    return <div className={`form-group`}>
      <label htmlFor={`orders_${data.input.name}`} className="form-control-label">{data.input.name}</label>
      <input {...data.input} type={data.type} step={data.step} required={data.required} placeholder={data.placeholder} id={`orders_${data.input.name}`}/>
      {isInvalid && <div className="invalid-feedback">{data.meta.error}</div>}
    </div>;
  }

  render() {
    const { handleSubmit } = this.props;

    return <form onSubmit={handleSubmit}>
      <Field component={this.renderField} name="createAt" type="dateTime" placeholder="" />
      <Field component={this.renderField} name="date" type="dateTime" placeholder="" />
      <Field component={this.renderField} name="orderId" type="number" placeholder="" />
      <Field component={this.renderField} name="ip" type="text" placeholder="Order originating IP address" required={true}/>
      <Field component={this.renderField} name="totalShipping" type="text" placeholder="" />
      <Field component={this.renderField} name="totalOrder" type="text" placeholder="" />
      <Field component={this.renderField} name="currency" type="text" placeholder="" />
      <Field component={this.renderField} name="module" type="text" placeholder="" />
      <Field component={this.renderField} name="extra" type="text" placeholder="" />
      <Field component={this.renderField} name="email" type="text" placeholder="" />
      <Field component={this.renderField} name="currentStatus" type="text" placeholder="" />
      <Field component={this.renderField} name="sessionId" type="text" placeholder="" />
      <Field component={this.renderField} name="device" type="text" placeholder="" />
      <Field component={this.renderField} name="payments" type="text" placeholder="payments for this order" />
      <Field component={this.renderField} name="orderItems" type="text" placeholder="items for this order" />
      <Field component={this.renderField} name="person" type="text" placeholder="" />
      <Field component={this.renderField} name="orderMetaData" type="text" placeholder="" />
      <Field component={this.renderField} name="updatedAt" type="dateTime" placeholder="" />
      <Field component={this.renderField} name="shippingType" type="text" placeholder="" />

        <button type="submit" className="btn btn-success">Submit</button>
      </form>;
  }
}

export default reduxForm({form: 'orders', enableReinitialize: true, keepDirtyOnReinitialize: true})(Form);
