import React from 'react';
import calculate from '../logic/calculate';
import './App.css';
import ButtonPanel from './ButtonPanel';
import Display from './Display';

class App extends React.Component {
  constructor(props) {
    super(props)
    this.state = {
      total: null,
      next: null,
    }
  }

  handleClick = buttonName => {
    this.setState(calculate(this.state, buttonName))
    return `hello ${buttonName}`;
  }

  render() {
    return (
      <div className="component-app">
        {'hello'}
        Tacos
        <Display value={this.state.next || this.state.total || '0'} />
        <ButtonPanel clickHandler={this.handleClick} />
      </div>
    )
  }
}
export default App
