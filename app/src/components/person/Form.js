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
      <label htmlFor={`person_${data.input.name}`} className="form-control-label">{data.input.name}</label>
      <input {...data.input} type={data.type} step={data.step} required={data.required} placeholder={data.placeholder} id={`person_${data.input.name}`}/>
      {isInvalid && <div className="invalid-feedback">{data.meta.error}</div>}
    </div>;
  }

  render() {
    const { handleSubmit } = this.props;

    return <form onSubmit={handleSubmit}>
      <Field component={this.renderField} name="type" type="number" placeholder="" />
      <Field component={this.renderField} name="name" type="text" placeholder="" />
      <Field component={this.renderField} name="birthDate" type="dateTime" placeholder="" />
      <Field component={this.renderField} name="email" type="text" placeholder="" />
      <Field component={this.renderField} name="document" type="text" placeholder="" />
      <Field component={this.renderField} name="gender" type="text" placeholder="" />
      <Field component={this.renderField} name="personAddress" type="text" placeholder="" />

        <button type="submit" className="btn btn-success">Submit</button>
      </form>;
  }
}

export default reduxForm({form: 'person', enableReinitialize: true, keepDirtyOnReinitialize: true})(Form);
